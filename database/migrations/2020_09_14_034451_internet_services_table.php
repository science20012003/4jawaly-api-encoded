<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InternetServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interested_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('interested_service_languages', function (Blueprint $table) {
            $table->foreignId('interested_service_id')->constrained('interested_services');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['interested_service_id','language_id'],"interested_lang_uniq");
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
        Schema::dropIfExists('interested_service_languages');
        Schema::dropIfExists('interested_services');
    }
}
