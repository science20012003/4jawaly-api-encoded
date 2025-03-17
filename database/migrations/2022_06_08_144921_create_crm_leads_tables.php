<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmLeadsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('crm_lead_lists');
        Schema::dropIfExists('crm_lead_list_items');
        Schema::dropIfExists('crm_lead_groups');
        Schema::dropIfExists('crm_leads');
        Schema::dropIfExists('crm_lead_inputs');
        Schema::dropIfExists('crm_lead_values');
        Schema::enableForeignKeyConstraints();
        Schema::create('crm_lead_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->nullable()->constrained("accounts");
            $table->string("title_ar");
            $table->string("title_en");
            $table->timestamps();
        });
        $ins = [];
        foreach ([
            "titles",
            "leads status",
            "client types",
            "ratings",
            "lead sources",
            "interested in",
            "industries",
                 ] as $item){
            $ins[] = [
              "title_ar"=>$item,
              "title_en"=>$item
            ];
        }
        \Illuminate\Support\Facades\DB::table("crm_lead_lists")->insert($ins);
        Schema::create('crm_lead_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->nullable()->constrained("accounts");
            $table->string("title_ar");
            $table->string("title_en");
            $table->foreignId("crm_lead_list_id")->constrained("crm_lead_lists");
            $table->timestamps();
        });

        Schema::create('crm_lead_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->nullable()->constrained("accounts");
            $table->foreignId("crm_lead_group_id")->nullable()->constrained("crm_lead_groups")->onDelete("CASCADE");
            $table->string("title_ar");
            $table->string("title_en");
            $table->timestamps();
        });

        Schema::create('crm_lead_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->nullable()->constrained("accounts");
            $table->string("slug");
            $table->enum("type",["input","select","textarea"]);
            $table->string("validation");
            $table->foreignId("crm_lead_list_id")->nullable()->constrained("crm_lead_lists");
            $table->timestamps();
        });
        $ins = [];
        $ins[] = ["slug"=>"f_name_title","type"=>"select","validation"=>"nullable","crm_lead_list_id"=>1];
        $ins[] = ["slug"=>"f_name","type"=>"input","validation"=>"required|min:2|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"title","type"=>"input","validation"=>"nullable|min:2|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"phone_country","type"=>"input","validation"=>"required_with:phone|min:2|max:2","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"phone","type"=>"input","validation"=>"phone:phone_country|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"email","type"=>"input","validation"=>"nullable|email|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"email2","type"=>"input","validation"=>"nullable|email|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"phone2_country","type"=>"input","validation"=>"required_with:phone2|min:2|max:2","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"phone2","type"=>"input","validation"=>"phone:phone2_country|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"account_type","type"=>"select","validation"=>"nullable|max:255","crm_lead_list_id"=>3];
        $ins[] = ["slug"=>"lead_source","type"=>"select","validation"=>"nullable|max:255","crm_lead_list_id"=>5];
        $ins[] = ["slug"=>"interested","type"=>"select","validation"=>"nullable|max:255","crm_lead_list_id"=>6];
        $ins[] = ["slug"=>"industry","type"=>"select","validation"=>"nullable|max:255","crm_lead_list_id"=>7];
        $ins[] = ["slug"=>"annual_revenue","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"company","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"last_name","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"email3","type"=>"input","validation"=>"nullable|email|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"website","type"=>"input","validation"=>"nullable|url|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"lead_status","type"=>"select","validation"=>"nullable|max:255","crm_lead_list_id"=>2];
        $ins[] = ["slug"=>"no_of_employees","type"=>"input","validation"=>"nullable|numeric","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"ratings","type"=>"select","validation"=>"nullable|max:255","crm_lead_list_id"=>4];
        $ins[] = ["slug"=>"skype_id","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"twitter","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"street","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"city","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"state","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"zip_code","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"country","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"google_map_points","type"=>"input","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        $ins[] = ["slug"=>"description","type"=>"textarea","validation"=>"nullable|max:255","crm_lead_list_id"=>null];
        \Illuminate\Support\Facades\DB::table("crm_lead_inputs")->insert($ins);

        Schema::create('crm_leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->nullable()->constrained("accounts");
            $table->foreignId("crm_lead_group_id")->nullable()->constrained("crm_lead_groups");
            $table->foreignId("sub_crm_lead_group_id")->nullable()->constrained("crm_lead_groups");
            $table->timestamps();
        });
        Schema::create('crm_lead_values', function (Blueprint $table) {
            $table->foreignId("crm_lead_id")->constrained("crm_leads");
            $table->foreignId("crm_lead_input_id")->constrained("crm_lead_inputs");
            $table->string("value")->nullable();
            $table->unique(["crm_lead_id","crm_lead_input_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('crm_lead_lists');
        Schema::dropIfExists('crm_lead_list_items');
        Schema::dropIfExists('crm_lead_groups');
        Schema::dropIfExists('crm_leads');
        Schema::dropIfExists('crm_lead_inputs');
        Schema::dropIfExists('crm_lead_values');
        Schema::enableForeignKeyConstraints();
    }
}
