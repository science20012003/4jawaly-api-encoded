<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsAppMessagesQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_messages_notes', function (Blueprint $table) {
            $table->foreignId("whatsapp_message_id")->unique()
                ->constrained("whatsapp_messages")->onDelete("CASCADE");
            $table->foreignId("whatsapp_number_id")->constrained("whatsapp_numbers")->onDelete("CASCADE");
            $table->integer("total");
            $table->integer("queued_count");
            $table->integer("failed_count");
            $table->integer("in_queued_count");
            $table->integer("ready_count");
            $table->integer("no_package_count");
            $table->integer("service_sent_count");
            $table->integer("sent_count");
            $table->integer("delivered_count");
            $table->integer("viewed_count");
            $table->integer("read_count");
            $table->double("queue_percentage",10,6);
            $table->boolean("is_working")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp_messages_notes');
    }
}
