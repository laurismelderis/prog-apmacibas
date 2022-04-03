<?php

namespace Database\Seeders;

use Illuminate\{
    Support\Facades\Hash,
    Database\Seeder,
};
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        echo checkIfSeeded($this);
        if (checkIfSeeded('UserSeeder')) return 
        $test = '123';
        $cilveks = new User();
        dd($test);
        // User::create([
        //     'name' => 'davids'
        // ]);
        $user->name = 'test';
        $user->email = 'test@gmail.com';
        $user->password = Hash::make('parole');
        
        $user->save();

        storeSeed($this);
    }
}
