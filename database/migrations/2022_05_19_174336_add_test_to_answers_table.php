<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};

class AddTestToAnswersTable extends Migration
{
    public function up ()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->string('text');
        });
    }

    public function down ()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('text');
        });
    }
}
