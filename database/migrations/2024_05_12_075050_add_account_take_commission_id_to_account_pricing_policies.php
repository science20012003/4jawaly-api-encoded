<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountTakeCommissionIdToAccountPricingPolicies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_pricing_policies', function (Blueprint $table) {
            $table->foreignId('account_take_commission_id')->nullable()->after('service_type')->constrained('accounts');
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
            $table->dropColumn('account_take_commission_id');
        });
    }
}
