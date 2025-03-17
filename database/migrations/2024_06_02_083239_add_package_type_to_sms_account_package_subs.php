<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPackageTypeToSmsAccountPackageSubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_account_package_subs', function (Blueprint $table) {
            $table->tinyInteger("p_type")->default(1)->after("sms_account_package_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_account_package_subs', function (Blueprint $table) {
           $table->dropColumn('p_type');
        });
    }
}
