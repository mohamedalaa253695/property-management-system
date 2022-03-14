<?php
namespace Database\Factories;

use App\Models\City;
use App\Models\Complex;
use App\Models\Country;
use App\Models\Building;
use App\Models\Governorate;
use App\Models\PropertyStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
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
            'complex_id' => Complex::factory(),
            'building_id' => Building::factory(),
            'status_id' => PropertyStatus::factory(),
            'price' => $this->faker->numberBetween(100000, 200000),

        ];
    }
}
