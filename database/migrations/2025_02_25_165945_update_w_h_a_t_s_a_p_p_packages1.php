<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWHATSAPPPackages1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->double("deductions",50,6)->after("balance")->default(0);
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
            $table->dropColumn("deductions");
        });
    }
}
