<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccount1Stable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->string("id_number")->nullable()->unique()->after("id");
            $table->foreignId("by_account_id")->nullable()->after("id_number")->constrained("accounts");
        });

        foreach (\App\Model\Account::all() as $account){
            if(!$account->created_at instanceof \Carbon\Carbon){
                $account->created_at = Carbon\Carbon::now();
            }
            $account->id_number = \App\Model\Account::createIdNumber($account);
            $account->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropIndex("accounts_id_number_unique");
            $table->dropForeign("accounts_by_account_id_foreign");
            $table->dropColumn("id_number");
            $table->dropColumn("by_account_id");
        });
    }
}
