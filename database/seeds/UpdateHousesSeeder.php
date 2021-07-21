<?php

use App\House;
use App\User;
use Illuminate\Database\Seeder;

class UpdateHousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houses = House::all();
        foreach($houses as $house){
            $data = [
            'user_id' => User::inRandomOrder()->first()->id
            ];
	    	 $house->update($data);
        }
    }
}
