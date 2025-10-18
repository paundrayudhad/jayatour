<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_category_id',
        'title',
        'slug',
        'hero_image',
        'location',
        'duration',
        'price_label',
        'difficulty',
        'excerpt',
        'itinerary',
        'is_featured',
        'highlights',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'highlights' => AsArrayObject::class,
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(DestinationCategory::class, 'destination_category_id');
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    public function galleryItems(): HasMany
    {
        return $this->hasMany(GalleryItem::class);
    }
}
