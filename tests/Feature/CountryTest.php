<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Factories\CountryFactory;
use Illuminate\Http\Client\Request;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_a_user_can_list_countries()
    {
        $this->withoutMiddleware();
        $country = Country::factory()->create();
        $this->get('/countries')->assertSee($country->country_name);
    }

    public function test_it_can_store_country()
    {
        $this->withoutMiddleware();
        $attributes = [
            'country_name' => $this->faker->company,

        ];


        $response = $this->post('countries/store', $attributes)->assertRedirect('/countries');


        $this->assertDatabaseHas('countries', $attributes);

        $this->get('countries')->assertSee($attributes['country_name']);
    }


    public function test_a_country_requires_a_name()
    {
        $this->withoutMiddleware();

        $attributes = Country::factory()->raw(['country_name' => '']);

        $response = $this->post('/countries/store', $attributes)->assertSessionHasErrors('country_name');
        $response->dumpSession();
    }


    public function test_a_user_can_edit_a_country()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
        $country = Country::factory()->create();
        $this->get('countries/edit/' . $country->id)
            ->assertSee($country->country_name);
    }



    public function test_user_can_delete_country()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
        $country = Country::factory()->make();
        $this->delete('countries/destroy/' . $country->id)->assertRedirect('/countries');

        $this->assertDatabaseMissing('countries', (array)$country);
    }
}
