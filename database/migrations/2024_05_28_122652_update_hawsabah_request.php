<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->date("expiry_date_contract")->after("expiry_date")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->date("expiry_date_contract");
        });
    }
}
