<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $propertyStatuses = ['rented', 'sold', 'for sale', 'for rental'];
        $randkey = array_rand($propertyStatuses);

        return [
            'name' => $propertyStatuses[$randkey],
        ];
    }
}
