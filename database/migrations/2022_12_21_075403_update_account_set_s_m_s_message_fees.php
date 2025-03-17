<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountSetSMSMessageFees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->double("sms_fees",30,10)->default(0)->after("is_marketer");
        });
        foreach (\App\Model\Account::where("is_marketer",1)->get() as $account)
        {
            $account->sms_fees = 0.4;
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
            $table->dropColumn("sms_fees");
        });
    }
}
