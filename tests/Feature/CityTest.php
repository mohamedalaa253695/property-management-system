<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_city()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        $attributes = [
            'name' => 'cairo',
            'country_id' => 1,
            'governorate_id' => 1
        ];

        $this->post('/cities', $attributes)->assertRedirect('/cities');

        $this->assertDatabaseHas('cities', $attributes);
    }

    public function test_admin_can_update_a_city()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $city = City::factory()->make();

        $this->actingAs($user)->post('/cities', $city->toArray())->assertRedirect('/cities');
        // dump($city);
        $city->id = 1;
        $city->name = 'changed';
        $city->country_id = 1;

        // dd($city);
        $this->actingAs($user)->post('/cities/' . $city->id, $city->toArray())->assertRedirect('/cities');

        $this->assertDatabaseHas('cities', $city->toArray());
    }

    public function test_admin_can_delete_a_city()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $city = City::factory()->create();

        $this->assertDatabaseHas('cities', ['name' => $city->name]);

        $this->actingAs($user)->delete('/cities/' . $city->id)->assertRedirect('/cities');
        $this->assertDatabaseMissing('cities', ['name' => $city->name]);
    }
}
