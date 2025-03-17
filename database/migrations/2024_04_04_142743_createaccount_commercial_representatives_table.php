<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateaccountCommercialRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_commercial_representatives', function (Blueprint $table) {
            $table->boolean("need_update")->default(false)->after("is_notify");
        });
        \App\Model\AccountCommercialRepresentative::query()->update(["need_update"=>true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_commercial_representatives', function (Blueprint $table) {
            $table->dropColumn("need_update");
        });
    }
}
