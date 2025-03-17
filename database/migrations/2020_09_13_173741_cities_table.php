<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries');
            $table->timestamps();
        });

        Schema::create('city_languages', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['city_id','language_id']);
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
        Schema::dropIfExists('city_languages');
        Schema::dropIfExists('cities');
    }
}
