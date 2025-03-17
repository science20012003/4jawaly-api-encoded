<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHawsabahFunds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hawsabah_funds', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->double('amount',30,10);
            $table->text("comment")->nullable();
            $table->timestamps();
        });
        Schema::create('hawsabah_fund_pay_senders', function (Blueprint $table) {
            $table->foreignUuid("uuid")->constrained("hawsabah_funds","uuid");
            $table->foreignId("hawsabah_pay_id")->constrained("hawsabah_pays");
            $table->foreignUuid("sender_uuid")->constrained("hawsabah_request_senders","sender_uuid");
        });

        \App\Model\HawsabahPaySender::query()->update(["paid_status"=>\App\Model\HawsabahPaySender::PAID_STATUS_NOT_PAID]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hawsabah_fund_pay_senders');
        Schema::dropIfExists('hawsabah_funds');
    }
}
