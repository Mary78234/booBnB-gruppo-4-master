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
            ['Bronzo', 2.99, 24, 'Se scegli Bronzo, hai diritto a 24h di sponsorizzazione' ],
            ['Argento', 5.99, 72, 'Se scegli Argento, hai diritto a 72h di sponsorizzazione'],
            ['Oro', 9.99, 144, 'Se scegli Oro, hai diritto a 144h di sponsorizzazione']
        ];

        foreach ($array_sponsors as $sponsor) {
            $new_sponsor = new Sponsor();
            $new_sponsor->name = $sponsor[0];
            $new_sponsor->price = $sponsor[1];
            $new_sponsor->duration = $sponsor[2];
            $new_sponsor->description = $sponsor[3];
            $new_sponsor->save();
        }
    }
}
