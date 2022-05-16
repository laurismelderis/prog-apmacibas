<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(checkIfSeeded(get_class($this))){
            echo "Already seeded \n";
            return;
        }
        $names = ['individual','teacher','student'];
        foreach($names as $name){
            Type::create(array('name' => $name));
        }

        storeSeed(get_class($this));
    }
}
