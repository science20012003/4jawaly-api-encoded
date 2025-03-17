<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string("name_ar");
            $table->string("name_en");
            $table->boolean("status");
            $table->timestamps();
        });
        \App\Model\PaymentMethod::insert([
           [
               "name_ar"=>"من الرصيد",
               "name_en"=>"balance",
               "status"=>1,
           ] , [
               "name_ar"=>"Stripe",
               "name_en"=>"Stripe",
               "status"=>1,
           ] , [
               "name_ar"=>"HAYPERPAY",
               "name_en"=>"HAYPERPAY",
               "status"=>1,
           ] , [
               "name_ar"=>"Knet",
               "name_en"=>"Knet",
               "status"=>1,
           ] ,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
