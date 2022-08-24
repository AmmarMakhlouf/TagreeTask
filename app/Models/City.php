<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    /**
     * The clinics that are in this city.
     */
    public function clinics()
    {
        return $this->belongsToMany(Clinic::class);
    }
}
