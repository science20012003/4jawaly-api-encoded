<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatehawsabahHawsabahRequestSenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->uuid("sender_id")->nullable();
            $table->boolean("sent_to_zajel")->default(false);
            $table->tinyInteger("sent_to_site")->default(0);
            $table->text("site_api_response")->nullable();
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
            $table->dropColumn("sender_id");
            $table->dropColumn("sent_to_zajel");
            $table->dropColumn("sent_to_site");
            $table->dropColumn("site_api_response");
        });
    }
}
