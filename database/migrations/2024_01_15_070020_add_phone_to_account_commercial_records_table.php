<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToAccountCommercialRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_commercial_records', function (Blueprint $table) {
            $table->string('mobile')->nullable()->after("expiry_date");
            $table->string('country_iso')->nullable()->after("mobile");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_commercial_records', function (Blueprint $table) {
           $table->dropColumn('mobile');
           $table->dropColumn('country_iso');
        });
    }
}
