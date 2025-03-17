<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOdooIdToTicketTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_tags', function (Blueprint $table) {
            $table->integer('odoo_id')->nullable()->after("daftra_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_tags', function (Blueprint $table) {
            $table->dropColumn('odoo_id');
        });
    }
}
