<?php
namespace Tests\Feature;

use App\Models\Complex;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComplexTest extends TestCase
{
    use RefreshDatabase;

    public function test_authorized_user_can_create_complex()
    {
        $this->withoutExceptionHandling();
        $attributes = ['name' => 'complex name', 'country_id' => 1, 'city_id' => 1];
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/complexes', $attributes)->assertRedirect('/complexes') ;
        $this->get('/complexes')->assertSee($attributes['name']);
        $this->assertDatabaseHas('complexes', $attributes);
    }

    public function test_authorized_user_can_update_complex()
    {
        $this->withoutExceptionHandling();

        // $attributes = ['id' => 1, 'name' => 'Changed name', 'country_id' => 1, 'city_id' => 1];
        $complex = Complex::factory()->create();
        $complex->name = 'new Name';

        $this->actingAs(User::factory()->create())->patch('/complexes/' . $complex->id, $complex->toArray())->assertRedirect('/complexes') ;
        $this->assertDatabaseHas('complexes', ['name' => $complex->name]);
    }

    public function test_authorized_user_can_destroy_a_complex()
    {
        $complex = Complex::factory()->create();
        $this->assertDatabaseHas('complexes', ['name' => $complex->name]);
        $this->actingAs(User::factory()->create())->delete('/complexes/' . $complex->id)->assertRedirect('/complexes');
        $this->assertDatabaseMissing('complexes', ['name' => $complex->name]);
    }
}
