<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccommodationImage extends Model

{

     protected $fillable = [
        'accommodation_id',
        'path',
    ];
    public function accommodation()
{
    return $this->belongsTo(Accommodation::class);
}
}
