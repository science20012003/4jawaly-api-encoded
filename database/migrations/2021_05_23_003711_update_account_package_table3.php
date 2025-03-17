<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountPackageTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->dropColumn('instance_id');
            $table->dropColumn('webhook');
            $table->dropColumn("name");
            $table->dropColumn("number");
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
            $table->string("name",100)->nullable()->after("id");
            $table->string("number",20)->nullable()->after("name");
            $table->unsignedBigInteger('instance_id')->nullable()->after("receive_points_remaining");
            $table->string("webhook")->nullable()->after("instance_id");
        });
    }
}
