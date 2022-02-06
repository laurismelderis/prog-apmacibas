<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\{
    Support\Facades\Hash,
    Database\Seeder,
};

class DatabaseSeeder extends Seeder
{ 
    public function run ()
    {

        $user = new User();

        $user->name = 'test';
        $user->email = 'test@gmail.com';
        $user->password = Hash::make('parole');
        
        $user->save();
    }
}
