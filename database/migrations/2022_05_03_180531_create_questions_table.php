<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};
use App\Models\Course;

class CreateQuestionsTable extends Migration
{
    public function up ()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->string('text');
            $table->foreignIdFor(Course::class);

            $table->timestamps();
        });
    }

    public function down ()
    {
        Schema::dropIfExists('questions');
    }
}
