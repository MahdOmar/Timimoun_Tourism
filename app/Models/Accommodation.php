<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Accommodation extends Model
{
      use HasTranslations;

    protected $fillable = [
        'type',
        'name',
        'description',
        'address',
        'price_range',
        'main_image',
        'phone',
        'email',
        'website',
        'lat',
        'lng',
    ];

    public $translatable = ['name', 'description', 'address'];

    public function gallery()
{
    return $this->hasMany(AccommodationImage::class);
}
}
