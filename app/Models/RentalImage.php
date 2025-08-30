<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalImage extends Model
{
     protected $fillable = ['rental_id','path'];
    public function rental()
{
    return $this->belongsTo(Rental::class);
}
}
