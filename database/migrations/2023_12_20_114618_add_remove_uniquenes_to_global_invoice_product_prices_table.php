<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemoveUniquenesToGlobalInvoiceProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_invoice_product_prices', function (Blueprint $table) {
            $table->id(); // This will add an auto-incrementing 'id' column as the primary key
        });
        // Schema::table('global_invoice_product_prices', function (Blueprint $table) {
        Schema::table('global_invoice_product_prices', function (Blueprint $table) {
            $table->index(['global_invoice_product_id', 'currency_id'], 'g_i_p_c_index');
                });

        // Drop the unique constraint on the composite index
        Schema::table('global_invoice_product_prices', function (Blueprint $table) {
            $table->dropUnique('g_i_p_c_unique');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_invoice_product_prices', function (Blueprint $table) {
            $table->unique(['global_invoice_product_id', 'currency_id'], 'g_i_p_c_unique');
        });
    }
}
