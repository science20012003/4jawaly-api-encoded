<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HawsabahRenewPayCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('hawsabah_renew_pays');
        Schema::create('hawsabah_renew_pays', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->foreignUuid("sender_uuid")->constrained("hawsabah_request_senders","sender_uuid");
            $table->string("extend_request_id",40)->default("");
            $table->integer("duration")->default(1);
            $table->string("enterprise_unified_number")->nullable();
            $table->string("created_date",10)->nullable();
            $table->string("request_status",20)->nullable();
            $table->tinyInteger("bank_id");
            $table->string("depositor_name")->nullable();
            $table->string("depositor_bank")->nullable();
            $table->string("depositor_number",50)->nullable();
            $table->date("deposit_date")->nullable();
            $table->enum("with",[\App\Model\HawsabahRenewPay::WITH_BANK,\App\Model\HawsabahRenewPay::WITH_VISA])
                ->default(\App\Model\HawsabahRenewPay::WITH_BANK);
            $table->boolean("is_paid")->default(false);
            $table->string("invoice_id",50)->nullable();
            $table->string("invoice_attachment",50)->nullable();
            $table->string("deposit_receipt",50)->nullable();
            $table->tinyInteger("status")->default(0);
            $table->double("price",10,6);
            $table->double("tax",10,6);
            $table->double("total",10,6);
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
        Schema::dropIfExists('hawsabah_renew_pays');
    }
}
