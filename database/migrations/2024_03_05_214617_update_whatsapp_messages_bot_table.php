<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappMessagesBotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_messages', function (Blueprint $table) {
            $table->boolean("is_bot")->default(false)->after("is_notes");
            $table->boolean("is_whisper")->default(false)->after("is_bot");
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
            $table->boolean("is_bot");
            $table->boolean("is_whisper");
        });
    }
}
