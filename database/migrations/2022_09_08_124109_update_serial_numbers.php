<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSerialNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_messages', function (Blueprint $table) {
            $table->bigInteger("global_serial")->nullable()->after("job_id");
            $table->bigInteger("serial")->nullable()->after("global_serial");
        });
        foreach (\App\Model\WhatsappMessage::groupBy("job_id")->get() as $message){
            $s = intval(\App\Model\WhatsappMessage::where("account_id",$message->account_id)
                    ->max("global_serial")) + 1;
            $ss = intval(\App\Model\WhatsappMessage::where("account_id",$message->account_id)
                    ->where("sent_status",$message->sent_status)
                    ->max("serial")) + 1;
            \App\Model\WhatsappMessage::where("job_id",$message->job_id)->update(["global_serial"=>$s,"serial"=>$ss]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_messages', function (Blueprint $table) {
            $table->dropColumn("global_serial");
            $table->dropColumn("serial");
        });
    }
}
