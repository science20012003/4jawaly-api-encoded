<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHawsabahRequestSenderExts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hawsabah_request_sender_exts', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->string("sender_id",40);
            $table->string("extend_request_id",40)->default("");
            $table->unique(["sender_id","extend_request_id"],"su_ext_r_id_unique");
            $table->string("created_date",10)->nullable();
            $table->string("request_status",20)->index();
            $table->integer("duration")->nullable();
            $table->boolean("send_user_notify")->default(false);
            $table->tinyInteger("ready_to_send")->default(0);
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
        Schema::dropIfExists('hawsabah_request_sender_exts');
    }
}
