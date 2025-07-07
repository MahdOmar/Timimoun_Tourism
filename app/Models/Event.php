<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Event extends Model
{
      use HasTranslations;

    protected $fillable = [
        'name', 'description', 'address', 'start_date', 'end_date', 'main_image', 'category',
    ];

    public $translatable = ['name', 'description', 'address'];

    public function gallery()
    {
        return $this->hasMany(EventImage::class);
    }
}
