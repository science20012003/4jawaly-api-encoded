<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHHawsabahToAccountCommercialContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_commercial_contracts', function (Blueprint $table) {
            $table->tinyInteger("h_status")->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_commercial_contracts', function (Blueprint $table) {
            $table->dropColumn("h_status");

        });
    }
}
