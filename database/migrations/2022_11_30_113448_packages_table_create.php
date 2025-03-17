<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PackagesTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_request_packages', function (Blueprint $table) {
            $table->id();
            $table->string("title_en");
            $table->string("title_ar");
            $table->double("price",30,10);
            $table->foreignId("currency_id")->constrained("currencies");
            $table->unsignedBigInteger("sending_center_id")->nullable();
            $table->unsignedBigInteger("pricing_policy_id")->nullable();
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->foreignId("account_id")->constrained("accounts");
            $table->unsignedInteger("points")->default(0);
            $table->unsignedInteger("days");
            $table->enum("type",[
                \App\Model\SmsRequestPackage::TYPE_GLOBAL,
                \App\Model\SmsRequestPackage::TYPE_SPECIAL
            ]);
            $table->tinyInteger("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
