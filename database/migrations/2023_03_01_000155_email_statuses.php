<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmailStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_events', function (Blueprint $table) {
            $table->string("msg_id")->index();
            $table->string("event")->nullable();
            $table->foreignId("ticket_id")->nullable()->constrained("tickets")->onDelete("CASCADE");
            $table->string("email");
            $table->string("class");
            $table->string("model_id");
            $table->string("mailer",20);
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
        Schema::dropIfExists('email_events');
    }
}
