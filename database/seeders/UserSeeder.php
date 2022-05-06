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
        $className = get_class($this);
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

        storeSeed($className);
    }
}
