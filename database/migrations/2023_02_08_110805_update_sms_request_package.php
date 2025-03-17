<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSmsRequestPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_request_packages', function (Blueprint $table) {
            $table->tinyInteger("p_type")->default(\App\Model\SmsRequestPackage::PACKAGE_TYPE_NORMAL)->after("type");
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->double("otp_sms_fees",10,6)->default(0)->after("sms_fees");
        });
        foreach (\App\Model\Account::all() as $account){
            $account->otp_sms_fees = $account->sms_fees;
            $account->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_request_packages', function (Blueprint $table) {
            $table->dropColumn("type");
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn("otp_sms_fees");
        });
    }
}
