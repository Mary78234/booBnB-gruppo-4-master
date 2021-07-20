<?php

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
            UsersTableSeeder::class,
            FeaturesTableSeeder::class,
            MessagesTableSeeder::class,
            SponsorsTableSeeder::class,
            HousesTableSeeder::class,
            UpdateHousesSeeder::class
        ]);
    }
}
