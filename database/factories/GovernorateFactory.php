<?php
namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class GovernorateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $governorates_names = ['cairo', 'Aswan', 'Alexanderia', 'suhag'];
        $rand_key = array_rand($governorates_names);
        return [
            'name' => $governorates_names[$rand_key],
            'country_id' => Country::factory(),
        ];
    }
}
