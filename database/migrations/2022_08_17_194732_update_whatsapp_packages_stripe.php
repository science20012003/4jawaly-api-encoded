<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsappPackagesStripe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_packages', function (Blueprint $table) {
             $table->string("stripe_id",30)->after("status")->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_packages', function (Blueprint $table) {
            $table->dropIndex("whatsapp_packages_stripe_id_unique");
            $table->dropColumn("stripe_id");
        });
    }
}
