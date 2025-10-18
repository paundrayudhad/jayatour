<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::query()
            ->with('tourPackage')
            ->latest('captured_at')
            ->paginate(12);

        return view('gallery.index', compact('galleryItems'));
    }

    public function show(GalleryItem $galleryItem)
    {
        $relatedItems = GalleryItem::query()
            ->whereKeyNot($galleryItem->getKey())
            ->when($galleryItem->tour_package_id, fn ($query) => $query->where('tour_package_id', $galleryItem->tour_package_id))
            ->take(6)
            ->get();

        return view('gallery.show', compact('galleryItem', 'relatedItems'));
    }
}
