<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSubAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_accounts', function (Blueprint $table) {
            $table->boolean("can_use_salla")->default(false)->after("can_change_data");
            $table->boolean("can_use_sheet")->default(false)->after("can_use_salla");
            $table->boolean("can_use_mail")->default(false)->after("can_use_sheet");
            $table->boolean("can_use_whatsapp")->default(false)->after("can_use_mail");
            $table->boolean("can_use_wordpress")->default(false)->after("can_use_whatsapp");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_accounts', function (Blueprint $table) {
            $table->dropColumn("can_use_salla");
            $table->dropColumn("can_use_sheet");
            $table->dropColumn("can_use_mail");
            $table->dropColumn("can_use_whatsapp");
            $table->dropColumn("can_use_wordpress");
        });
    }
}
