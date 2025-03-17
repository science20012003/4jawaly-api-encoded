<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WhatsappMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_messages', function (Blueprint $table) {
            $table->id();
            $table->uuid('job_id');
            $table->foreignId('account_id')->constrained('accounts');
            $table->text('text');
            $table->enum("type",[
                \App\Model\WhatsappMessage::MESSAGE_TYPE_TEXT,
                \App\Model\WhatsappMessage::MESSAGE_TYPE_FILE,
                \App\Model\WhatsappMessage::MESSAGE_TYPE_PTT,
                \App\Model\WhatsappMessage::MESSAGE_TYPE_LINK,
                \App\Model\WhatsappMessage::MESSAGE_TYPE_CONTACT,
                \App\Model\WhatsappMessage::MESSAGE_TYPE_LOCATION,
                \App\Model\WhatsappMessage::MESSAGE_TYPE_VCARD,
                \App\Model\WhatsappMessage::MESSAGE_TYPE_FORWARD,
                \App\Model\WhatsappMessage::MESSAGE_TYPE_TEMPLATE,
            ]);
            $table->enum("sent_status",[
                \App\Model\WhatsappMessage::SENT_STATUS_SEND,
                \App\Model\WhatsappMessage::SENT_STATUS_RECEIVE,
            ])->default( \App\Model\WhatsappMessage::SENT_STATUS_SEND);
            $table->foreignId('whatsapp_number_id')->constrained('whatsapp_numbers');
            $table->timestamps();
        });


        Schema::create('whatsapp_message_numbers', function (Blueprint $table) {
            $table->uuid('msg_id')->primary();
            $table->foreignId('whatsapp_message_id')->constrained('whatsapp_messages');
            $table->string('number',20);
            $table->string('country_iso',3);
            $table->unique(['whatsapp_message_id','number']);
            $table->enum('status',[
                \App\Model\WhatsappMessageNumber::STATUS_QUEUED,
                \App\Model\WhatsappMessageNumber::STATUS_SERVICE_FAILED,
                \App\Model\WhatsappMessageNumber::STATUS_IN_QUEUED,
                \App\Model\WhatsappMessageNumber::STATUS_READY_TO_SEND,
                \App\Model\WhatsappMessageNumber::STATUS_NOT_VALID_PACKAGE,
                \App\Model\WhatsappMessageNumber::STATUS_SENT_TO_SERVICE,
                \App\Model\WhatsappMessageNumber::STATUS_SENT,
                \App\Model\WhatsappMessageNumber::STATUS_DELIVERED,
                \App\Model\WhatsappMessageNumber::STATUS_VIEWED,
                \App\Model\WhatsappMessageNumber::STATUS_READED,
            ])->default(\App\Model\WhatsappMessageNumber::STATUS_QUEUED);
            $table->tinyInteger('balance_from_root')->default(0);
            $table->foreignId('account_package_id')->nullable()->constrained('account_packages');
            $table->double('cost',10,2)->nullable();
            $table->integer('points')->nullable();
            $table->dateTime("sent_at")->nullable();
            $table->dateTime("delivered_at")->nullable();
            $table->dateTime("viewed_at")->nullable();
            $table->dateTime("read_at")->nullable();

            $table->string("api_id",100)->nullable()->unique();
            $table->string("api_type",20)->nullable();
            $table->string("api_fromMe",3)->nullable();
            $table->string("api_self",3)->nullable();
            $table->string("api_isForwarded",3)->nullable();
            $table->string("api_author",20)->nullable();
            $table->string("api_time",20)->nullable();
            $table->string("api_chatId",20)->nullable();
            $table->string("api_queueNumber",20)->nullable();
            $table->string("api_messageNumber",20)->nullable();
            $table->string("api_senderName",150)->nullable();
            $table->string("api_caption",255)->nullable();
            $table->text("api_quotedMsgBody")->nullable();
            $table->string("api_quotedMsgId",255)->nullable();
            $table->string("api_quotedMsgType",255)->nullable();
            $table->string("api_chatName",255)->nullable();
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
        Schema::dropIfExists('whatsapp_message_numbers');
        Schema::dropIfExists('whatsapp_messages');
    }
}
