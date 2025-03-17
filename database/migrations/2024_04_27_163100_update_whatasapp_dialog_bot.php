<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatasappDialogBot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_dialogs', function (Blueprint $table) {
            $table->boolean("is_boot_running")->default(false)->after("last_message");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_dialogs', function (Blueprint $table) {
            $table->dropColumn("is_boot_running");
        });
    }
}
