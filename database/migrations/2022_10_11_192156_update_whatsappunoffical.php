<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappunoffical extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_numbers', function (Blueprint $table) {
            $table->tinyInteger("w_type")->default(1)->after("account_id");
        });

        Schema::table('whatsapp_packages', function (Blueprint $table) {
            $table->tinyInteger("w_type")->default(1)->after("is_main");
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
            $table->dropColumn("w_type");
        });

        Schema::table('whatsapp_packages', function (Blueprint $table) {
            $table->dropColumn("w_type");
        });
    }
}
