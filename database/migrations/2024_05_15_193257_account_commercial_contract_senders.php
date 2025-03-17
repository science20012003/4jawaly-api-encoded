<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountCommercialContractSenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_commercial_contract_senders', function (Blueprint $table) {
            $table->foreignId("account_commercial_contract_id")->constrained("account_commercial_contracts")
                ->onDelete("CASCADE")  ->name('acc_contract_id_fk');;
            $table->foreignUuid("sender_uuid")->constrained("hawsabah_request_senders","sender_uuid")
                ->onDelete("CASCADE")  ->name('sender_uuid_fk');
            $table->unique(["account_commercial_contract_id","sender_uuid"], 'acc_contract_sender_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_commercial_contract_senders');
    }
}
