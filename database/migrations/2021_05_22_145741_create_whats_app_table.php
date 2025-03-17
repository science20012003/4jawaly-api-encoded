<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_numbers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("is_default")->default(0);
            $table->foreignId("account_id")->constrained("accounts");
            $table->string("owner_name",150);
            $table->string("country_iso",3);
            $table->string("number",20);
            $table->date("expired_at");
            $table->unsignedBigInteger("instance_id")->nullable()->unique();
            $table->string("webhook")->nullable();
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
        Schema::dropIfExists('whatsapp_numbers');
    }
}
