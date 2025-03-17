<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountBalanceTransferPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'account_balance_transfer_packages',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId("account_transfer_id")->constrained("account_balance_transfers");
                $table->bigInteger("package_id");
                $table->double("points", 50, 10);               
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
        Schema::dropIfExists('account_balance_transfer_packages');
    }
}
