<?php

namespace App\Http\Controllers;

use App\Models\DestinationCategory;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class TourPackageController extends Controller
{
    public function index(Request $request)
    {
        $categories = DestinationCategory::orderBy('name')->get();

        $packages = TourPackage::query()
            ->with('category')
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('category', function ($categoryQuery) use ($request) {
                    $categoryQuery->where('slug', $request->string('category'));
                });
            })
            ->when($request->filled('q'), function ($query) use ($request) {
                $term = '%' . $request->string('q') . '%';
                $query->where(function ($inner) use ($term) {
                    $inner->where('title', 'like', $term)
                        ->orWhere('location', 'like', $term)
                        ->orWhere('excerpt', 'like', $term);
                });
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('packages.index', compact('packages', 'categories'));
    }

    public function show(TourPackage $tourPackage)
    {
        $tourPackage->load(['category', 'testimonials' => fn ($query) => $query->latest('traveled_at')->take(4)]);

        $relatedPackages = TourPackage::query()
            ->whereKeyNot($tourPackage->getKey())
            ->where('destination_category_id', $tourPackage->destination_category_id)
            ->take(3)
            ->get();

        return view('packages.show', compact('tourPackage', 'relatedPackages'));
    }
}
