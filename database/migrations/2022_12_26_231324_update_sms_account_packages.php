<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSmsAccountPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_account_packages', function (Blueprint $table) {
            $table->string("payment_session",40)->nullable()->after("total");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_account_packages', function (Blueprint $table) {
            $table->dropColumn("payment_session");
        });
    }
}
