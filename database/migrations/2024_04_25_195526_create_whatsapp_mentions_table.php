<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappMentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_dialog_mentions', function (Blueprint $table) {
            $table->foreignId("whatsapp_dialog_id")->constrained("whatsapp_dialogs");
            $table->foreignId("account_id")->constrained("accounts");
            $table->unique(["whatsapp_dialog_id","account_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp_dialog_mentions');
    }
}
