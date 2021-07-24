<?php

use App\Feature;
use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_features = [
            'WiFi',
            'Posto macchina',
            'Piscina',
            'Idromassaggio',
            'Portineria',
            'Sauna',
            'Vista mare',
            'Aria condizionata',
            'Animali domestici ammessi',
            'Cucina',
            'Bagno Privato'
        ];

        foreach ($array_features as $feature){
            $new_feature = new Feature();
            $new_feature->name = $feature;
            $new_feature->save();
        }
    }
}
