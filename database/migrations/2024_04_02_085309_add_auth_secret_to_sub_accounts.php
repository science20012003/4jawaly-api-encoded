<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthSecretToSubAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_accounts', function (Blueprint $table) {
            $table->boolean("active_google_verify")->after("status")->default(false);
            $table->string("auth_secret", 100)->after("active_google_verify")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_accounts', function (Blueprint $table) {
            $table->dropColumn("active_google_verify");
            $table->dropColumn("auth_secret");
        });
    }
}
