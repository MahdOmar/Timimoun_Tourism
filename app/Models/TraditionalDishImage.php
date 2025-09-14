<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraditionalDishImage extends Model
{
    
     protected $fillable = ['traditional_dish_id','path'];

    public function traditionalDish()
    {
        return $this->belongsTo(TraditionalDish::class);
    }
}
