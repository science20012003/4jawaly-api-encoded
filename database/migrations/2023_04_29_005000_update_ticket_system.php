<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTicketSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_replies', function (Blueprint $table) {
            $table->tinyInteger("show_to")->default(\App\Model\TicketReply::SHOW_TO_ALL_NORMAL)->after("desc");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_replies', function (Blueprint $table) {
            $table->dropColumn("show_to");
        });
    }
}
