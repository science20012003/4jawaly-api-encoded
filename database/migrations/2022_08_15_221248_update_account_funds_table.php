<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_funds', function (Blueprint $table) {
            $table->string("stripe_payment_id",50)->nullable()->after("comment")->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_funds', function (Blueprint $table) {
            $table->dropIndex("account_funds_stripe_payment_id_unique");
            $table->dropColumn("stripe_payment_id");
        });
    }
}
