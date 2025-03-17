<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahSendersRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->boolean("need_renew")->default(false)->after("hawsabah_request_id");
            $table->dateTime("last_check_renew")->nullable()->after("need_renew");
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
            $table->dropColumn("need_renew");
            $table->dropColumn("last_check_renew");
        });
    }
}
