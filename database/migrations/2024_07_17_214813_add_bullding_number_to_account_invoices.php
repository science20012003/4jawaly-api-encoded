<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBulldingNumberToAccountInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_invoices', function (Blueprint $table) {
            $table->string("district", 50)->after("tax_number")->nullable();    
            $table->string("governorate", 50)->after("district")->nullable();    
            $table->string("building_number", 50)->after("governorate")->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_invoices', function (Blueprint $table) {
            $table->dropColumn("district", "governorate", "building_number");

        });
    }
}
