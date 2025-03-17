<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_invoices', function (Blueprint $table) {
            $table->foreignId("account_id")->primary()->constrained("accounts")->onDelete("CASCADE");
            $table->string("client_business_name",100)->nullable();
            $table->string("client_first_name",255)->nullable();
            $table->string("client_last_name",255)->nullable();
            $table->string("client_email",255)->nullable();
            $table->string("client_address1",255)->nullable();
            $table->string("client_address2",255)->nullable();
            $table->string("client_postal_code",20)->nullable();
            $table->string("tax_number",20)->nullable();
            $table->unsignedBigInteger("city_id")->nullable();
            $table->unsignedBigInteger("country_id")->nullable();
            $table->string("client_state",100)->nullable();
            $table->boolean("client_active_secondary_address")->default(false);
            $table->string("client_secondary_name",255)->nullable();
            $table->string("client_secondary_address1",255)->nullable();
            $table->string("client_secondary_address2",255)->nullable();
            $table->string("client_secondary_postal_code",50)->nullable();
            $table->unsignedBigInteger("client_secondary_city_id")->nullable();
            $table->unsignedBigInteger("client_secondary_country_id")->nullable();
            $table->foreign(['country_id','city_id'])->references(['country_id','id'])->on('cities');
            $table->foreign(['client_secondary_country_id','client_secondary_city_id'],"c_s_c_foreign")->references(['country_id','id'])->on('cities');
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
        Schema::dropIfExists('account_invoices');
    }
}
