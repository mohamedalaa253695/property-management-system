<?php
namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->numberBetween(200000, 400000);
        return [
            'property_id' => Property::factory()->create(),
            'invoice_number' => $this->faker->numberBetween(4556, 4666),
            'description' => $this->faker->sentence(),
            'qty' => 1,
            'price' => $price,
            'total' => $price,
            'issue_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'customer_name' => $this->faker->name(),
            'customer_email' => $this->faker->email(),
            'customer_address' => $this->faker->address(),
            'customer_phone' => $this->faker->phoneNumber(),

        ];
    }
}
