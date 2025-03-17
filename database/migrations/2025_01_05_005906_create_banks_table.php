<?php

use App\Model\WhatsappAccountPackage;
use App\Model\BankCurrency;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bank_currencies');
        Schema::dropIfExists('banks');
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description")->nullable();
            $table->tinyInteger("status")->default(1);
            $table->timestamps();
        });

        Schema::create('bank_currencies', function (Blueprint $table) {
            $table->foreignId("bank_id")->constrained("banks")->onDelete("cascade");
            $table->foreignId("currency_id")->constrained("currencies")->onDelete("cascade");
            $table->unique(["bank_id", "currency_id"]);
            $table->boolean("is_main")->default(false);
            $table->double("rate",50,20)->default(1);
            $table->tinyInteger("status")->default(1);
            $table->boolean("to_daftra")->default(false);
            $table->unsignedBigInteger("daftra_id")->nullable();
            $table->boolean("to_oodoo")->default(false);
            $table->unsignedBigInteger("oodoo_id")->nullable();
        });
        $all_packages = \App\Model\WhatsappAccountPackage::whereNotNull("bank_id")->get()->toArray();
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->dropColumn("bank_id");
        });
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->foreignId("bank_id")->nullable()->after("payment_method_id")->constrained("banks");
        });
        $currency = \App\Model\Currency::where("is_default",1)->first();
        $bank = \App\Model\Bank::create([
            "id"=>WhatsappAccountPackage::BANK_RAGHY,
            "name"=>"RAGHY"
        ]);

        BankCurrency::create([
            'bank_id'=>$bank->id,
            'currency_id'=>$currency->id,
            'is_main'=>1,
            'rate'=>1,
            'status'=>1,
            'to_daftra'=>1,
            'daftra_id'=>\App\Custom\Daftra\Invoices\Repo::DAFTRA_BANK_RAGHY,
            'to_oodoo'=>1,
            'oodoo_id'=>\App\Custom\Odoo::BANK_RAGHY,
        ]);

        $bank = \App\Model\Bank::create([
            "id"=>WhatsappAccountPackage::BANK_AHLY,
            "name"=>"AHLY"
        ]);

        BankCurrency::create([
            'bank_id'=>$bank->id,
            'currency_id'=>$currency->id,
            'is_main'=>1,
            'rate'=>1,
            'status'=>1,
            'to_daftra'=>1,
            'daftra_id'=>\App\Custom\Daftra\Invoices\Repo::DAFTRA_BANK_AHLY,
            'to_oodoo'=>1,
            'oodoo_id'=>\App\Custom\Odoo::BANK_AHLY,
        ]);

        $bank = \App\Model\Bank::create([
            "id"=>WhatsappAccountPackage::BANK_REYAID,
            "name"=>"REYAID"
        ]);

        BankCurrency::create([
            'bank_id'=>$bank->id,
            'currency_id'=>$currency->id,
            'is_main'=>1,
            'rate'=>1,
            'status'=>1,
            'to_daftra'=>1,
            'daftra_id'=>\App\Custom\Daftra\Invoices\Repo::DAFTRA_BANK_REYAID,
            'to_oodoo'=>1,
            'oodoo_id'=>\App\Custom\Odoo::BANK_REYAID,
        ]);

        $bank = \App\Model\Bank::create([
            "id"=>WhatsappAccountPackage::BANK_INMAA,
            "name"=>"INMAA"
        ]);

        BankCurrency::create([
            'bank_id'=>$bank->id,
            'currency_id'=>$currency->id,
            'is_main'=>1,
            'rate'=>1,
            'status'=>1,
            'to_daftra'=>1,
            'daftra_id'=>\App\Custom\Daftra\Invoices\Repo::DAFTRA_BANK_INMAA,
            'to_oodoo'=>1,
            'oodoo_id'=>\App\Custom\Odoo::BANK_INMAA,
        ]);


        foreach ($all_packages as $all_package){
           WhatsappAccountPackage::where("id",$all_package["id"])->update(["bank_id"=>$all_package["bank_id"]]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_currencies');
        Schema::dropIfExists('banks');
    }
}
