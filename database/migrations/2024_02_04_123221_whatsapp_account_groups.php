<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WhatsappAccountGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_account_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("whatsapp_number_id")->constrained("whatsapp_numbers");
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

        });

        Schema::create('whatsapp_account_group_members', function (Blueprint $table) {
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("whatsapp_account_group_id")->constrained("whatsapp_account_groups");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp_account_group_members');
        Schema::dropIfExists('whatsapp_account_groups');
    }
}
