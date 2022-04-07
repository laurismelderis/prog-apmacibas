<?php

namespace Database\Seeders;

use Illuminate\{
    Support\Facades\Hash,
    Database\Seeder,
};

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run ()
    {
        $className = get_class($this);

        if (checkIfSeeded($className)) {
            echo "Already seeded \n";
            return;
        }

        User::factory()
            ->count(1)
            ->testUser()
            ->create();

        storeSeed($className);
    }
}
