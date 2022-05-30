<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};
use App\{
    Models\Type,
    Models\Group,
};

class AddSurnameToUsersTable extends Migration
{
    public function up ()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('grade')->nullable();
            $table->foreignIdFor(Type::class)->nullable()->change();
            $table->foreignIdFor(Group::class)->nullable()->change();
            $table->string('surname')->nullable();
        });
    }

    public function down ()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
        });
    }
}
