<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCrm1Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_lead_groups', function (Blueprint $table) {
            $table->string("title_hash",32)->nullable()->index()->after("title_en");
        });
        Schema::table('crm_leads', function (Blueprint $table) {
            $table->string("tmp_number",20)->nullable()->after("fullname");
            $table->string("tmp_country",2)->nullable()->after("tmp_number");
            $table->string("tmp_number_v",20)->index()->nullable()->after("tmp_country");
            $table->boolean("is_end")->default(true)->index()->after("tmp_number_v");
            $table->unique(["crm_lead_group_id","sub_crm_lead_group_id","tmp_number_v"],"crm_l_g_s_n_v_unique");
        });
        \App\Model\CrmLeadGroup::query()->update(["title_hash"=>\Illuminate\Support\Facades\DB::raw("md5(title_ar)")]);
        \Illuminate\Support\Facades\DB::statement("update IGNORE crm_leads set `tmp_number`=(select `value` from crm_lead_values where crm_lead_id = crm_leads.id and crm_lead_input_id=5),
        `tmp_country`=(select `value` from crm_lead_values where crm_lead_id = crm_leads.id and crm_lead_input_id=4),
        `tmp_number_v`=(select `value_phone` from crm_lead_values where crm_lead_id = crm_leads.id and crm_lead_input_id=5)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_lead_groups', function (Blueprint $table) {
            $table->dropIndex("crm_lead_groups_title_hash_index");
            $table->dropColumn("title_hash");
        });

        Schema::table('crm_leads', function (Blueprint $table) {
           $table->dropIndex("crm_l_g_s_n_v_unique");
            $table->dropIndex("crm_leads_is_end_index");
            $table->dropIndex("crm_leads_tmp_number_v_index");
            $table->dropColumn("tmp_number");
            $table->dropColumn("tmp_country");
            $table->dropColumn("tmp_number_v");
            $table->dropColumn("is_end");
        });
    }
}
