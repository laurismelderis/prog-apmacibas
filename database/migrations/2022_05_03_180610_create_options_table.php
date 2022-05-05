<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};
use App\Models\Question;

class CreateOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();

            $table->string('text');
            $table->float('points');
            $table->enum('type', [
                'checkbox',
                'radio',
                'text',
                'number',
            ]);
            $table
                ->boolean('is_correct')
                ->default(false);
            $table->foreignIdFor(Question::class);
        

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('options');
    }
}
