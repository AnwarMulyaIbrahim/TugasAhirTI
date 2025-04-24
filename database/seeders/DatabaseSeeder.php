<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProvincesTableSeeder;
use Database\Seeders\CitiesTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProvincesTableSeeder::class,
            CitiesTableSeeder::class,
        ]);
    }
}
