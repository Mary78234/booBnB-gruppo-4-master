<?php

use App\Feature;
use App\House;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HousesFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        for($i=1; $i <= 10; $i++) {

            DB::table('house_feature')->insert([
                'house_id' => House::inRandomOrder()->first()->id,
                'feature_id' => Feature::inRandomOrder()->first()->id
            ]);

        }
    }
}