<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::factory(count:50)->create();
        foreach ((range(1, 20)) as $index) {
            DB::table('serviceables')->insert(
                [
                    'service_id' => Service::inRandomOrder()->first()->id,
                    'serviceable_id'   => Clinic::inRandomOrder()->first()->id,
                    'serviceable_type' => 'App\Models\Clinic'
                ]
            );
    
        }
        foreach ((range(1, 20)) as $index) {
            DB::table('serviceables')->insert(
                [
                    'service_id' => Service::inRandomOrder()->first()->id,
                    'serviceable_id'   => Doctor::inRandomOrder()->first()->id,
                    'serviceable_type' => 'App\Models\Doctor'
                ]
            );
    
        }
    }
}
