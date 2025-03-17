<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->string("owner_name")->nullable()->after("start_date");
            $table->date("expiry_date")->nullable()->after("owner_name");
        });

        Schema::table('account_commercial_records', function (Blueprint $table) {
            $table->date("expiry_date")->nullable()->after("owner_name");
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
            $table->dropColumn("owner_name");
            $table->dropColumn("expiry_date");
        });

        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->dropColumn("expiry_date");
        });
    }
}
