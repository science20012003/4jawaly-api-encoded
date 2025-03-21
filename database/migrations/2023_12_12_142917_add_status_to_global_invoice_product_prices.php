<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToGlobalInvoiceProductPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_invoice_product_prices', function (Blueprint $table) {
            $table->boolean("status")->default(true);
        });
        Schema::table('global_invoice_products', function (Blueprint $table) {
            $table->boolean("status")->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_invoice_product_prices', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('global_invoice_products', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
