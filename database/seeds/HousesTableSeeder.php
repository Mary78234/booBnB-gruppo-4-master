<?php

use App\House;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            $new_house = new House();
            $new_house->title = "Casa " . ($i + 1);
            $new_house->slug = Str::slug($new_house->title, '-');
            $new_house->description = "Descrizione casa: " . ($i + 1);
            $new_house->beds = rand(1, 6);
            $new_house->bathrooms = rand(1, 3);
            $new_house->square_metre = rand(25, 300);
            $new_house->country = "Country " . ($i + 1);
            $new_house->city = "City " . ($i + 1);
            $new_house->address = "Address " . ($i + 1);
            $new_house->long = rand(400000001, 419999999)/10000000;
            $new_house->lat = rand(140000001, 149999999)/10000000;
            $new_house->image = "Immagine" . ($i + 1);
            $new_house->save();
        }
    }
}


