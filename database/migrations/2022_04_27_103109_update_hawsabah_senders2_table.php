<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahSenders2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_senders', function (Blueprint $table) {
            $table->text("hawsabah_refuse_reason")->nullable()->after("sender_type");
            $table->string("created_by")->nullable()->after("hawsabah_refuse_reason");
            $table->string("sender_type_txt")->nullable()->after("created_by");
            $table->string("cr_number",50)->nullable()->after("sender_type_txt");
            $table->string("full_mobile",50)->nullable()->after("cr_number");
            $table->string("status_txt")->nullable()->after("sender_type_txt");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_senders', function (Blueprint $table) {
            $table->dropColumn("hawsabah_refuse_reason");
            $table->dropColumn("created_by");
            $table->dropColumn("sender_type_txt");
            $table->dropColumn("cr_number");
            $table->dropColumn("full_mobile");
            $table->dropColumn("status_txt");
        });
    }
}
