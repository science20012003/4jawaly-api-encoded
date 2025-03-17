<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsAppPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Model\WhatsappNumberAccountPackage::query()->delete();
        \App\Model\WhatsappMessageNumber::query()->delete();
        \App\Model\WhatsappMessage::query()->delete();
        \Illuminate\Support\Facades\DB::table("whatsapp_messages_notes")->delete();
        \App\Model\AccountPackage::query()->delete();
        \App\Model\WhatsappPackage::query()->delete();
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE  `whatsapp_messages` AUTO_INCREMENT = 1;");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE  `whatsapp_packages` AUTO_INCREMENT = 1;");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE  `account_packages` AUTO_INCREMENT = 1;");
        Schema::table('whatsapp_packages', function (Blueprint $table) {
            $table->dropColumn("price_sending_text");
            $table->dropColumn("price_sending_file");
            $table->dropColumn("price_sending_ptt");
            $table->dropColumn("price_sending_link");
            $table->dropColumn("price_sending_contact");
            $table->dropColumn("price_sending_location");
            $table->dropColumn("price_sending_vcard");
            $table->dropColumn("price_sending_forward");
            $table->dropColumn("price_receive_text");
            $table->dropColumn("price_receive_file");
            $table->dropColumn("price_receive_ptt");
            $table->dropColumn("price_receive_link");
            $table->dropColumn("price_receive_contact");
            $table->dropColumn("price_receive_location");
            $table->dropColumn("price_receive_vcard");
            $table->dropColumn("price_receive_forward");
            $table->dropColumn("send_points");
            $table->dropColumn("receive_points");
        });
        Schema::table('account_packages', function (Blueprint $table) {
            $table->dropColumn("per_message");
            $table->dropColumn("send_points");
            $table->dropColumn("receive_points");
            $table->dropColumn("send_points_remaining");
            $table->dropColumn("receive_points_remaining");
        });
        Schema::table('account_packages', function (Blueprint $table) {
            $table->unsignedInteger("conversations_per_month")->after("is_transfer");
            $table->unsignedInteger("messages_per_day")->after("conversations_per_month");
            $table->unsignedInteger("storage_in_giga")->after("messages_per_day");
            $table->unsignedInteger("employees")->after("storage_in_giga");
            $table->double("start_conversation_price_me",10,2)->after("employees");
            $table->double("start_conversation_price_user",10,2)->after("start_conversation_price_me");
        });
        Schema::table('whatsapp_packages', function (Blueprint $table) {
            $table->unsignedInteger("conversations_per_month")->after("days");
            $table->unsignedInteger("messages_per_day")->after("conversations_per_month");
            $table->unsignedInteger("storage_in_giga")->after("messages_per_day");
            $table->boolean("sending_from_number")->after("storage_in_giga");
            $table->boolean("create_private_sender")->after("sending_from_number");
            $table->boolean("private_chat")->after("create_private_sender");
            $table->boolean("messages_archive")->after("private_chat");
            $table->boolean("bulk_send")->after("messages_archive");
            $table->boolean("messages_templates")->after("bulk_send");
            $table->boolean("contacts")->after("messages_templates");
            $table->boolean("numbers_groups")->after("contacts");
            $table->boolean("bot")->after("numbers_groups");
            $table->boolean("api")->after("bot");
            $table->boolean("waiting_queue")->after("api");
            $table->boolean("auto_reply")->after("waiting_queue");
            $table->boolean("appointments_system")->after("auto_reply");
            $table->unsignedInteger("employees")->after("appointments_system");
            $table->boolean("reports")->after("employees");
            $table->boolean("support_tickets")->after("reports");
            $table->boolean("help_center")->after("support_tickets");
            $table->double("start_conversation_price_me",10,2)->after("help_center");
            $table->double("start_conversation_price_user",10,2)->after("start_conversation_price_me");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Model\WhatsappNumberAccountPackage::query()->delete();
        \App\Model\WhatsappMessageNumber::query()->delete();
        \App\Model\WhatsappMessage::query()->delete();
        \Illuminate\Support\Facades\DB::table("whatsapp_messages_notes")->delete();
        \App\Model\AccountPackage::query()->delete();
        \App\Model\WhatsappPackage::query()->delete();
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE  `whatsapp_messages` AUTO_INCREMENT = 1;");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE  `whatsapp_packages` AUTO_INCREMENT = 1;");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE  `account_packages` AUTO_INCREMENT = 1;");
        Schema::table('whatsapp_packages', function (Blueprint $table) {
            $table->dropColumn("conversations_per_month");
            $table->dropColumn("messages_per_day");
            $table->dropColumn("storage_in_giga");
            $table->dropColumn("sending_from_number");
            $table->dropColumn("create_private_sender");
            $table->dropColumn("private_chat");
            $table->dropColumn("messages_archive");
            $table->dropColumn("bulk_send");
            $table->dropColumn("messages_templates");
            $table->dropColumn("contacts");
            $table->dropColumn("numbers_groups");
            $table->dropColumn("bot");
            $table->dropColumn("api");
            $table->dropColumn("waiting_queue");
            $table->dropColumn("auto_reply");
            $table->dropColumn("appointments_system");
            $table->dropColumn("employees");
            $table->dropColumn("reports");
            $table->dropColumn("support_tickets");
            $table->dropColumn("help_center");
            $table->dropColumn("start_conversation_price_me");
            $table->dropColumn("start_conversation_price_user");
        });
        Schema::table('whatsapp_packages', function (Blueprint $table) {
            $table->double("price_sending_text",10,2)->after("days");
            $table->double("price_sending_file",10,2)->after("price_sending_text");
            $table->double("price_sending_ptt",10,2)->after("price_sending_file");
            $table->double("price_sending_link",10,2)->after("price_sending_ptt");
            $table->double("price_sending_contact",10,2)->after("price_sending_link");
            $table->double("price_sending_location",10,2)->after("price_sending_contact");
            $table->double("price_sending_vcard",10,2)->after("price_sending_location");
            $table->double("price_sending_forward",10,2)->after("price_sending_vcard");
            $table->double("price_receive_text",10,2)->after("price_sending_forward");
            $table->double("price_receive_file",10,2)->after("price_receive_text");
            $table->double("price_receive_ptt",10,2)->after("price_receive_file");
            $table->double("price_receive_link",10,2)->after("price_receive_ptt");
            $table->double("price_receive_contact",10,2)->after("price_receive_link");
            $table->double("price_receive_location",10,2)->after("price_receive_contact");
            $table->double("price_receive_vcard",10,2)->after("price_receive_location");
            $table->double("price_receive_forward",10,2)->after("price_receive_vcard");
            $table->integer("send_points")->default(0)->after("price_receive_forward");
            $table->integer("receive_points")->default(0)->after("send_points");
        });
    }
}
