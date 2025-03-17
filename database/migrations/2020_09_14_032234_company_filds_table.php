<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompanyFildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_fields', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('company_field_languages', function (Blueprint $table) {
            $table->foreignId('company_field_id')->constrained('company_fields');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['company_field_id','language_id']);
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
        Schema::dropIfExists('company_field_languages');
        Schema::dropIfExists('company_fields');
    }
}
