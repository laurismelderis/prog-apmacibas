<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(checkIfSeeded(get_class($this))){
            echo 'Already seeded \n';
            return;
        }
        $groups = ['individual', 'RTU', 'LLU'];
        foreach($groups as $group){
            Group::create(array('name' => $group));
        }

        storeSeed(get_class($this));
    }
}
