<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHawsabahSendersplayoffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hawsabah_payoffs', function (Blueprint $table) {
            $table->id();
            $table->date("start");
            $table->date("end")->nullable();
            $table->boolean("is_approved")->default(false);
            $table->text("comment")->nullable();
            $table->timestamps();
        });
        Schema::table("hawsabah_pay_senders",function (Blueprint $table){
            $table->foreignId("hawsabah_payoff_id")->nullable()->constrained("hawsabah_payoffs");
        });
        $c = \App\Model\HawsabahPayoff::create(['start'=>\Carbon\Carbon::now()->subDays(10),"end"=>\Carbon\Carbon::now(),"is_approved"=>false]);
        \App\Model\HawsabahPaySender::where("paid_status",\App\Model\HawsabahPaySender::PAID_STATUS_PAID)->update(["hawsabah_payoff_id"=>$c->id]);
        \App\Model\HawsabahPayoff::create(['start'=>\Carbon\Carbon::now(),"end"=>null,"is_approved"=>false]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("hawsabah_pay_senders",function (Blueprint $table){
            $table->dropForeign("hawsabah_pay_senders_hawsabah_payoff_id_foreign");
            $table->dropColumn("hawsabah_payoff_id");
        });
        Schema::dropIfExists('hawsabah_payoffs');
    }
}
