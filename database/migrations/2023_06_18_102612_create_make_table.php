<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_make_exts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->string("name");
            $table->text("desc");
            $table->tinyInteger("status")->default(0);
            $table->dateTime("update_status")->nullable();
            $table->foreignId("ticket_id")->constrained("tickets");
            $table->dateTime("last_update_time");
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
        Schema::dropIfExists('account_make_exts');
    }
}
