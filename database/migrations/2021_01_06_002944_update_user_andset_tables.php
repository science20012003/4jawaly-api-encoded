<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserAndsetTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sending_centers', function (Blueprint $table) {
            $table->id();
            $table->enum('service',["sms","whatsapp","voice"]);
            $table->foreignId("gate_id")->nullable()->constrained("gates");
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_default')->default(0);
            $table->timestamps();
        });

        Schema::create('sending_center_networks', function (Blueprint $table) {
            $table->foreignId("sending_center_id")->constrained("sending_centers");
            $table->foreignId("network_id")->constrained("networks");
            $table->foreignId("gate_id")->constrained("gates");
            $table->unique(["sending_center_id","network_id"]);
        });
        Schema::create('sending_center_languages', function (Blueprint $table) {
            $table->foreignId('sending_center_id')->constrained('sending_centers');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['sending_center_id','language_id']);
            $table->string('title',200);
        });


        Schema::create('pricing_policies', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_default')->default(0);
            $table->timestamps();
        });

        Schema::create('pricing_policy_languages', function (Blueprint $table) {
            $table->foreignId('pricing_policy_id')->constrained('pricing_policies');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['pricing_policy_id','language_id']);
            $table->string('title',200);
        });


        Schema::table('accounts', function (Blueprint $table) {
            $table->foreignId('theme_id')->nullable()->after('zoho_id')->constrained('themes');
            $table->foreignId('filter_group_id')->nullable()->after('theme_id')->constrained('filter_groups');
            $table->foreignId('pricing_policy_id')->nullable()->after('filter_group_id')->constrained('pricing_policies');
            $table->foreignId('sending_center_id')->nullable()->after('pricing_policy_id')->constrained('sending_centers');
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

        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign("accounts_theme_id_foreign");
            $table->dropForeign("accounts_filter_group_id_foreign");
            $table->dropForeign("accounts_pricing_policy_id_foreign");
            $table->dropForeign("accounts_sending_center_id_foreign");
            $table->dropColumn('theme_id');
            $table->dropColumn('filter_group_id');
            $table->dropColumn('pricing_policy_id');
            $table->dropColumn('sending_center_id');
        });
        Schema::dropIfExists('sending_center_networks');
        Schema::dropIfExists('sending_centers');
        Schema::dropIfExists('sending_center_languages');
        Schema::dropIfExists('pricing_policies');
        Schema::dropIfExists('pricing_policy_languages');
        Schema::enableForeignKeyConstraints();
    }
}
