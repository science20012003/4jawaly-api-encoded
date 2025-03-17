<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemIdToGlobalInvoiceProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_invoice_products', function (Blueprint $table) {
            $table->integer('host_bill_item_id')->nullable()->after("slug");
            $table->integer('host_bill_category_id')->nullable()->after("host_bill_item_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_invoice_products', function (Blueprint $table) {
            $table->dropColumn('host_bill_item_id');
            $table->dropColumn('host_bill_category_id');
        });
    }
}
