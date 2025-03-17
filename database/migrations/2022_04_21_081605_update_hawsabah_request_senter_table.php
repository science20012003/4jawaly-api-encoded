<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahRequestSenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->uuid("sender_uuid")->first();
            $table->tinyInteger("status")->default(0);
            $table->text("error_msg")->nullable();
            $table->text("full_response")->nullable();
            $table->text("agent_refuse_reason")->nullable();
        });
        foreach (\App\Model\HawsabahRequestSender::all() as $item){
            $item->status = $item->hawsabahRequest->status;
            $item->full_response = $item->hawsabahRequest->full_response;
            $item->error_msg = $item->hawsabahRequest->error_msg;
            $item->save();
        }
        \Illuminate\Support\Facades\DB::update("update hawsabah_request_senders set sender_uuid = UUID()");
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->uuid("sender_uuid")->primary()->change();
        });

        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->dropColumn("status");
            $table->dropColumn("error_msg");
            $table->dropColumn("full_response");
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
            $table->dropColumn("sender_uuid");
            $table->dropColumn("status");
            $table->dropColumn("error_msg");
            $table->dropColumn("full_response");
            $table->dropColumn("agent_refuse_reason");
        });
        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->tinyInteger("status")->default(0);
            $table->text("error_msg")->nullable();
            $table->text("full_response")->nullable();
            $table->text("agent_refuse_reason")->nullable();
        });
    }
}
