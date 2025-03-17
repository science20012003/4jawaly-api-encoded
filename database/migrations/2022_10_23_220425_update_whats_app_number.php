<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsAppNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_numbers', function (Blueprint $table) {
           $table->dropIndex("whatsapp_numbers_instance_id_unique");
        });
        Schema::table('whatsapp_numbers', function (Blueprint $table) {
            $table->unique(["w_type","instance_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_numbers', function (Blueprint $table) {
            $table->dropIndex("whatsapp_numbers_w_type_instance_id_unique");
        });

        Schema::table('whatsapp_numbers', function (Blueprint $table) {
            $table->unique("instance_id");
        });
    }
}
