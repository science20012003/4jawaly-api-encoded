<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSmsAccountPackageT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_account_package_subs', function (Blueprint $table) {
            $table->unsignedBigInteger("sms_service_id")->nullable()->after("total");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_account_package_subs', function (Blueprint $table) {
            $table->dropColumn("sms_service_id");
        });
    }
}
