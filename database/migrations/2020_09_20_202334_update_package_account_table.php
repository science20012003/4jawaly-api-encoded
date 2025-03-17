<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePackageAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->double('current_balance',30,10)
                ->default(0)
            ->after('package_price');
            $table->tinyInteger('is_transfer')
                ->default(0)
            ->after('current_balance');
        });

        foreach (\App\Model\AccountPackage::all() as $accountPackage){
            $accountPackage->current_balance = $accountPackage->package_price;
            $accountPackage->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->dropColumn('current_balance');
            $table->dropColumn('is_transfer');
        });
    }
}
