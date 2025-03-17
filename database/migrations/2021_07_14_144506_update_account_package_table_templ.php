<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountPackageTableTempl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->foreignId("whatsapp_package_id")->nullable()->after("id")->constrained("whatsapp_packages");
        });
//        $package = \App\Model\WhatsappPackage::first();
//        if($package) {
//            $package->is_main = 1;
//            $package->save();
//        }
//        $packa_not_main = \App\Model\WhatsappPackage::where("is_main",0)->first();
//        $main_packages = \App\Model\WhatsappNumberAccountPackage::selectRaw("min(account_package_id) as min")
//            ->groupBy("whatsapp_number_id")->get()->pluck("min")->toArray();
//        \App\Model\AccountPackage::where("service_id",3)->update(["whatsapp_package_id"=>$packa_not_main->id]);
//        \App\Model\AccountPackage::where("service_id",3)->whereIn('id',$main_packages)->update(["whatsapp_package_id"=>$package->id]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_packages', function (Blueprint $table) {
            $table->dropForeign("whatsapp_package_id");
        });
    }
}
