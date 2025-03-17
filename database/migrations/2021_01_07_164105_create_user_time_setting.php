<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTimeSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_working_hours', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('day');
            $table->tinyInteger('period');
            $table->primary(['user_id',"day","period"]);
            $table->foreign('user_id')
                ->references('id')
                ->on("users")
                ->onDelete('cascade');
            $table->time('from')->nullable();
            $table->time('to')->nullable();
            $table->tinyInteger('is_week_end')->default(0);
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
        Schema::dropIfExists('user_working_hours');
    }
}
