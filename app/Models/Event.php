<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Event extends Model
{
      use HasTranslations;

    protected $fillable = [
        'name', 'description', 'address','category','start_date', 'end_date', 'main_image', 'latitude', 'longitude','price'
    ];
    protected $casts = [
    'name'        => 'array',
    'description' => 'array',
    'address'     => 'array',
   
];

    public $translatable = ['name', 'description', 'address'];

    public function gallery()
    {
        return $this->hasMany(EventImage::class);
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
