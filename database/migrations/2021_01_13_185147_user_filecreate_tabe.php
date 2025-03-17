<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserFilecreateTabe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_files', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreignId('country_id')->constrained('countries');
            $table->date('hiring_date');
            $table->enum("gender",["male","female"])->default("male");
            $table->enum("vacation_calculation",["labor_law","specific_date"])->default("labor_law");
            $table->date("vacation_specific_date")->nullable();
            $table->integer("test_period")->default(0);
            $table->integer("usual_vacation")->default(0);
            $table->integer("accidental_vacation")->default(0);
            $table->enum("sick_leave_allowed",["Yes","No"])->default("Yes");
            $table->integer("sick_leave")->default(0);
            $table->enum("parental_leave_allowed",["Yes","No"])->default("Yes");
            $table->integer("parental_leave")->default(0);
            $table->enum("hajj_leave_allowed",["Yes","No"])->default("Yes");
            $table->enum("umrah_leave_allowed",["Yes","No"])->default("Yes");
            $table->foreignId('currency_id')->constrained('currencies');
            $table->text("salary")->nullable();
            $table->text("salary_addition")->nullable();
            $table->text("salary_addition_details")->nullable();
            $table->text("salary_deductions")->nullable();
            $table->text("salary_deductions_details")->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on("users")
                ->onDelete('cascade');
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
        Schema::dropIfExists('user_files');
    }
}
