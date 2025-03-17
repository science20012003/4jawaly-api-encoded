<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorthCommissionToAccountPricingPolicies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_pricing_policies', function (Blueprint $table) {
            $table->tinyInteger('worth_commission')->index()->default(1)->after('account_take_commission_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_pricing_policies', function (Blueprint $table) {
            $table->dropColumn('worth_commission');
        });
    }
}
