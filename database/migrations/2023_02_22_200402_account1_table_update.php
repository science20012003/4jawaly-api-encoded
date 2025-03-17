<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Account1TableUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->boolean("active_sms_verify")->after("status")->default(false);
            $table->boolean("active_email_verify")->after("active_sms_verify")->default(false);
            $table->text("ips")->nullable()->after("active_email_verify");
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
            $table->dropColumn("active_sms_verify");
            $table->dropColumn("active_email_verify");
            $table->dropColumn("ips");
        });
    }
}
