<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahRequestSendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->string("sender_key",10)->index()->after("hawsabah_refuse_reason");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->dropColumn("sender_key");
        });
    }
}
