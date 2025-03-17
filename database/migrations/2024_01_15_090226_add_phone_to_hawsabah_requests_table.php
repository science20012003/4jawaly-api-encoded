<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToHawsabahRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_requests', function (Blueprint $table) {
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
        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('country_iso');
        });
    }
}
