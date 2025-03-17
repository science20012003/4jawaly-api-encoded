<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappVerivication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_verifications', function (Blueprint $table) {
            $table->text("site_link")->nullable()->change();
            $table->string("mobile",50)->nullable()->after("site_link");
            $table->boolean("is_invitation_send")->default(false)->after("mobile");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_verifications', function (Blueprint $table) {
            $table->string("site_link")->nullable()->change();
            $table->dropColumn("mobile");
            $table->dropColumn("is_invitation_send");
        });
    }
}
