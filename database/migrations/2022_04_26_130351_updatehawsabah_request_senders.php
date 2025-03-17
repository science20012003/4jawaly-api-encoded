<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatehawsabahRequestSenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->text("hawsabah_refuse_reason")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->dropColumn("hawsabah_refuse_reason");
        });
    }
}
