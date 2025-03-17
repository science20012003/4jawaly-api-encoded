<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRenewHaswabahPay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->double("fees",50,6)->after("tax")->default(0);
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
        Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->dropColumn("fees");
            $table->dropColumn("payment_session");
        });
    }
}
