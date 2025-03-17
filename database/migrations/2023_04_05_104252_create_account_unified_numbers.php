<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountUnifiedNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('account_unified_invitations');
        Schema::dropIfExists('account_unified_numbers');
        Schema::create('account_unified_numbers', function (Blueprint $table) {
            $table->uuid("uuid");
            $table->foreignId("account_id")->constrained("accounts")->onDelete("CASCADE");
            $table->string("unified_number",20);
            $table->unique(["account_id","unified_number"]);
            $table->timestamps();
        });

        Schema::create('account_unified_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts")->onDelete("CASCADE");
            $table->foreignId("hawsabah_request_id")->constrained("hawsabah_requests")->onDelete("CASCADE");
            $table->tinyInteger("status")->default(0);
            $table->foreignId("user_id")->constrained("users")->onDelete("CASCADE");
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
        Schema::dropIfExists('account_unified_invitations');
        Schema::dropIfExists('account_unified_numbers');
    }
}
