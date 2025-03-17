<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HawsabahPayUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_pays', function (Blueprint $table) {
             $table->dateTime("update_status")->nullable()->after("total");
        });
        Schema::table('hawsabah_pay_senders', function (Blueprint $table) {
            $table->dateTime("paid_status_update")->nullable()->after("paid_status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->dropColumn("update_status");
        });

        Schema::table('hawsabah_pay_senders', function (Blueprint $table) {
            $table->dropColumn("paid_status_update");
        });
    }
}
