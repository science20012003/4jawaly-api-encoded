<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountPackageTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->unsignedBigInteger('instance_id')->nullable()->after("receive_points_remaining");
            $table->string("webhook")->nullable()->after("instance_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->dropColumn('instance_id');
            $table->dropColumn('webhook');
        });
    }
}
