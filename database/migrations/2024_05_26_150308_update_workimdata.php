<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWorkimdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_renew_pay_senders', function (Blueprint $table) {
            $table->tinyInteger("workiom_sent")->default(0);
        });

        Schema::table('hawsabah_pay_senders', function (Blueprint $table) {
            $table->tinyInteger("workiom_sent")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_renew_pay_senders', function (Blueprint $table) {
            $table->dropColumn("workiom_sent");
        });

        Schema::table('hawsabah_pay_senders', function (Blueprint $table) {
            $table->dropColumn("workiom_sent");
        });
    }
}
