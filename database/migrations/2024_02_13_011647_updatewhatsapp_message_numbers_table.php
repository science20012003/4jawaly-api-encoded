<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatewhatsappMessageNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_message_numbers', function (Blueprint $table) {
            $table->boolean("is_readed")->default(false)->after("from_number");
            $table->dateTime("readed_at")->nullable()->after("is_readed");
        });
        foreach (\App\Model\WhatsappMessageNumber::all() as $item){
            $item->is_readed = true;
            $item->readed_at = \Carbon\Carbon::now();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_message_numbers', function (Blueprint $table) {
            $table->dropColumn("is_readed");
            $table->dropColumn("readed_at");
        });
    }
}
