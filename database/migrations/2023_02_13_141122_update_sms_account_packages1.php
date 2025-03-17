<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSmsAccountPackages1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_account_packages', function (Blueprint $table) {
            $table->foreignId("sub_account_id")->nullable()->after("account_id")->constrained("accounts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_account_packages', function (Blueprint $table) {
            $table->dropIndex("sms_account_packages_sub_account_id_foreign");
            $table->dropForeign("sms_account_packages_sub_account_id_foreign");
            $table->dropColumn("sub_account_id");
        });
    }
}
