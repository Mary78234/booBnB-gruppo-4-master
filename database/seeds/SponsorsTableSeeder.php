<?php

use App\Sponsor;
use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_sponsors = [
            ['Bronzo', 2.99, 24],
            ['Argento', 5.99, 72],
            ['Oro', 9.99, 144]
        ];

        foreach ($array_sponsors as $sponsor) {
            $new_sponsor = new Sponsor();
            $new_sponsor->name = $sponsor[0];
            $new_sponsor->price = $sponsor[1];
            $new_sponsor->duration = $sponsor[2];
            $new_sponsor->save();
        }
    }
}
