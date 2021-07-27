<?php

use App\House;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


        for ($i=0; $i < 50; $i++) { 
            $new_house = new House();
            $new_house->title = "Casa " . ($i + 1);
            $new_house->slug = Str::slug($new_house->title, '-');
            $new_house->description = "Descrizione casa: " . ($i + 1);
            $new_house->beds = rand(1, 6);
            $new_house->bathrooms = rand(1, 3);
            $new_house->visibility = $faker->boolean();
            $new_house->rooms_number = rand (3, 20);
            $new_house->square_metre = rand(25, 300);
            $new_house->country = $faker->country();
            $new_house->city = $faker->city();
            $new_house->address = $faker->address();
            $new_house->image = $faker->imageUrl(640, 480, "animals", true);
            $new_house->save();
        }
    }
}


