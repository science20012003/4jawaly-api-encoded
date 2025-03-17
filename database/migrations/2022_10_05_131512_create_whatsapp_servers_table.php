<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_servers', function (Blueprint $table) {
            $table->id();
            $table->integer("instance_id")->unique();
            $table->unsignedBigInteger("htznr_id")->index();
            $table->string("domain")->nullable();
            $table->string("ip",50)->nullable();
            $table->string("token",50)->nullable();
            $table->string("webhook")->nullable();
            $table->timestamps();
        });
        \App\Model\WhatsappServer::create([
            'instance_id'=>101,
            'htznr_id'=>"24118358",
            'domain'=>"wa-101.4jawaly.com",
            'ip'=>"157.90.224.101",
            "token"=>md5(101),
            "webhook"=>"https://webhook.site/cdf392f8-3267-4708-b780-4825fdb0a6dc"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp_servers');
    }
}
