<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountPackageTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')
            ->table('account_package_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger("account_id_to")->after("price_before");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_package_transactions', function (Blueprint $table) {
            $table->dropColumn("account_id_to");
        });
    }
}
