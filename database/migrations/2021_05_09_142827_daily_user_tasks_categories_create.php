<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DailyUserTasksCategoriesCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_daily_task_categories', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("status")->default(1);
            $table->timestamps();
        });

        Schema::create('user_daily_task_category_languages', function (Blueprint $table) {
            $table->unsignedBigInteger('user_daily_task_category_id');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['user_daily_task_category_id','language_id'],"u_d_t_c_unique");
            $table->foreign('user_daily_task_category_id',"u_d_t_c_foreign")
                ->references('id')
                ->on("user_daily_task_categories")
                ->onDelete('cascade');
            $table->string('title',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_daily_task_category_languages');
        Schema::dropIfExists('user_daily_task_categories');
    }
}
