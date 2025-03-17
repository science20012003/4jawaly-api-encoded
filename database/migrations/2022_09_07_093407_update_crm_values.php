<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Propaganistas\LaravelPhone\PhoneNumber;
class UpdateCrmValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_lead_values', function (Blueprint $table) {
            $table->string("value_phone",20)->index()->nullable()->after("value");
        });
        (\App\Model\CrmLeadValue::whereIn("crm_lead_input_id",[9,8,5,4])
            ->get()->groupBy("crm_lead_id")->map(function ($row){
                $p1 = $row->where("crm_lead_input_id",5)->first();
                $p1c = $row->where("crm_lead_input_id",4)->first();
                $p2 = $row->where("crm_lead_input_id",9)->first();
                $p2c = $row->where("crm_lead_input_id",8)->first();

                try{
                    $p1_value_phone = trim(str_replace("+","",PhoneNumber::make($p1->value, $p1c->value)->formatE164()));
                }catch (\Exception $exception){
                    $p1_value_phone = null;
                }
                try{
                    $p2_value_phone = trim(str_replace("+","",PhoneNumber::make($p2->value, $p2c->value)->formatE164()));
                }catch (\Exception $exception){
                    $p2_value_phone = null;
                }
                \App\Model\CrmLeadValue::where("crm_lead_id",$p1->crm_lead_id)
                    ->where("crm_lead_input_id",5)->update(["value_phone"=>$p1_value_phone]);

                \App\Model\CrmLeadValue::where("crm_lead_id",$p2->crm_lead_id)
                    ->where("crm_lead_input_id",9)->update(["value_phone"=>$p2_value_phone]);
            }));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_lead_values', function (Blueprint $table) {
            $table->dropIndex("crm_lead_values_value_phone_index");
            $table->dropColumn("value_phone");
        });
    }
}
