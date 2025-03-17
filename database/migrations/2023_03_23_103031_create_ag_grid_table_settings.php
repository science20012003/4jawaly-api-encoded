<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgGridTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ag_settings', function (Blueprint $table) {
            $table->uuid("uuid");
            $table->foreignId("account_id")->constrained("accounts");
            $table->unsignedBigInteger("table_id");
            $table->unique(["account_id","table_id"]);
            $table->text("data");
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
        Schema::dropIfExists('ag_settings');
    }
}
