<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};

class RenameAttemptsTable extends Migration
{
    public function up ()
    {
        DB::statement('RENAME table attemps TO attempts');
    }
}
