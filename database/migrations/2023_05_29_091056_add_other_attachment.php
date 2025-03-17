<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new \App\Model\AccountFundCharge())->getTable(), function (Blueprint $table) {
            $table->string("other_attach", 50)->nullable()->after("deposit_receipt");
        });
        Schema::table((new \App\Model\HawsabahPay())->getTable(), function (Blueprint $table) {
            $table->string("other_attach", 50)->nullable()->after("deposit_receipt");
        });
        Schema::table((new \App\Model\HawsabahRenewPay())->getTable(), function (Blueprint $table) {
            $table->string("other_attach", 50)->nullable()->after("deposit_receipt");
        });
        Schema::table((new \App\Model\SmsAccountPackage())->getTable(), function (Blueprint $table) {
            $table->string("other_attach", 50)->nullable()->after("deposit_receipt");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table((new \App\Model\AccountFundCharge())->getTable(), function (Blueprint $table) {
            $table->dropColumn("other_attach");
        });
        Schema::table((new \App\Model\HawsabahPay())->getTable(), function (Blueprint $table) {
            $table->dropColumn("other_attach");
        });
        Schema::table((new \App\Model\HawsabahRenewPay())->getTable(), function (Blueprint $table) {
            $table->dropColumn("other_attach");
        });
        Schema::table((new \App\Model\SmsAccountPackage())->getTable(), function (Blueprint $table) {
            $table->dropColumn("other_attach");
        });
    }
}
