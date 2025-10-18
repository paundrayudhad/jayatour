<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image_url',
        'location',
        'caption',
        'captured_at',
        'tour_package_id',
    ];

    protected $casts = [
        'captured_at' => 'date',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tourPackage(): BelongsTo
    {
        return $this->belongsTo(TourPackage::class);
    }
}
