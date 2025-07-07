<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Site extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name', 'description', 'address', 'category', 'latitude', 'longitude', 'main_image'
    ];

    public $translatable = ['name', 'description', 'address'];

    public function gallery()
    {
        return $this->hasMany(SiteImage::class);
    }
}
