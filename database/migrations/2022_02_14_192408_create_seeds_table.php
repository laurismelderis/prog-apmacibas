<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};

class CreateSeedsTable extends Migration
{
    public function up ()
    {
        Schema::create('seeds', function (Blueprint $table) {
            $table->id();
            $table->string('seed');
            $table->timestamps();
        });
    }

    public function down ()
    {
        Schema::dropIfExists('seeds');
    }
}
