<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->after('name');
            $table->date('birthday')->after('password');
            $table->integer('status')->after('birthday')->default(1);
            $table->string('avatar')->after('status')->default('/storage/images/avatar/avatar-default.png');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('birthday');
            $table->dropColumn('status');
            $table->dropColumn('avatar');
        });
    }
}
