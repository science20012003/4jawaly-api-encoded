<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountWordpressExtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_wordpress_exts', function (Blueprint $table) {
            $table->boolean("is_added")->default(false)->after("active_status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_wordpress_exts', function (Blueprint $table) {
            $table->dropColumn("is_added");
        });
    }
}
