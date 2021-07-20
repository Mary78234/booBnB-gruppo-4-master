<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10 ; $i++) { 
            
            $new_user = new User();
            $new_user->name = 'Utente ' . ($i+1);
            $new_user->surname = 'Cognome ' . ($i+1);
            $new_user->date_of_birth = rand(1950, 2002) . "-" . rand(1, 12) . "-" . rand(1, 31);
            $new_user->email = 'utente' . ($i+1) . '@email' . ($i+1) . '.com';
            $new_user->password = Hash::make('password');
            $new_user->save();
        }
    }
}
