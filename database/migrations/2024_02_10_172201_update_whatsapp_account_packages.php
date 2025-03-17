<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappAccountPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->foreignId("whatsapp_number_id")->nullable()->after("whatsapp_package_id")->constrained("whatsapp_numbers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->dropForeign("whatsapp_account_packages_whatsapp_number_id_foreign");
            $table->dropColumn("whatsapp_number_id");
        });
    }
}
