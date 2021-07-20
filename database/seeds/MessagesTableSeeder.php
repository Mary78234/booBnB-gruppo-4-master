<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++){
            $new_message = new Message();
            $new_message->title = "Titolo messaggio " . ($i + 1);
            $new_message->mail = "prova". ($i + 1) . "@mail.com";
            $new_message->content = ($i + 1) . " - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ";
            $new_message->save();
        }
    }
}
