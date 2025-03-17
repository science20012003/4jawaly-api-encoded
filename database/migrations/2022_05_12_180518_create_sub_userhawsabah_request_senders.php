<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubUserhawsabahRequestSenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->timestamp("send_to_site_at")->nullable()->after("username");
        });
        Schema::create('hawsabah_request_sender_users', function (Blueprint $table) {
            $table->uuid("key")->primary();
            $table->uuid("sender_uuid")->index();
            $table->enum("source",[
                \App\Model\HawsabahRequest::SOURCE_HOUSESMS,
                \App\Model\HawsabahRequest::SOURCE_4JAWALYNET,
                \App\Model\HawsabahRequest::SOURCE_4JAWALYCOM,
                \App\Model\HawsabahRequest::SOURCE_SMPP,
                \App\Model\HawsabahRequest::SOURCE_SMSSC,
            ]);
            $table->string("username",100);
            $table->unique(["sender_uuid","source","username"]);
            $table->tinyInteger("sent_to_site")->default(0);
            $table->text("site_api_response")->nullable();
            $table->timestamp("send_to_site_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("hawsabah_request_sender_users");
        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->dropColumn("send_to_site_at");
        });
    }
}
