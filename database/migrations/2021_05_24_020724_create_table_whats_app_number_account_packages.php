<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWhatsAppNumberAccountPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_number_account_packages', function (Blueprint $table) {
           $table->foreignId("account_package_id")->constrained('account_packages');
           $table->foreignId("whatsapp_number_id")->constrained('whatsapp_numbers');
           $table->unique(["account_package_id","whatsapp_number_id"],"whatsapp_n_a_p_a_p_id_w_n_id_unique");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp_number_account_packages');
    }
}
