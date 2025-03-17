<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCrmTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_lead_groups', function (Blueprint $table) {
            $table->foreignId("sub_account_id")->nullable()->after("account_id")->constrained("sub_accounts");
        });

        Schema::table('crm_lead_inputs', function (Blueprint $table) {
            $table->foreignId("sub_account_id")->nullable()->after("account_id")->constrained("sub_accounts");
        });

        Schema::table('crm_lead_list_items', function (Blueprint $table) {
            $table->foreignId("sub_account_id")->nullable()->after("account_id")->constrained("sub_accounts");
        });

        Schema::table('crm_lead_lists', function (Blueprint $table) {
            $table->foreignId("sub_account_id")->nullable()->after("account_id")->constrained("sub_accounts");
        });
        Schema::table('crm_leads', function (Blueprint $table) {
            $table->foreignId("sub_account_id")->nullable()->after("account_id")->constrained("sub_accounts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_lead_groups', function (Blueprint $table) {
            $table->dropForeign("crm_lead_groups_sub_account_id_foreign");
            $table->dropColumn("sub_account_id");
        });

        Schema::table('crm_lead_inputs', function (Blueprint $table) {
            $table->dropForeign("crm_lead_inputs_sub_account_id_foreign");
            $table->dropColumn("sub_account_id");
        });

        Schema::table('crm_lead_list_items', function (Blueprint $table) {
            $table->dropForeign("crm_lead_list_items_sub_account_id_foreign");
            $table->dropColumn("sub_account_id");
        });

        Schema::table('crm_lead_lists', function (Blueprint $table) {
            $table->dropForeign("crm_lead_lists_sub_account_id_foreign");
            $table->dropColumn("sub_account_id");
        });
        Schema::table('crm_leads', function (Blueprint $table) {
            $table->dropForeign("crm_leads_sub_account_id_foreign");
            $table->dropColumn("sub_account_id");
        });
    }
}
