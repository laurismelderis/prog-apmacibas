<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};
use App\Models\{
    Course,
    User,
};

class CreateAttempsTable extends Migration
{
    public function up ()
    {
        Schema::create('attemps', function (Blueprint $table) {
            $table->id();

            $table
                ->timestamp('submitted_at')
                ->nullable();
            $table->ForeignIdFor(User::class);
            $table->ForeignIdFor(Course::class);

            $table->timestamps();
        });
    }

    public function down ()
    {
        Schema::dropIfExists('attemps');
    }
}
