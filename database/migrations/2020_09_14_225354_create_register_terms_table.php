<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_terms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('register_term_languages', function (Blueprint $table) {
            $table->foreignId('register_term_id')->constrained('register_terms');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['register_term_id','language_id'],"register_term_lang_uniq");
            $table->string('title',200);
            $table->text('desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_term_languages');
        Schema::dropIfExists('register_terms');
    }
}
