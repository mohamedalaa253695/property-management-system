<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PropertyTest extends TestCase
{
    use RefreshDatabase , DatabaseMigrations;

    public function test_authorized_user_can_create_property()
    {
        $user = User::factory()->create();
        $property = Property::factory()->raw();

        $this->actingAs($user)->post('/properties/store', $property)->assertRedirect('/properties');

        $this->assertDatabaseHas('properties', $property);
    }

    public function test_authorized_user_can_update_property()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $property = Property::factory()->raw();

        $this->actingAs($user)->post('/properties/store', $property)->assertRedirect('/properties');
        $this->assertDatabaseHas('properties', $property);

        $property = Property::where('number', $property['number'])->first();
        $property->number = 2;

        $this->actingAs($user)->patch('/properties/' . $property->id, $property->toArray())->assertRedirect('/properties');
        // dd('here');
        $this->assertDatabaseHas('properties', ['number' => $property->number,
            'country_id' => $property->country_id,
            'governorate_id' => $property->governorate_id,
            'city_id' => $property->city_id,
            'complex_id' => $property->complex_id,
        ]);
    }

    public function test_authorized_user_can_delete_property()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $property = Property::factory()->raw();
        $this->actingAs($user)->post('/properties/store', $property)->assertRedirect('/properties');
        $this->assertDatabaseHas('properties', $property);
        $property = Property::where('number', $property['number'])->first();
        $this->actingAs($user)->delete('properties/' . $property['id']);
        $this->assertDatabaseMissing('properties', $property->toArray());
    }
}
