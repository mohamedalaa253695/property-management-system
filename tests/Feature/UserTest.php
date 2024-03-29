<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;

class UserTest extends TestCase
{
    use  RefreshDatabase ,WithFaker ;

    public function test_user_list_route()
    {
        $this->withoutMiddleware();
        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    public function user_can_list_all_users()
    {
        $user = User::factory()->create();
        $response = $this->get('users');
        $response->assertSee($user->name);
    }

    public function test_authenticted_users_can_go_to_user_creation_form_route()
    {
        // when user het /user/create
        $this->withoutMiddleware();
        $response = $this->get('users/create');
        $response->assertStatus(200);
        // show him the create view
    }

    public function test_authenticted_users_can_store_new_user()
    {
        $this->withoutMiddleware();
        $attributes = [
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->name,
            'password' => $this->faker->password(), // password
            // 'remember_token' => Str::random(10)
        ];

        $this->post('users/store', $attributes);

        $users = User::all();
        $user = $users->first();
        $this->assertCount(1, $users);
        // $this->assertAuthenticatedAs($user);
        $this->assertEquals($attributes['username'], $user->name);
        $this->assertEquals($attributes['email'], $user->email);
        $this->assertTrue(Hash::check($attributes['password'], $user->password));
    }
}
