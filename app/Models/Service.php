<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    /**
     * Get all of the clinics that are assigned this service.
     */
    public function clinics()
    {
        return $this->morphedByMany(Clinic::class, 'serviceable');
    }
 
    /**
     * Get all of the doctors that are assigned this service.
     */
    public function doctors()
    {
        return $this->morphedByMany(Doctor::class, 'serviceable');
    }
}
