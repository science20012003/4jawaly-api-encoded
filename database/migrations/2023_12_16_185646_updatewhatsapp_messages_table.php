<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatewhatsappMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_messages', function (Blueprint $table) {
            $table->dateTime('send_at')->nullable()->after("whatsapp_number_id");
            $table->string('send_at_zone',20)->nullable()->after("send_at");
            $table->dateTime('send_at_system')->index()->nullable()->after("send_at_zone");
            $table->tinyInteger("schedule_status")->index()->default(0)->after("send_at_system");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_messages', function (Blueprint $table) {
            $table->dropColumn('send_at') ;
            $table->dropColumn('send_at_zone') ;
            $table->dropColumn('send_at_system') ;
            $table->dropColumn('schedule_status') ;
        });
    }
}
