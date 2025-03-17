<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HawsabahSenderCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hawsabah_senders', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("request_id");
            $table->uuid("sender_id");
            $table->date("created_date");
            $table->tinyInteger("request_status");
            $table->tinyInteger("sender_status");
            $table->tinyInteger("request_type");
            $table->string("representative_email");
            $table->string("representative_name");
            $table->string("representative_mobile",20);
            $table->string("client_name");
            $table->string("provider_name");
            $table->integer("remaining_days");
            $table->integer("total_days");
            $table->string("sender_name",50)->index();
            $table->boolean("is_already_exist");
            $table->string("customer_type",20);
            $table->text("sender_conectivity_detail")->nullable();
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
        Schema::dropIfExists('hawsabah_senders');
    }
}
