<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'traveler_name',
        'traveler_location',
        'rating',
        'traveled_at',
        'body',
        'tour_package_id',
    ];

    protected $casts = [
        'rating' => 'integer',
        'traveled_at' => 'date',
    ];

    public function tourPackage(): BelongsTo
    {
        return $this->belongsTo(TourPackage::class);
    }
}
