<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappAccountPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `whatsapp_account_packages`
MODIFY COLUMN `whatsapp_package_id` bigint UNSIGNED NULL AFTER `currency_id`;");
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->integer("bot_days")->default(0)->after("whatsapp_package_id");
            $table->double("bot_price",50,6)->default(0)->after("bot_days");
            $table->double("package_price",50,6)->default(0)->after("bot_days");
            $table->double("balance",50,6)->default(0)->after("bot_price");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->dropColumn("bot_days");
            $table->dropColumn("bot_price");
            $table->dropColumn("package_price");
            $table->dropColumn("balance");
        });
    }
}
