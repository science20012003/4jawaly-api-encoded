<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountBanks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'account_banks',
            function (Blueprint $table) {

                $table->id();
                $table->foreignId('account_id')->constrained('accounts');
                $table->string("bank_name");
                $table->string("iban")->nullable();
                $table->string("account_number");
                $table->string("account_name");
                $table->string("admin_replay")->nullable();
                $table->tinyInteger("status")->default(0);
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
        Schema::dropIfExists('account_banks');

    }
}
