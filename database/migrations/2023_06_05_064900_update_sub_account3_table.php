<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSubAccount3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_accounts', function (Blueprint $table) {
            $table->text("ips")->nullable()->after("send_message_direct");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_accounts', function (Blueprint $table) {
            $table->dropColumn("ips");
        });
    }
}
