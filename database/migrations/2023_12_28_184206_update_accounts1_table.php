<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccounts1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
             $table->string("w_mobile",30)->unique()->nullable()->after("mobile");
             $table->string("w_country_iso",2)->nullable()->after("w_mobile");
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
           $table->dropIndex("accounts_w_mobile_unique");
            $table->dropColumn("w_mobile");
            $table->dropColumn("w_country_iso");
        });
    }
}
