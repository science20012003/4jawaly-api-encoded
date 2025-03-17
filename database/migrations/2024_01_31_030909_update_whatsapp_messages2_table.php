<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappMessages2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_messages', function (Blueprint $table) {
            $table->foreignId("account_by")->nullable()->constrained("accounts");
            $table->foreignId("sub_account_by")->nullable()->constrained("sub_accounts");
        });

        foreach (\App\Model\WhatsappMessage::where("sent_status","send")->get() as $item){
            $item->account_by = $item->account_id;
            $item->save();
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
           $table->dropForeign("whatsapp_messages_account_by_foreign");
           $table->dropForeign("whatsapp_messages_sub_account_by_foreign");
            $table->dropColumn("account_by");
            $table->dropColumn("sub_account_by");
        });
    }
}
