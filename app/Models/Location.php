<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude'];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
