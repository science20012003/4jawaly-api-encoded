<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahSenderRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
             $table->foreignId("last_refuse_by")->nullable()->after("agent_refuse_reason")->constrained("users");
             $table->timestamp("last_refuse_at")->nullable()->after("last_refuse_by");
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
            $table->dropForeign("hawsabah_request_senders_last_refuse_by_foreign");
            $table->dropColumn("last_refuse_by");
            $table->dropColumn("last_refuse_at");
        });
    }
}
