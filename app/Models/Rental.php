<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Rental extends Model
{
 
    use HasTranslations;

    protected $fillable = [
        'name',
        'description', 
        'price',
        'type',
        'unit',
        'address',
        'amenities',
        'phone',
        'email',
        'latitude',
        'longitude',
        'main_image',
       
    ];
protected $casts = [
    'name'        => 'array',
    'description' => 'array',
    'address'     => 'array',
    'amenities'     => 'array',
  
];
    public $translatable = ['name', 'description', 'address'];

    public function gallery()
{
    return $this->hasMany(RentalImage::class);
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
