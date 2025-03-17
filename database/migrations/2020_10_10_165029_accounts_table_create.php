<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountsTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('country_iso',3);
            $table->tinyInteger('account_type')->default(1);
            $table->string('company_name');
            $table->foreignId('company_field_id')->constrained('company_fields');
            $table->tinyInteger('is_developer')->default(1);
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->tinyInteger('is_marketer')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->string('odoo_id',50);
            $table->string('fb_id',40)->nullable();
            $table->string('google_id',40)->nullable();
            $table->string('zoho_id',40)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign(['country_id','city_id'])->references(['country_id','id'])->on('cities');
        });

        Schema::create('account_interested_services', function (Blueprint $table) {
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('interested_service_id');
            $table->unique(['account_id','interested_service_id'],'account_i_s_a_id_i_service_id_unique');
            $table->foreign("interested_service_id")->references('id')->on('interested_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_interested_services');
        Schema::dropIfExists('accounts');
    }
}
