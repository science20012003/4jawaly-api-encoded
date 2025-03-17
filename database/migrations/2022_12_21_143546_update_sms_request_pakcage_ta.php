<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSmsRequestPakcageTa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_request_packages', function (Blueprint $table) {
            $table->double("sms_fees",30,10)->default(0)->after("days");
            $table->double("point_fees",30,10)->default(0)->after("sms_fees");
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
            $table->dropColumn("sms_fees",10,2);
            $table->dropColumn("point_fees",10,2);
        });
    }
}
