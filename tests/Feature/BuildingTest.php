<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Building;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuildingTest extends TestCase
{
    use RefreshDatabase , DatabaseMigrations;

    public function test_authorized_user_can_create_building()
    {
        $user = User::factory()->create();
        $building = Building::factory()->raw();
        // dd($building);

        $this->actingAs($user)->post('/buildings', $building)->assertRedirect('/buildings');

        $this->assertDatabaseHas('buildings', $building);
    }

    public function test_authorized_user_can_update_building()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $building = Building::factory()->raw();

        $this->actingAs($user)->post('/buildings', $building)->assertRedirect('/buildings');
        $this->assertDatabaseHas('buildings', $building);

        $building = Building::where('number', $building['number'])->first();
        $building->number = 2;

        $this->actingAs($user)->patch('/buildings/' . $building->id, $building->toArray())->assertRedirect('/buildings');
        // dd('here');
        $this->assertDatabaseHas('buildings', ['number' => $building->number,
            'country_id' => $building->country_id,
            'governorate_id' => $building->governorate_id,
            'city_id' => $building->city_id,
            'complex_id' => $building->complex_id,
        ]);
    }

    public function test_authorized_user_can_delete_building()
    {
        $user = User::factory()->create();
        $building = Building::factory()->raw();
        $this->actingAs($user)->post('/buildings', $building)->assertRedirect('/buildings');
        $this->assertDatabaseHas('buildings', $building);
        $building = Building::where('number', $building['number'])->first();
        $this->actingAs($user)->delete('buildings' . $building['id']);
        $this->assertDatabaseMissing('buildings', $building->toArray());
    }
}
