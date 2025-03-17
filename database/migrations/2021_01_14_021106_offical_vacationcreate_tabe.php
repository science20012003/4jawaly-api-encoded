<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OfficalVacationcreateTabe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('official_vacations', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id');
            $table->date('date');
            $table->primary(["country_id","date"]);
            $table->string("title");
            $table->enum("status",["approved","unapproved"])->default("unapproved");
            $table->foreign('country_id')
                ->references('id')
                ->on("countries")  ;
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
        Schema::dropIfExists('official_vacations');
    }
}
