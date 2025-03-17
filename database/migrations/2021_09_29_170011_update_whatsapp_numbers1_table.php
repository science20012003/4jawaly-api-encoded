<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappNumbers1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_message_numbers', function (Blueprint $table) {
            $table->string("from_number")->nullable()->after("api_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_message_numbers', function (Blueprint $table) {
            $table->dropColumn("from_number");
        });
    }
}
