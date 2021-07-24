<?php

use App\House;
use App\Sponsor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HousesSponsorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i <= 10; $i++) {

            DB::table('house_sponsor')->insert([
                'house_id' => House::inRandomOrder()->first()->id,
                'sponsor_id' => Sponsor::inRandomOrder()->first()->id
            ]);

        }
    }
}
