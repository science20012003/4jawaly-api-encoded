<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('iso_code',10);
            $table->string("zone",25)->nullable();
            $table->timestamps();
        });

        Schema::create('country_languages', function (Blueprint $table) {
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['country_id','language_id']);
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
        Schema::dropIfExists('country_languages');
        Schema::dropIfExists('countries');
    }
}
