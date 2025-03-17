<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountBalanceTransfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'account_balance_transfers',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId("sender_account_id")->constrained("accounts");
                $table->foreignId("reciver_account_id")->constrained("accounts");
                $table->foreignId("ticket_id")->constrained("tickets");
                $table->text("points_data")->nullable();
                $table->text("account_package_data")->nullable();
                $table->tinyInteger("status")->default(0);
                $table->string("sender_comment")->nullable();
                $table->string("admin_comment")->nullable();
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
        Schema::dropIfExists('account_balance_transfers');
    }
}
