<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

     protected $fillable = [
        'name',
        'email',
        'rating',
        'comment',
        'reviewable_id',
        'reviewable_type',
        
        
       
    ];

      public function reviewable()
    {
        return $this->morphTo();
    }

}
