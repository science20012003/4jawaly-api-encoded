<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappMessageTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_messages_templates', function (Blueprint $table) {
            $table->foreignId("whatsapp_number_id")->nullable()->after("text")->constrained('whatsapp_numbers');
            $table->boolean("all_users")->default(true)->after("whatsapp_number_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_messages_templates', function (Blueprint $table) {
           $table->dropForeign("whatsapp_messages_templates_whatsapp_number_id_foreign");
            $table->dropColumn("whatsapp_number_id");
            $table->dropColumn("all_users");
        });
    }
}
