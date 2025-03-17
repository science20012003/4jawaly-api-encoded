<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->boolean("transfer_package_allowed")->after("last_login")->default(false);
            $table->double("min_transfer_points",10,2)->after("transfer_package_allowed")->default(0);
        });
        Schema::create('account_package_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("to_account_id")->constrained('accounts');
            $table->unsignedBigInteger("account_package_id");
            $table->unsignedBigInteger("to_account_package_id")->nullable();
            $table->double("points",30,10)->nullable();
            $table->boolean("is_paid")->default(false);
            $table->tinyInteger("status")->default(0);
            $table->dateTime("update_status")->nullable();
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
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn("transfer_package_allowed");
            $table->dropColumn("min_transfer_points");
        });
        Schema::dropIfExists('account_package_transfers');
    }
}
