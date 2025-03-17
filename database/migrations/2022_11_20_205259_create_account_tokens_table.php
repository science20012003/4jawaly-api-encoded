<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_tokens', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->string("name");
            $table->text("ips");
            $table->string("token",40)->unique();
            $table->foreignId("account_id")->constrained("accounts");
            $table->text("comments")->nullable();
            $table->dateTime("expired_at")->nullable();
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
        Schema::dropIfExists('account_tokens');
    }
}
