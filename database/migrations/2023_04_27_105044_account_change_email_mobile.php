<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountChangeEmailMobile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_changes', function (Blueprint $table) {
            $table->id();
            $table->uuid("token")->unique();
            $table->tinyInteger("type")->default(0);
            $table->string("from_item");
            $table->string("to_item");
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("ticket_id")->nullable()->constrained("tickets");
            $table->string("ip")->nullable();
            $table->string("code",10);
            $table->integer("count")->default(0);
            $table->boolean("open_invitation")->default(false);
            $table->tinyInteger("status")->default(0);
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
        Schema::dropIfExists('account_changes');
    }
}
