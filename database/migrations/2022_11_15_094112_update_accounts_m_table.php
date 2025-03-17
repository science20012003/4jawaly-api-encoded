<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountsMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger("site_user_id")->nullable()->after("source");
            $table->string("site_username",100)->nullable()->after("site_user_id");
            $table->unsignedInteger("site_groupid")->nullable()->after("site_username");
            $table->unsignedBigInteger("site_createdby")->nullable()->after("site_groupid");
            $table->unique(["source","site_user_id"]);
            $table->unique(["source","site_username"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropIndex(["accounts_source_site_user_id_unique","accounts_source_site_username_unique"]);
            $table->unsignedBigInteger("site_user_id");
            $table->string("site_username",100);
            $table->unsignedInteger("site_groupid");
            $table->unsignedBigInteger("site_createdby")->nullable()->after("site_groupid");
        });
    }
}
