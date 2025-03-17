<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHaswabahPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->unsignedBigInteger("daftra_id")->nullable()->after("invoice_id");
        });

        Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->unsignedBigInteger("daftra_id")->nullable()->after("invoice_id");
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
            $table->dropColumn("daftra_id");
        });

        Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->dropColumn("daftra_id");
        });
    }
}
