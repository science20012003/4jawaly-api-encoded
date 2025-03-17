<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdateStatustoTableAccountBalanceTransfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_balance_transfers', function (Blueprint $table) {
            $table->dateTime("update_status")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_balance_transfers', function (Blueprint $table) {
           $table->dropColumn('update_status');
        });
    }
}
