<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappDIalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('whatsapp_dialogs');
        Schema::create('whatsapp_dialogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("whatsapp_number_id")->constrained("whatsapp_numbers");
            $table->string("number",20)->index();
            $table->boolean("is_readed")->default(true);
            $table->boolean("is_closed")->default(false);
            $table->unique(["whatsapp_number_id","number"]);
            $table->string("country_iso",2)->nullable();
            $table->string("name")->index();
            $table->dateTime("last_send")->index();
            $table->integer("unreaded")->default(0);
            $table->integer("total_messages")->default(0);
            $table->integer("send_messages_count")->default(0);
            $table->integer("receive_messages_count")->default(0);
            $table->integer("queue_message_count")->default(0);
            $table->integer("failded_message_count")->default(0);
            $table->integer("in_queue_message_count")->default(0);
            $table->integer("ready_message_count")->default(0);
            $table->integer("no_package_message_count")->default(0);
            $table->integer("sent_message_count")->default(0);
            $table->integer("delivered_message_count")->default(0);
            $table->integer("read_message_count")->default(0);
            $table->integer("viewed_message_count")->default(0);
            $table->foreignId("crm_lead_id")->nullable()->constrained("crm_leads");
            $table->text("last_message")->nullable();
            $table->timestamps();
        });


        Schema::create('whatsapp_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("whatsapp_number_id")->constrained("whatsapp_numbers");
            $table->string("name");
            $table->string("name_hash",32)->index();
            $table->unique(["whatsapp_number_id","name_hash"]);
            $table->timestamps();
        });

        Schema::create('whatsapp_dialog_tags', function (Blueprint $table) {
            $table->foreignId("whatsapp_dialog_id")->constrained("whatsapp_dialogs");
            $table->foreignId("whatsapp_tag_id")->constrained("whatsapp_tags");
            $table->unique(["whatsapp_dialog_id","whatsapp_tag_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('whatsapp_tags');
        Schema::dropIfExists('whatsapp_dialog_tags');
        Schema::dropIfExists('whatsapp_dialogs');
        Schema::enableForeignKeyConstraints();
        Schema::create('whatsapp_dialogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
}
