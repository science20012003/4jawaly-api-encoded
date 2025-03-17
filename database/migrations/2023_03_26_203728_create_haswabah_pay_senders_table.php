<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaswabahPaySendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $haw = \App\Model\HawsabahRenewPay::all();
        Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->dropForeign("hawsabah_renew_pays_sender_uuid_foreign");
            $table->dropIndex("hawsabah_renew_pays_sender_uuid_foreign");
            $table->dropColumn("sender_uuid");
            $table->dropColumn("extend_request_id");
            $table->dropColumn("duration");
            $table->dropColumn("enterprise_unified_number");
            $table->dropColumn("created_date");
            $table->dropColumn("request_status");
        });

        Schema::create('hawsabah_renew_pay_senders', function (Blueprint $table) {
            $table->foreignId("hawsabah_renew_pay_id")->constrained("hawsabah_renew_pays");
            $table->foreignUuid("sender_uuid")->constrained("hawsabah_request_senders","sender_uuid");
            $table->string("extend_request_id",40)->default("");
            $table->integer("duration")->default(1);
            $table->string("enterprise_unified_number")->nullable();
            $table->string("created_date",10)->nullable();
            $table->string("request_status",20)->nullable();
            $table->double("price",10,6);
            $table->double("tax",10,6);
            $table->double("total",10,6);
        });
        foreach ($haw as $item){
            \App\Model\HawsabahRenewPaySender::create([
                'hawsabah_renew_pay_id'=>$item->id,
                'sender_uuid'=>$item->sender_uuid,
                "extend_request_id"=>$item->extend_request_id,
                "duration"=>$item->duration,
                "enterprise_unified_number"=>$item->enterprise_unified_number,
                "created_date"=>$item->created_date,
                "request_status"=>$item->request_status,
                "price"=>$item->price,
                "tax"=>$item->tax,
                "total"=>$item->total
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hawsabah_renew_pay_senders');
    }
}
