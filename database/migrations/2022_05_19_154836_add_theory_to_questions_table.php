<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};

class AddTheoryToQuestionsTable extends Migration
{
    public function up ()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->boolean('theory')->nullable();
            $table->string('description')->nullable();
        });
    }

    public function down ()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'theory',
            ]);
        });
    }
}
