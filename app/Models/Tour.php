<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Tour extends Model
{
     use HasTranslations;

    protected $fillable = [
        'name', 'description', 'includes', 'duration_days','duration_nights', 'price','stops','phone','email','start_latitude','start_longitude','end_latitude','end_longitude','category', 'main_image'
    ];

    public $translatable = ['name', 'description', 'includes'];
     protected $casts = [
    'name'        => 'array',
    'description' => 'array',
    'includes'     => 'array',
   
];

    public function gallery()
    {
        return $this->hasMany(TourImage::class);
    }
     public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
