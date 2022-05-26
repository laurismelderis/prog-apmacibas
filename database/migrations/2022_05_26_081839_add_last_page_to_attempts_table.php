<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};

class AddLastPageToAttemptsTable extends Migration
{
    public function up ()
    {
        Schema::table('attempts', function (Blueprint $table) {
            $table->integer('last_page')->nullable();
        });
    }

    public function down ()
    {
        Schema::table('attempts', function (Blueprint $table) {
            $table->dropColumn('last_page');
        });
    }
}
