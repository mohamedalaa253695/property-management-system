<?php
namespace Tests\Feature;

use App\Models\Governorate;
use Tests\TestCase;
use App\Models\User;

class GovernorateTest extends TestCase
{
    public function test_authorized_user_can_create_governorate()
    {
        $this->withoutExceptionHandling();
        $attributes = ['name' => 'governorate name', 'country_id' => 1, 'city_id' => 1];
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/governorates', $attributes)->assertRedirect('/governorates') ;
        $this->get('/governorates')->assertSee($attributes['name']);
        $this->assertDatabaseHas('governorates', $attributes);
    }

    public function test_authorized_user_can_update_governorate()
    {
        $this->withoutExceptionHandling();

        // $attributes = ['id' => 1, 'name' => 'Changed name', 'country_id' => 1, 'city_id' => 1];
        $governorate = Governorate::factory()->create();
        $governorate->name = 'new Name';

        $this->actingAs(User::factory()->create())->patch('/governorates/' . $governorate->id, $governorate->toArray())->assertRedirect('/governorates') ;
        $this->assertDatabaseHas('governorates', ['name' => $governorate->name]);
    }

    public function test_authorized_user_can_destroy_a_governorate()
    {
        $governorate = Governorate::factory()->create();
        $this->assertDatabaseHas('governorates', ['name' => $governorate->name]);
        $this->actingAs(User::factory()->create())->delete('/governorates/' . $governorate->id)->assertRedirect('/governorates');
        $this->assertDatabaseMissing('governorates', ['name' => $governorate->name]);
    }
}
