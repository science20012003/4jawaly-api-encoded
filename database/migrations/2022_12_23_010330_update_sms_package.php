<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSmsPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_request_packages', function (Blueprint $table) {
            $table->unsignedBigInteger("system_package_id")->nullable()->after("status");
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
            $table->dropColumn("system_package_id");
        });
    }
}
