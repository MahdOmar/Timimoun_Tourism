<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

use Spatie\Translatable\HasTranslations;
class ProviderTraditionalDish extends Pivot
{
     use HasTranslations;

    protected $table = 'provider_traditional_dish';

    protected $fillable = [
        'foode_and_drink_id',
        'traditional_dish_id',
        'price',
        'includes',
    ];

    protected $casts = [
        'includes' => 'array',
    ];

    public $translatable = ['includes'];
}
