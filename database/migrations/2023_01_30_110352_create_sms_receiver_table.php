<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsReceiverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_receivers', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->foreignId("account_id")->nullable()->constrained("accounts");
            $table->foreignId("ticket_id")->nullable()->constrained("tickets");
            $table->string("sender");
            $table->text("text");
            $table->boolean("is_read")->default(false);
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
        Schema::dropIfExists('sms_receivers');
    }
}
