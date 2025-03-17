<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SmsRequestPackageTableUp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_request_packages', function (Blueprint $table) {
            $table->dateTime("update_status")->nullable()->after("type");
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
            $table->dropColumn("update_status");
        });
    }
}
