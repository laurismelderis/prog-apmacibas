<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCorrectAnswerToOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->string('correct_answer');
        });
    }

    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->string('correct_answer');
        });
    }
}
