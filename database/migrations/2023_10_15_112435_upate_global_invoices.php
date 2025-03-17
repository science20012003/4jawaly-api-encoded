<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpateGlobalInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_invoices', function (Blueprint $table) {
            $table->string("other_attach", 50)->nullable()->after("deposit_receipt");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_invoices', function (Blueprint $table) {
            $table->dropColumn("other_attach");
        });
    }
}
