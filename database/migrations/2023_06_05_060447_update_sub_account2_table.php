<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSubAccount2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_accounts', function (Blueprint $table) {
            $table->boolean("can_use_api")->default(true)->after("is_active");
            $table->boolean("can_change_data")->default(true)->after("can_use_api");
            $table->boolean("send_message_direct")->default(true)->after("can_change_data");
        });

        Schema::create('sub_account_needs', function (Blueprint $table) {
            $table->id();
            $table->double("points",50,10);
            $table->foreignId("sub_account_id")->constrained("sub_accounts");
            $table->foreignId("account_id")->constrained("accounts");
            $table->text("comment")->nullable();
            $table->string("attachment",40)->nullable();
            $table->tinyInteger("status")->default(0);
            $table->text("main_account_comment")->nullable();
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
        Schema::table('sub_accounts', function (Blueprint $table) {
            $table->dropColumn("can_use_api");
            $table->dropColumn("can_change_data");
            $table->dropColumn("send_message_direct");
        });

        Schema::dropIfExists("sub_account_needs");
    }
}
