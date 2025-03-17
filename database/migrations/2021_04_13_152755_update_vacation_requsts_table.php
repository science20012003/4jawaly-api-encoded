<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVacationRequstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_vacation_requests', function (Blueprint $table) {
            $table->text('note')->nullable()->after('last_change_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_vacation_requests', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
}
