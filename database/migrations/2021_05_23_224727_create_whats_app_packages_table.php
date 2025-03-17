<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsAppPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_packages', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->double("price_sending_text",10,2);
            $table->double("price_sending_file",10,2);
            $table->double("price_sending_ptt",10,2);
            $table->double("price_sending_link",10,2);
            $table->double("price_sending_contact",10,2);
            $table->double("price_sending_location",10,2);
            $table->double("price_sending_vcard",10,2);
            $table->double("price_sending_forward",10,2);
            $table->double("price_receive_text",10,2);
            $table->double("price_receive_file",10,2);
            $table->double("price_receive_ptt",10,2);
            $table->double("price_receive_link",10,2);
            $table->double("price_receive_contact",10,2);
            $table->double("price_receive_location",10,2);
            $table->double("price_receive_vcard",10,2);
            $table->double("price_receive_forward",10,2);
            $table->double("price",10,2);
            $table->integer("send_points")->default(0);
            $table->integer("receive_points")->default(0);
            $table->tinyInteger("status")->default(1);
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
        Schema::dropIfExists('whatsapp_packages');
    }
}
