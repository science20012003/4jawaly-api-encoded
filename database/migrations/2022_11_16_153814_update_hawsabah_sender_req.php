<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahSenderReq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->tinyInteger("delete_from_site")->after("sent_to_site")->default(0);
            $table->text("delete_from_response")->after("delete_from_site")->nullable();
            $table->timestamp("delete_from_site_at")->nullable()->after("delete_from_response");
        });
        Schema::table('hawsabah_request_sender_users', function (Blueprint $table) {
            $table->tinyInteger("delete_from_site")->after("sent_to_site")->default(0);
            $table->text("delete_from_response")->after("delete_from_site")->nullable();
            $table->timestamp("delete_from_site_at")->nullable()->after("delete_from_response");
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
            $table->dropColumn("delete_from_site");
            $table->dropColumn("delete_from_response");
            $table->dropColumn("delete_from_site_at");
        });

        Schema::table('hawsabah_request_sender_users', function (Blueprint $table) {
            $table->dropColumn("delete_from_site");
            $table->dropColumn("delete_from_response");
            $table->dropColumn("delete_from_site_at");
        });
    }
}
