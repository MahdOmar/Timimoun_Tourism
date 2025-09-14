<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class TraditionalDish extends Model
{
      use HasTranslations;

    protected $fillable = [
        'name', 'description','main_image'
    ];

    public $translatable = ['name', 'description'];
     protected $casts = [
    'name'        => 'array',
    'description' => 'array',
   
   
];

 public function gallery()
    {
        return $this->hasMany(TraditionalDishImage::class);
    }


 public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

      public function restaurants()
    {
        return $this->belongsToMany(FoodAndDrink::class, 'providers_traditional_dish')
                     ->using(ProviderTraditionalDish::class)
                    ->withPivot(['price','includes'])
                    ->withTimestamps();
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }

   
public function minPrice()
{
    return $this->restaurants()->min('providers_traditional_dish.price');
}

public function maxPrice()
{
    return $this->restaurants()->max('providers_traditional_dish.price');
}

public function averagePrice()
{
    return $this->restaurants()->avg('providers_traditional_dish.price');
}




}
