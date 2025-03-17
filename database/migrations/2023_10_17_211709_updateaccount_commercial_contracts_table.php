<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateaccountCommercialContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_commercial_contracts', function (Blueprint $table) {
            $table->unique(["account_commercial_record_id","expiry_date"],"acc_acr_unique");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_commercial_contracts', function (Blueprint $table) {
            $table->dropIndex("acc_acr_unique");
        });
    }
}
