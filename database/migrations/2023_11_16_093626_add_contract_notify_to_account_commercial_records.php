<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractNotifyToAccountCommercialRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_commercial_records', function (Blueprint $table) {
            $table->tinyInteger("contract_notify")->default(0)->after('h_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_commercial_records', function (Blueprint $table) {
            $table->dropColumn("contract_notify");
        });
    }
}
