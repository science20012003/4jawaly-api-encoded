<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappNumbersT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_numbers', function (Blueprint $table) {
            $table->string("instance_string",50)->nullable()->after("instance_id");
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
            $table->dropColumn("instance_string");
        });
    }
}
