<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    /**
     * Get the doctors for the clinic.
     */
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
    
    /**
     * The citys that belong to the clinic.
     */
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    /**
     * Get all of the services for the clinic.
     */
    public function services()
    {
        return $this->morphToMany(Service::class, 'serviceable');
    }
}
