<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodAndDrinkImage extends Model
{
    protected $fillable = ['food_and_drink_id','path'];
    public function foodAndDrink()
{
    return $this->belongsTo(FoodAndDrink::class);
}
}
