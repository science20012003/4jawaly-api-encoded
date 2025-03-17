<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsAppNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_numbers', function (Blueprint $table) {
            $table->dropColumn("country_iso");
            $table->dropColumn("number");
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
            $table->string("country_iso",3)->after("account_id");
            $table->string("number",20)->after("country_iso");
        });
    }
}
