<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToAccountPricingPolicies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_pricing_policies', function (Blueprint $table) {
            $table->tinyInteger('month')->index()->nullable()->after('status');
            $table->Integer('year')->index()->nullable()->after('month');
            $table->string('service_type',30)->index()->nullable()->after('account_id');
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
           $table->dropColumn('month', 'year', 'service_type');
        });
    }
}
