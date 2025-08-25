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
        'stars',
        'min_price',
        'max_price',
        'amenities',
        'main_image',
        'phone',
        'email',
        'website',
        'latitude',
        'longitude',
    ];
protected $casts = [
    'amenities'   => 'array',
    'name'        => 'array',
    'description' => 'array',
    'address'     => 'array',
    'stars'       => 'integer',
];
    public $translatable = ['name', 'description', 'address'];

    public function gallery()
{
    return $this->hasMany(AccommodationImage::class);
}
}
