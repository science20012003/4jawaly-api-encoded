<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatewhatsappAccountPackagesDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->unsignedInteger("days_package_days")->default("0")->after("days_package_price");
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
            $table->dropColumn("days_package_days");
        });
    }
}
