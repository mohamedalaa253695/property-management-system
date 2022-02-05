<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Mohamed Alaa',
            'email' => 'mohamed@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
