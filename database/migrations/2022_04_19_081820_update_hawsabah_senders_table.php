<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahSendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_senders', function (Blueprint $table) {
            $table->integer("sender_conectivity_count")->default(0)->after("sender_conectivity_detail");
            $table->integer("sender_type")->default(0)->after("sender_conectivity_count");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_senders', function (Blueprint $table) {
            $table->dropColumn("sender_conectivity_count");
            $table->dropColumn("sender_type");
        });
    }
}
