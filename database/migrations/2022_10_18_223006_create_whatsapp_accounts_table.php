<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_accounts', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("user_account_id")->constrained("accounts");
            $table->foreignId("whatsapp_number_id")->constrained("whatsapp_numbers");
            $table->boolean("allow_send")->default(false);
            $table->boolean("allow_receive")->default(false);
            $table->string("tag")->nullable();
            $table->string("name")->nullable();
            $table->date("end_at")->nullable();
            $table->tinyInteger("user_status")->default(\App\Model\WhatsappAccount::USER_STATUS_PENDING);
            $table->tinyInteger("status")->default(\App\Model\WhatsappAccount::STATUS_ACTIVE);
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
        Schema::dropIfExists('whatsapp_accounts');
    }
}
