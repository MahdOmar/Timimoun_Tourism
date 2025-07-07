<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FoodAndDrink extends Model
{
     use HasTranslations;

    protected $fillable = [
        'name', 'description', 'address', 'type', 'main_image',
    ];

    public $translatable = ['name', 'description', 'address'];
    public function gallery()
{
    return $this->hasMany(FoodAndDrinkImage::class);
}
}
