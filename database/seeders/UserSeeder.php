<?php

namespace Database\Seeders;

use Illuminate\{
    Support\Facades\Hash,
    Database\Seeder,
};

use App\Models\User;
use App\Models\Type;
use App\Models\Group;

class UserSeeder extends Seeder
{
    public function run ()
    {
        if(checkIfSeeded(get_class($this))){
            echo "Already seeded \n";
            return;
        }
        $groups = Group::pluck('name', 'id');
        $types = Type::pluck('name', 'id');

        foreach($groups as $groupId => $group){
            foreach($types as $typeId => $type){
                if($type === 'teacher' && $group !== 'individual'){
                    User::factory()
                    ->count(1)
                    ->user($typeId, $groupId)
                    ->create();
                } elseif($type === 'student' && $group !== 'individual'){
                    User::factory()
                    ->count(10)
                    ->user($typeId, $groupId)
                    ->create();
                }elseif($type === 'individual' && $group === 'individual'){
                    User::factory()
                    ->count(10)
                    ->user($typeId, $groupId)
                    ->create();
                }
            }
        }

        storeSeed(get_class($this));
    }
}
