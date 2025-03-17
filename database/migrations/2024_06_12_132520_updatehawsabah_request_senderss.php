<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatehawsabahRequestSenderss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->date("remaining_days_date")->nullable()->after("remaining_days");
            $table->date("c_remaining_days_date")->nullable()->after("c_remaining_days");
        });

        foreach (\App\Model\HawsabahRequestSender::all() as $item){
            $item->remaining_days_date = \Carbon\Carbon::now()->addDays($item->remaining_days);
            $item->c_remaining_days_date = \Carbon\Carbon::now()->addDays($item->c_remaining_days);
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
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->date("remaining_days_date");
            $table->date("c_remaining_days_date");
        });
    }
}
