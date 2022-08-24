<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    /**
     * Get the clinic that the doctor works in.
     */
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    /**
     * The citys that belong to the clinic.
     */
    public function cities()
    {
        return $this->clinic()::cities();
    }
    /**
     * Get all of the services for the doctor.
     */
    public function services()
    {
        return $this->morphToMany(Service::class, 'serviceable');
    }
}
