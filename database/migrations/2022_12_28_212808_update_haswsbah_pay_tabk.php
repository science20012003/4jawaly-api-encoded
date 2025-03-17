<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHaswsbahPayTabk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->enum("with",[\App\Model\HawsabahPay::WITH_BANK,\App\Model\HawsabahPay::WITH_VISA])
                ->default(\App\Model\HawsabahPay::WITH_BANK)->after("deposit_date");
            $table->boolean("is_paid")->default(false);
        });
        Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->string("depositor_name")->nullable()->change();
            $table->string("depositor_bank")->nullable()->change();
            $table->string("depositor_number",50)->nullable()->change();
            $table->date("deposit_date")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->dropColumn("with");
            $table->dropColumn("is_paid");
        });
    }
}
