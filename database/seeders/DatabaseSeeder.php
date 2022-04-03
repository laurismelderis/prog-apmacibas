<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\{
    Database\Seeder,
};

class DatabaseSeeder extends Seeder
{ 
    public function run ()
    {
        //$this->call('Database\Seeders\UsersSeeder');
        $files_arr = scandir( dirname(__FILE__) );

        foreach ($files_arr as $key => $file){
            if ($file !== 'DatabaseSeeder.php' && $file[0] !== "." ){
                $seeder = "Database\Seeders\\". explode('.', $file)[0];
                echo $seeder;
                $this->call($seeder);
            }
        }
    }
}
