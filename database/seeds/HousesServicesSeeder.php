<?php


use App\House;
use App\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HousesServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        for($i=1; $i <= 10; $i++) {

            DB::table('house_service')->insert([
                'house_id' => House::inRandomOrder()->first()->id,
                'service_id' => Service::inRandomOrder()->first()->id
            ]);

        }
    }
}