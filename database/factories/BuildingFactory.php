<?php
namespace Database\Factories;

use App\Models\City;
use App\Models\Complex;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->numberBetween(1, 20),
            'country_id' => Country::factory(),
            'governorate_id' => Governorate::factory(),
            'city_id' => City::factory(),
            'complex_id' => Complex::factory()
        ];
    }
}
