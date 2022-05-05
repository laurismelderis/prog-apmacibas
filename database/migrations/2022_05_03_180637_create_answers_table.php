<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};
use App\Models\{
    Course,
    Option,
    User,
};

class CreateAnswersTable extends Migration
{
    public function up ()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();

            $table->ForeignIdFor(User::class);
            $table->ForeignIdFor(Course::class);
            $table->ForeignIdFor(Option::class);

            $table->timestamps();
        });
    }

    public function down ()
    {
        Schema::dropIfExists('answers');
    }
}
