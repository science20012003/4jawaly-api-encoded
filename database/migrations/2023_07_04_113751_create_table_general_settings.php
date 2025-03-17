<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGeneralSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->string("key")->primary();
            $table->text("value")->nullable();
            $table->boolean("is_serialize")->default(false);
            $table->timestamps();
        });

        foreach ([
            "wordpress_ext_download",
            "wordpress_ext_code",
            "wordpress_ext_url",
                 ] as $key){
            \App\Model\GeneralSetting::create(["key"=>$key]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
