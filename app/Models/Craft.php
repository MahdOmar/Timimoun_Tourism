<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Craft extends Model
{
    use HasTranslations;

    protected $fillable = [
        'category',
        'name',
        'description',
        'location',
        'min_price',
        'max_price',
        'main_image',
        'phone',
        'email',
        'latitude',
        'longitude',
    ];
protected $casts = [
    'name'        => 'array',
    'description' => 'array',
    'location'     => 'array',
  
];
    public $translatable = ['name', 'description', 'location'];

    public function gallery()
{
    return $this->hasMany(CraftImage::class);
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
