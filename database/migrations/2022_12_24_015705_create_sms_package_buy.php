<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsPackageBuy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sms_account_package_subs');
        Schema::dropIfExists('sms_account_packages');
        Schema::create('sms_account_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->foreignId("currency_id")->constrained("currencies");
            $table->foreignId("payment_method_id")->constrained("payment_methods");
            $table->tinyInteger("bank_id")->nullable();
            $table->string("depositor_name")->nullable();
            $table->string("depositor_bank")->nullable();
            $table->string("depositor_number",50)->nullable();
            $table->date("deposit_date")->nullable();
            $table->string("invoice_id",50)->nullable();
            $table->string("invoice_attachment",50)->nullable();
            $table->string("deposit_receipt",50)->nullable();
            $table->text("package_name")->nullable();
            $table->boolean("is_paid")->default(false);
            $table->tinyInteger("status")->default(0);
            $table->double("price",50,6);
            $table->double("tax",50,6);
            $table->double("fees",50,6);
            $table->double("total",50,6);
            $table->dateTime("update_status")->nullable();
            $table->timestamps();
        });

        Schema::create('sms_account_package_subs', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->foreignId("sms_account_package_id")->constrained("sms_account_packages");
            $table->string("package_name");
            $table->unsignedBigInteger("sms_package_id");
            $table->unsignedBigInteger("system_sms_account_package_id")->nullable();
            $table->unsignedInteger("days");
            $table->unsignedInteger("points");
            $table->double("price",50,6);
            $table->double("tax",50,6);
            $table->double("fees",50,6);
            $table->double("total",50,6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_account_package_subs');
        Schema::dropIfExists('sms_account_packages');
    }
}
