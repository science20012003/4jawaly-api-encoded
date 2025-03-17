<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateticketRepliesAddErrorType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_replies', function (Blueprint $table) {
            $table->tinyInteger("error_type")->default(0)->after("show_to");
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
            $table->dropColumn("error_type");
        });
    }
}
