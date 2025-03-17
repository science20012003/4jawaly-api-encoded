<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountPackages2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->foreignId("payment_method_id")->nullable()
                ->after("per_message_extra")->constrained("payment_methods");
            $table->string("payment_method_key",50)->nullable()
                ->unique()->after("payment_method_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->dropIndex("account_packages_payment_method_key_unique");
            $table->dropForeign("account_packages_payment_method_id_foreign");
            $table->dropColumn("payment_method_id");
            $table->dropColumn("payment_method_key");
        });
    }
}
