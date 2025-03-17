<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserDailyTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_daily_tasks', function (Blueprint $table) {
            $table->date("date")->after("id");
            $table->text("attachments")->nullable()->after('user_id_to');
            $table->tinyInteger("type")->default(0)->after("attachments");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_daily_tasks', function (Blueprint $table) {
            $table->dropColumn("date");
            $table->dropColumn("attachments");
        });
    }
}
