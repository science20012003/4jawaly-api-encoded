<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseSenderRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_sender_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId("owner_id")->constrained("accounts");
            $table->foreignId("user_id")->constrained("accounts");
            $table->foreignId("ticket_id")->constrained("tickets");
            $table->foreignUuid("sender_uuid")->constrained("hawsabah_request_senders", "sender_uuid");
            $table->tinyInteger("status")->default(0);
            $table->string("owner_comment")->nullable();
            $table->string("user_comment")->nullable();
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
        Schema::dropIfExists('use_sender_requests');
    }
}
