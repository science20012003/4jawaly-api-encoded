<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatehawsabahRequestsr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->boolean("is_saudi")->after("is_renew_before")->default(true);
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
            $table->dropColumn("is_saudi");
        });
    }
}
