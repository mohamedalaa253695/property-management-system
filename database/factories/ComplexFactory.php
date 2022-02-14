<?php
namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplexFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'country_id' => Country::factory(),
            'city_id' => City::factory(),
            'governorate_id' => Governorate::factory()
        ];
    }
}
