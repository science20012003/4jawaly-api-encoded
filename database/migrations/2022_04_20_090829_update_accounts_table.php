<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->enum("source",[
                \App\Model\HawsabahRequest::SOURCE_HOUSESMS,
                \App\Model\HawsabahRequest::SOURCE_4JAWALYNET,
                \App\Model\HawsabahRequest::SOURCE_4JAWALYCOM,
                \App\Model\HawsabahRequest::SOURCE_SMPP,
                \App\Model\HawsabahRequest::SOURCE_SMSSC,
            ])->nullable()->after("remember_token");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn("source");
        });
    }
}
