<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema
};

class ChangeTextFieldNullableToAnswersTable extends Migration
{
    public function up ()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table
                ->string('text')
                ->nullable()
                ->change();
        });
    }

    public function down () {}
}
