<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahSenders24Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->boolean("is_critical_sender")->default(false)->after("types");
        });

        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->string("comment")->nullable()->after("markter");
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
            $table->dropColumn("is_critical_sender");
        });

        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->dropColumn("comment");
        });
    }
}
