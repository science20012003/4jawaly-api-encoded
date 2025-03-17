<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WhatsappMessagesFailds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_failed_jobs', function (Blueprint $table) {
            $table->foreignId("whatsapp_message_id")->constrained("whatsapp_messages")->cascadeOnDelete();
            $table->string("status",20)->nullable();
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
        Schema::dropIfExists('whatsapp_failed_jobs');
    }
}
