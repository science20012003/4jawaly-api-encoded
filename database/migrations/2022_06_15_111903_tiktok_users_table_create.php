<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TiktokUsersTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiktok_users', function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->timestamps();
        });

        Schema::create('tiktok_user_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tiktok_user_id")->constrained("tiktok_users");
            $table->timestamp("start_at");
            $table->timestamp("end_at")->nullable();
            $table->string("viewers")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiktok_user_sessions');
        Schema::dropIfExists('tiktok_users');
    }
}
