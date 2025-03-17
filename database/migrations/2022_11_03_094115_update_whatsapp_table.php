<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Model\WhatsappMessageNumber::query()->delete();
        \App\Model\WhatsappMessage::query()->delete();
        \Illuminate\Support\Facades\DB::table("whatsapp_messages_notes")->delete();
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `whatsapp_messages` AUTO_INCREMENT = 1;");
        Schema::table('whatsapp_messages', function (Blueprint $table) {
             $table->dropColumn("type");
        });

        Schema::table('whatsapp_messages', function (Blueprint $table) {
            $table->enum("type",\App\Model\WhatsappMessage::allowedTypes())->after("text");
        });

        Schema::table('whatsapp_message_numbers', function (Blueprint $table) {
            $table->dropColumn("status");
        });

        Schema::table('whatsapp_message_numbers', function (Blueprint $table) {
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
                \App\Model\WhatsappMessageNumber::STATUS_PLAYED,
                \App\Model\WhatsappMessageNumber::STATUS_ERROR,
            ])->default(\App\Model\WhatsappMessageNumber::STATUS_QUEUED)->after("country_iso");
            $table->dateTime("played_at")->nullable()->after("read_at");
            $table->dateTime("error_at")->nullable()->after("played_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_messages', function (Blueprint $table) {
            $table->dropColumn("type");
        });

        Schema::table('whatsapp_messages', function (Blueprint $table) {
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
            ])->after("text");
        });
        Schema::table('whatsapp_message_numbers', function (Blueprint $table) {
            $table->dropColumn("status");
            $table->dropColumn("played_at");
            $table->dropColumn("error_at");
        });

        Schema::table('whatsapp_message_numbers', function (Blueprint $table) {
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
            ])->default(\App\Model\WhatsappMessageNumber::STATUS_QUEUED)->after("country_iso");
        });
    }
}
