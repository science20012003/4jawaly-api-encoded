<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DailyUserTasksCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_daily_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_daily_task_category_id')->constrained('user_daily_task_categories');
            $table->text("task_desc");
            $table->double("period")->default(0);
            $table->foreignId("user_daily_task_id")->nullable()->constrained('user_daily_tasks');
            $table->foreignId("user_id")->constrained('users');
            $table->foreignId("user_id_to")->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_daily_tasks');
    }
}
