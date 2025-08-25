<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Site extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name', 'description', 'address', 'type', 'latitude', 'longitude', 'opening_hours','amenities','slug','main_image'
    ];

    public $translatable = ['name', 'description', 'address','opening_hours'];
    protected $casts = [
    'name'        => 'array',
    'description' => 'array',
    'address'     => 'array',
    'opening_hours' => 'array',
    'amenities'  => 'array',
   
];

    public function gallery()
    {
        return $this->hasMany(SiteImage::class);
    }
}
