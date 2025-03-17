<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->boolean("add_sub_account_allowed")->after("min_transfer_points")->default(false);
            $table->integer("min_sub_accounts")->after("add_sub_account_allowed")->default(0);
        });
        Schema::create('sub_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("ticket_id")->nullable()->constrained("tickets");
            $table->string("name");
            $table->string("mobile",20);
            $table->unique(["account_id","mobile"]);
            $table->string("iso_country",5);
            $table->string("password");
            $table->tinyInteger("resend_count")->default(0);
            $table->string("plain_password")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->dateTime("update_status")->nullable();
            $table->softDeletes();
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
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn("add_sub_account_allowed");
            $table->dropColumn("min_sub_accounts");
        });
        Schema::dropIfExists('sub_accounts');
    }
}
