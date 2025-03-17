<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahRequest1Senders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
             $table->tinyInteger("update_sender_type_status")->default(0)->after("types");
             $table->text("update_sender_type_res")->nullable()->after("update_sender_type_status");
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
            $table->dropColumn("update_sender_type_status");
            $table->dropColumn("update_sender_type_res");
        });
    }
}
