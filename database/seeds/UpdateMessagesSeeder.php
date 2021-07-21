<?php

use App\House;
use App\Message;
use Illuminate\Database\Seeder;

class UpdateMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = Message::all();
        foreach($messages as $message){
            $data = [
            'house_id' => House::inRandomOrder()->first()->id
            ];
	    	 $message->update($data);
        }
    }
}
