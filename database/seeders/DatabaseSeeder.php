<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitySeeder::class);
        $this->call(ClinicSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(ServiceSeeder::class);
        
    }
}
