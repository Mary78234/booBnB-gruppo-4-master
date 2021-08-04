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
            /* UsersTableSeeder::class,
            MessagesTableSeeder::class, */
            SponsorsTableSeeder::class,
            /* HousesTableSeeder::class,
            UpdateHousesSeeder::class,
            UpdateMessagesSeeder::class,
            ViewsTableSeeder::class,
            UpdateViewsSeeder::class, */
            ServicesTableSeeder::class,
            /* HousesServicesSeeder::class,
            HousesSponsorsSeeder::class */
        ]);
    }
}
