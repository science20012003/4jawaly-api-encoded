<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountWordpressExts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Model\AccountWordpressExt::query()->truncate();
        Schema::table('account_wordpress_exts', function (Blueprint $table) {
            $table->tinyInteger("active_status")->after("update_status");
            $table->foreignId("ticket_id")->after("active_status")->constrained("tickets");
            $table->dateTime("last_update_time")->after("ticket_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_wordpress_exts', function (Blueprint $table) {
            $table->dropForeign("account_wordpress_exts_ticket_id_foreign");
            $table->dropColumn("active_status");
            $table->dropColumn("ticket_id");
            $table->dropColumn("last_update_time");
        });
    }
}
