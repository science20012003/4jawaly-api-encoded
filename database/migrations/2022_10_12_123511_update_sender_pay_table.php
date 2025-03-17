<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSenderPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_pay_senders', function (Blueprint $table) {
            $table->enum("paid_status",[
                \App\Model\HawsabahPaySender::PAID_STATUS_PAID,
                \App\Model\HawsabahPaySender::PAID_STATUS_NOT_PAID,
            ])->default( \App\Model\HawsabahPaySender::PAID_STATUS_NOT_PAID)->after("sender_uuid");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_pay_senders', function (Blueprint $table) {
            $table->dropColumn("paid_status");
        });
    }
}
