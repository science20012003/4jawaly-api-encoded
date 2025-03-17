<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeriodTitleToGlobalInvoiceProductPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_invoice_product_prices', function (Blueprint $table) {
            $table->string('period_title_en')->nullable()->after("tax");
            $table->string('period_title_ar')->nullable()->after("period_title_en");
            $table->string('period_value')->nullable()->after("period_title_ar");
            $table->double('price_transfer')->nullable()->after("price");
            $table->double('price_renew')->nullable()->after("price_transfer");
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
            $table->dropColumn('period_title_en');
            $table->dropColumn('period_title_ar');
            $table->dropColumn('period_value');
            $table->dropColumn('price_transfer');
            $table->dropColumn('price_renew');
        });
    }
}
