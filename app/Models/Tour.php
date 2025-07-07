<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Tour extends Model
{
     use HasTranslations;

    protected $fillable = [
        'name', 'description', 'includes', 'duration', 'price', 'phone', 'main_image'
    ];

    public $translatable = ['name', 'description', 'includes'];

    public function gallery()
    {
        return $this->hasMany(TourImage::class);
    }
}
