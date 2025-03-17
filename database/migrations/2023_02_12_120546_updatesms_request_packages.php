<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatesmsRequestPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_request_packages', function (Blueprint $table) {
            $table->tinyInteger("account_status")->default(1)->after("p_type");
            $table->boolean("for_all")->default(false)->after("account_status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_request_packages', function (Blueprint $table) {
            $table->dropColumn("account_status");
            $table->dropColumn("for_all");
        });
    }
}
