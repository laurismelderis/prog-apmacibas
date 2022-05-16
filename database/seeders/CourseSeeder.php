<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
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
        Course::factory()
        ->count(1)
        ->python()
        ->create();

        storeSeed(get_class($this));
    }
}
