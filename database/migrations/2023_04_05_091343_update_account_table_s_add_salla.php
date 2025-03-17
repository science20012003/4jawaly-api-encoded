<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountTableSAddSalla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->double("salla_sms_fees",10,6)->default(0)->after("otp_sms_fees");
        });
        foreach (\App\Model\Account::all() as $account){
            $account->salla_sms_fees = $account->sms_fees + 0.02;
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
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn("salla_sms_fees");
        });
    }
}
