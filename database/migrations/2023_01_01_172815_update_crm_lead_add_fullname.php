<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCrmLeadAddFullname extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_leads', function (Blueprint $table) {
            $table->string("fullname")->index()->nullable()->after("sub_crm_lead_group_id");
        });
        foreach (\App\Model\CrmLead::all() as $v){
           $v->fullname =  $v->crmLeadValue->whereIn("crm_lead_input_id",[2,16])->pluck("value")->implode(" ");
           $v->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_leads', function (Blueprint $table) {
            $table->dropColumn("fullname");
        });
    }
}
