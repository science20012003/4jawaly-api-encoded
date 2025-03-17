<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountssubAccountsGovSenderApproveStatusSite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->tinyInteger("sub_accounts_gov_sender_approve_status_api")->after("sub_accounts_gov_sender_approve_status")->default(0);
            $table->tinyInteger("sub_accounts_gov_sender_approve_status_site")->after("sub_accounts_gov_sender_approve_status_api")->default(0);
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
            //
        });
    }
}
