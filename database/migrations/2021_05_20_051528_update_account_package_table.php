<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->integer("send_points")->default(0)->after("service_id");
            $table->integer("receive_points")->default(0)->after("send_points");
            $table->integer("send_points_remaining")->default(0)->after("receive_points");
            $table->integer("receive_points_remaining")->default(0)->after("send_points_remaining");
            $table->string("name",100)->nullable()->after("id");
            $table->string("number",20)->nullable()->after("name");
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
            $table->dropColumn("send_points");
            $table->dropColumn("receive_points");
            $table->dropColumn("send_points_remaining");
            $table->dropColumn("receive_points_remaining");
            $table->dropColumn("name");
            $table->dropColumn("number");
        });
    }
}
