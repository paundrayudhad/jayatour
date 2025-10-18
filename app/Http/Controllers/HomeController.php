<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\DestinationCategory;
use App\Models\Testimonial;
use App\Models\TourPackage;

class HomeController extends Controller
{
    /**
     * Display the Jayatour marketing landing page.
     */
    public function __invoke()
    {
        $featuredPackages = TourPackage::query()
            ->where('is_featured', true)
            ->with('category')
            ->orderByDesc('updated_at')
            ->take(6)
            ->get();

        $categories = DestinationCategory::query()
            ->withCount('tourPackages')
            ->orderBy('name')
            ->get();

        $latestArticles = Article::query()
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $testimonials = Testimonial::query()
            ->latest('traveled_at')
            ->with('tourPackage')
            ->take(6)
            ->get();

        return view('home', compact(
            'featuredPackages',
            'categories',
            'latestArticles',
            'testimonials'
        ));
    }
}
