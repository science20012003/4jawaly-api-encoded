<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PricingPoliciyTableUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pricing_policies', function (Blueprint $table) {
            $table->enum('service',["sms","whatsapp","voice"])->after('id');
            $table->double('default_price',30,10)->nullable()->after('service');
            $table->foreignId("currency_id")->after('default_price')->constrained("currencies");
        });
        Schema::create('pricing_policy_networks', function (Blueprint $table) {
            $table->foreignId("pricing_policy_id")->constrained("pricing_policies");
            $table->foreignId("network_id")->constrained("networks");
            $table->double('price',30,10);
            $table->unique(["pricing_policy_id","network_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing_policy_networks');
        Schema::table('pricing_policies', function (Blueprint $table) {
            $table->dropForeign('pricing_policies_currency_id_foreign');
            $table->dropColumn('default_price');
            $table->dropColumn("currency_id");
        });
    }
}
