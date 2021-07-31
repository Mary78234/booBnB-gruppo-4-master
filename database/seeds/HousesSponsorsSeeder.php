<?php

use App\House;
use App\Sponsor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class HousesSponsorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i <= 10; $i++) {

            DB::table('house_sponsor')->insert([
                'house_id' => House::inRandomOrder()->first()->id,
                'expire_date'=> $faker->date($format = 'Y-m-d', $max = 'now'),
                'sponsor_id' => Sponsor::inRandomOrder()->first()->id
            ]);

        }
    }
}
