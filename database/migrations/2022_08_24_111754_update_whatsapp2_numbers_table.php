<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWhatsapp2NumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_numbers', function (Blueprint $table) {
            $table->string("status",30)
                ->after("key")
                ->nullable()->index();
            $table->text("me")->nullable()->after("status");
            $table->string("phone",20)->nullable()->after("me");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_numbers', function (Blueprint $table) {
            $table->dropIndex("whatsapp_numbers_status_unique");
           $table->dropColumn("phone");
           $table->dropColumn("status");
           $table->dropColumn("me");
        });
    }
}
