<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FoodAndDrink extends Model
{
     use HasTranslations;

    protected $fillable = [
        'name', 'description', 'address', 'type','phone','email','website','min_price','max_price','latitude','longitude', 'main_image',
    ];

    public $translatable = ['name', 'description', 'address'];
     protected $casts = [
    'name'        => 'array',
    'description' => 'array',
    'address'     => 'array',
   
];
    public function gallery()
{
    return $this->hasMany(FoodAndDrinkImage::class);
}

 public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }

      public function traditionalDishes()
    {
        return $this->belongsToMany(TraditionalDish::class, 'providers_traditional_dish')
                    ->withPivot(['price','includes'])
                    ->withTimestamps();
    }
}
