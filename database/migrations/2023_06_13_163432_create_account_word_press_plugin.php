<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountWordPressPlugin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_wordpress_exts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->string("domain_name");
            $table->tinyInteger("install_by")->default(1);
            $table->string("url")->nullable();
            $table->string("username")->nullable();
            $table->string("password")->nullable();
            $table->boolean("has_firewall")->default(false);
            $table->string("firewall_username")->nullable();
            $table->string("firewall_password")->nullable();
            $table->string("sender_name",50)->nullable();
            $table->tinyInteger("status")->default(0);
            $table->dateTime("update_status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_wordpress_exts');
    }
}
