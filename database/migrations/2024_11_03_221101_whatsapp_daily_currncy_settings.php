<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WhatsappDailyCurrncySettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('whatsapp_price_settings');
        Schema::create('whatsapp_price_settings', function (Blueprint $table) {
            $table->foreignId("currency_id")->constrained("currencies")->onDelete("cascade");
            $table->unique("currency_id");
            $table->double("bot_day_price",50,10)->default(0);
            $table->double("whatsapp_day_price",50,10)->default(0);
            $table->timestamps();
        });

        foreach (\App\Model\Currency::where("service",\App\Model\Currency::SERVICE_SMS)->get() as $service) {
            \App\Model\WhatsappPriceSetting::create([
                'currency_id'=>$service->id,
                'bot_day_price'=>1.66666666667,
                'whatsapp_day_price'=>6.666666667,
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
        Schema::dropIfExists('whatsapp_price_settings');
    }
}
