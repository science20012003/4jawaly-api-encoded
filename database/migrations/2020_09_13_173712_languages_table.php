<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('iso_code',3);
            $table->string('title',120);
            $table->tinyInteger('is_default')->default(0);
            $table->timestamps();
        });

        \DB::table('languages')->insert([
           [
               "iso_code"=>"ar",
               "title"=>"العربية",
               "is_default"=>1
           ] , [
                "iso_code"=>"en",
                "title"=>"English",
                "is_default"=>0
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
