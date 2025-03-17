<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CReateWhatsappLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_labels', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("whatsapp_number_id")->constrained("whatsapp_numbers");
            $table->string("name");
            $table->string("name_hash",32)->index();
            $table->unique(["whatsapp_number_id","name_hash"]);
            $table->timestamps();
        });

        Schema::create('whatsapp_dialog_labels', function (Blueprint $table) {
            $table->foreignId("whatsapp_dialog_id")->constrained("whatsapp_dialogs");
            $table->foreignId("whatsapp_label_id")->constrained("whatsapp_labels");
            $table->unique(["whatsapp_dialog_id","whatsapp_label_id"],"w_d_lable_unique");
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
        Schema::dropIfExists('whatsapp_labels');
        Schema::dropIfExists('whatsapp_dialog_labels');
        Schema::enableForeignKeyConstraints();
    }
}
