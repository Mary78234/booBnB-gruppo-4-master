<?php

use App\House;
use App\View;
use Illuminate\Database\Seeder;

class UpdateViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $views = View::all();
        foreach($views as $view){
            $data = [
            'house_id' => House::inRandomOrder()->first()->id
            ];
	    	 $view->update($data);
        }
    }
}
