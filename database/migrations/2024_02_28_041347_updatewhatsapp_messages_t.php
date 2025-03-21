<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatewhatsappMessagesT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_messages', function (Blueprint $table) {
            $table->boolean("is_notes")->default(false)->after("text");
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
            $table->dropColumn("is_notes");
        });
    }
}
