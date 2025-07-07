<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TravelAgency extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name', 'description', 'address', 'phone', 'email', 'website', 'main_image'
    ];

    public $translatable = ['name', 'description', 'address'];

    public function gallery()
    {
        return $this->hasMany(TravelAgencyImage::class);
    }
}