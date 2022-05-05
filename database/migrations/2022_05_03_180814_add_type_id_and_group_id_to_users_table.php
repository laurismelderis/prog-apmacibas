<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema,
};
use App\Models\{
    Type,
    Group,
};

class AddTypeIdAndGroupIdToUsersTable extends Migration
{

    public function up ()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Type::class);
            $table->foreignIdFor(Group::class);
        });
    }

    public function down ()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['type_id', 'group_id']);
        });
    }
}
