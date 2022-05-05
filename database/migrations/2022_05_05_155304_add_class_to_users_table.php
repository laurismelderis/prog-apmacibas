<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};

class AddClassToUsersTable extends Migration
{
    public function up ()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('garade');
        });
    }
}
