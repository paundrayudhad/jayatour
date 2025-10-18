<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TourPackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/packages', [TourPackageController::class, 'index'])->name('packages.index');
Route::get('/packages/{tourPackage:slug}', [TourPackageController::class, 'show'])->name('packages.show');

Route::get('/blog', [ArticleController::class, 'index'])->name('blog.index');
Route::get('/blog/{article:slug}', [ArticleController::class, 'show'])->name('blog.show');

Route::get('/testimoni', [TestimonialController::class, 'index'])->name('testimonials.index');

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{galleryItem:slug}', [GalleryController::class, 'show'])->name('gallery.show');

Route::get('/kontak', ContactController::class)->name('contact');
