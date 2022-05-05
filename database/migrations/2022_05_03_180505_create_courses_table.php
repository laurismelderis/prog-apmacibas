<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};

class CreateCoursesTable extends Migration
{
    public function up ()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description');

            $table->timestamps();
        });
    }

    public function down ()
    {
        Schema::dropIfExists('courses');
    }
}
