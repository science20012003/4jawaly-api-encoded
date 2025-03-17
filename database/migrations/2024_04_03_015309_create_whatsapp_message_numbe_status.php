<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappMessageNumbeStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_message_numbers_status', function (Blueprint $table) {
            $table->unsignedBigInteger("whatsapp_message_id")->index();
            $table->string("number",20)->index();
            $table->unique(["whatsapp_message_id","number"],"w_m_n_s_unique");
            $table->enum("status",['Queued','Failed','In-Queued','Ready','No-Package','Service-sent','sent','delivered','viewed','read','played','error']);
            $table->string("api_id",100)->nullable();
            $table->text("error_message")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp_message_numbers_status');
    }
}
