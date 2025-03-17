<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDafaterDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::table("dafater_docs")->truncate();
        Schema::table('dafater_docs', function (Blueprint $table) {
            $table->string("territory")->after("customer_id");
            $table->string("customer_group")->after("territory");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dafater_docs', function (Blueprint $table) {
            $table->dropColumn("territory");
            $table->dropColumn("customer_group");
        });
    }
}
