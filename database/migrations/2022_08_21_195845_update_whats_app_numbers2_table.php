<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsAppNumbers2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_numbers', function (Blueprint $table) {
           $table->date("expired_at")->nullable()->change();
           $table->uuid("key")->unique()->after("expired_at");
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
            $table->dropIndex("whatsapp_numbers_key_unique");
            $table->date("expired_at")->nullable(false)->change();
            $table->dropColumn("key");
        });
    }
}
