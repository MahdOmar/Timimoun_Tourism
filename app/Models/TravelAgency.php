<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TravelAgency extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name', 'description', 'address', 'phone', 'email', 'website','latitude','longitude', 'main_image'
    ];
    protected $casts = [
    'name'        => 'array',
    'description' => 'array',
    'includes'     => 'array',
   
];

    public $translatable = ['name', 'description', 'address'];

    public function gallery()
    {
        return $this->hasMany(TravelAgencyImage::class);
    }
}