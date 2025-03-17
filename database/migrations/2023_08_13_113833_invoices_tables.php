<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoicesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("sub_account_id")->nullable()->constrained("accounts");
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->foreignId("currency_id")->constrained("currencies");
            $table->foreignId("payment_method_id")->constrained("payment_methods");
            $table->tinyInteger("bank_id")->nullable();
            $table->string("depositor_name")->nullable();
            $table->string("depositor_bank")->nullable();
            $table->string("depositor_number",50)->nullable();
            $table->date("deposit_date")->nullable();
            $table->tinyInteger("approve_via")->default(1);
            $table->string("invoice_id",50)->nullable();
            $table->unsignedBigInteger("daftra_id")->nullable();
            $table->string("invoice_attachment",50)->nullable();
            $table->string("deposit_receipt",50)->nullable();
            $table->string("title");
            $table->text("desc");
            $table->string("type",50)->index();
            $table->boolean("is_paid")->default(false);
            $table->tinyInteger("status")->default(0);
            $table->foreignId("refuse_reason_id")->nullable()->constrained("refuse_reasons");
            $table->string("other_reason")->nullable();
            $table->double("price",50,6);
            $table->double("tax",50,6);
            $table->double("fees",50,6);
            $table->double("total",50,6);
            $table->string("payment_session",40)->nullable();
            $table->dateTime("update_status")->nullable();
            $table->text("items");
            $table->timestamps();
        });

        Schema::create('global_invoice_products', function (Blueprint $table) {
            $table->id();
            $table->string("slug",40)->unique();
            $table->string("name_ar");
            $table->string("name_en");
            $table->string("type",50)->index();
            $table->timestamps();
        });

        Schema::create('global_invoice_product_prices', function (Blueprint $table) {
            $table->foreignId("global_invoice_product_id")->constrained("global_invoice_products");
            $table->foreignId("currency_id")->constrained("currencies");
            $table->unique(["global_invoice_product_id","currency_id"],"g_i_p_c_unique");
            $table->double("price",30,10)->nullable();
            $table->double("tax",10,2)->nullable();
            $table->unsignedBigInteger("daftra_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("global_invoice_product_prices");
        Schema::dropIfExists("global_invoice_products");
        Schema::dropIfExists("global_invoices");
    }
}
