<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GateTablesCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('service',["sms","whatsapp","voice"]);
            $table->enum('protocol',["http","https"])->default('http');
            $table->string('domain');
            $table->integer('port')->default(80);
            $table->string('username');
            $table->string('password');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('gates');
    }
}
