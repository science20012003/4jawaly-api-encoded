<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateaccountMakeExts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("account_make_exts");
        Schema::dropIfExists("account_make_prices");
        Schema::dropIfExists("account_make_ext_pays");
        Schema::enableForeignKeyConstraints();
        Schema::create('account_make_prices', function (Blueprint $table) {
            $table->foreignId("currency_id")->constrained("currencies");
            $table->double("price",30,10)->nullable();
            $table->double("tax",10,2)->nullable();
            $table->unsignedBigInteger("daftra_id")->nullable();
        });

        Schema::create('account_make_exts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->string("name");
            $table->text("desc");
            $table->tinyInteger("status")->default(0);
            $table->dateTime("update_status")->nullable();
            $table->foreignId("ticket_id")->constrained("tickets");
            $table->dateTime("last_update_time");
            $table->foreignId("currency_id")->nullable()->unique()->constrained("currencies");
            $table->double("hours",10,2)->nullable();
            $table->double("discount",10,2)->nullable();
            $table->double("hour_price",30,10)->nullable();
            $table->double("discount_value",30,10)->nullable();
            $table->double("price",30,10)->nullable();
            $table->double("tax",30,10)->nullable();
            $table->text("admin_comment")->nullable();
            $table->timestamps();
        });
        Schema::create('account_make_ext_pays', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_make_ext_id")->unique()->constrained("account_make_exts");
            $table->foreignId("account_id")->constrained("accounts");
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
            $table->boolean("is_paid")->default(false);
            $table->tinyInteger("status")->default(0);
            $table->double("price",50,6);
            $table->double("tax",50,6);
            $table->double("fees",50,6);
            $table->double("total",50,6);
            $table->string("payment_session",40)->nullable();
            $table->dateTime("update_status")->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("account_make_exts");
        Schema::dropIfExists("account_make_prices");
        Schema::dropIfExists("account_make_ext_pays");
        Schema::enableForeignKeyConstraints();
    }
}
