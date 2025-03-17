<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("telegram_username",100)->after("telegram_account_id")->nullable();
            $table->string("telegram_id",15)->after("telegram_username")->index()->nullable();
            $table->string("telegram_code",10)->after("telegram_id")->nullable();
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
            $table->dropColumn("telegram_username");
            $table->dropColumn("telegram_id");
            $table->dropColumn("telegram_code");
        });
    }
}
