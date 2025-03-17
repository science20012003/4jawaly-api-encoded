<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HUpdateSenderExpiryDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_sender_contracts', function (Blueprint $table) {
            $table->date("sender_expiry_date")->nullable()->after("expiry_date");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_sender_contracts', function (Blueprint $table) {
            $table->dropColumn("sender_expiry_date");
        });
    }
}
