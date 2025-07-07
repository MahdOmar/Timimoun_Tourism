<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelAgencyImage extends Model
{
    protected $fillable = ['travel_agency_id','path'];

    public function travelAgency()
    {
        return $this->belongsTo(TravelAgency::class);
    }
}
