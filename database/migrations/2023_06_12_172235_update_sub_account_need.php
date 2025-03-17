<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSubAccountNeed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_account_needs', function (Blueprint $table) {
            $table->text("points_data")->nullable()->after("main_account_comment");
            $table->text("account_package_data")->nullable()->after("points_data");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_account_needs', function (Blueprint $table) {
            $table->dropColumn("points_data");
            $table->dropColumn("account_package_data");
        });
    }
}
