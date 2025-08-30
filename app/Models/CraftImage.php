<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CraftImage extends Model
{
     protected $fillable = [
        'craft_id',
        'path',
    ];
    public function craft()
{
    return $this->belongsTo(Craft::class);
}
}
