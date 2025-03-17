<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WithdrawCommissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'withdraw_commissions',
            function (Blueprint $table) {

                $table->id();
                $table->foreignId('account_id')->constrained('accounts');
                $table->double("requsted_amount");
                $table->double("amount_sent")->nullable();
                $table->double("ticket_id");
                $table->tinyInteger("status")->default(0);
                $table->string("admin_replay")->nullable();
                $table->string("attachment")->nullable();
                $table->string("attachment_file_mame")->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraw_commissions');
    }
}
