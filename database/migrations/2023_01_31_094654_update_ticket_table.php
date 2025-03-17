<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignUuid("sms_receiver_uuid")->nullable()->after("status")->constrained("sms_receivers","uuid");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
           $table->dropForeign("tickets_sms_receiver_uuid_foreign");
           $table->dropColumn("sms_receiver_uuid");
        });
    }
}
