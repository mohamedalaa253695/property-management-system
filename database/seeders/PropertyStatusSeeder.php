<?php
namespace Database\Seeders;

use App\Models\PropertyStatus;
use Illuminate\Database\Seeder;

 class PropertyStatusSeeder extends Seeder
 {
     public function run()
     {
         PropertyStatus::factory(5)->create();
     }
 }
