<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_payment_methods', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->string('api_key')->nullable();
            $table->string("api_secret")->nullable();
            $table->string("webhook")->nullable();
            $table->tinyInteger("env")->default(\App\Model\AccountPaymentMethod::DEVELOPMENT_ENV);
            $table->tinyInteger("type");
            $table->foreignId("account_id")->constrained("accounts");
            $table->unique(["env","type","account_id"]);
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
        Schema::dropIfExists('account_payment_methods');
    }
}
