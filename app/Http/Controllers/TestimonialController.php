<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::query()
            ->with('tourPackage')
            ->latest('traveled_at')
            ->paginate(12);

        return view('testimonials.index', compact('testimonials'));
    }
}
