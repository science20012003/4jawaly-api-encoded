<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentToAccountCommercialRepresentatives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_commercial_representatives', function (Blueprint $table) {
            $table->string("admin_comment")->nullable()->after('status');
            $table->string("comment")->nullable()->after('admin_comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_commercial_representatives', function (Blueprint $table) {
            $table->dropColumn("admin_comment");
            $table->dropColumn("comment");
        });
    }
}
