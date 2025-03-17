<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountPricingPolicies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_pricing_policies' ,function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts")->cascadeOnDelete();
            $table->double("from")->nullable();
            $table->double("to")->nullable();
            $table->double("sms_fees")->nullable();
            $table->double("otp_sms_fees")->nullable();
            $table->double("salla_sms_fees")->nullable();
            $table->tinyInteger("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_pricing_policies');
    }
}
