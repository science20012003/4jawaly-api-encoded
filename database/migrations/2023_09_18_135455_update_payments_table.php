<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ([
            "SmsAccountPackage",
            "AccountFundCharge",
            "WhatsappAccountPackage",
            "GlobalInvoice",
            "AccountMakeExtPay",
                 ] as $value) {
            $table = "\\App\\Model\\$value";
            Schema::table((new $table())->getTable(), function (Blueprint $table) {
                $table->tinyInteger("remembers")->default(0)->index()->after("update_status");
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ([
                     "SmsAccountPackage",
                     "AccountFundCharge",
                     "WhatsappAccountPackage",
                     "GlobalInvoice",
                     "AccountMakeExtPay",
                 ] as $value) {
            $table = "\\App\\Model\\$value";
            Schema::table($table, function (Blueprint $table) {
                $table->dropIndex("sms_account_packages_remembers_index");
                $table->dropColumn("remembers");
            });
        }
    }
}
