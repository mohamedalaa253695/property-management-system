<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            GovernorateSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            ComplexSeeder::class,
            PropertyStatusSeeder::class,
            PropertySeeder::class

        ]);
    }
}
