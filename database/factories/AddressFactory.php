<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Clinic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'city_id' => City::inRandomOrder()->first()->id,
            'clinic_id' => Clinic::inRandomOrder()->first()->id,
            'street' => $this->faker->streetAddress(),
            'building'=>$this->faker->buildingNumber(),
            'entrance'=>$this->faker->numberBetween(1,20),
            'floor'=>$this->faker->numberBetween(1,15),
            'doornumber'=>$this->faker->numberBetween(1,90),
        ];
    }
}
