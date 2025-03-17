<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HawsabahRequestesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hawsabah_requests', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();
            $table->foreignId('account_id')->nullable()->constrained("accounts");
            $table->integer("duration");
            $table->date("start_date");
            $table->string("client_name");
            $table->tinyInteger("customer_type");
            $table->string("cr_number");
            $table->string("enterprise_unified_number");
            $table->string("representative_email");
            $table->string("representative_mobile",50);
            $table->string("representative_name");
            $table->boolean("is_already_exist")->default(false);
            $table->integer("request_type");
            $table->tinyInteger("status")->default(0);
            $table->string("attachment1_name");
            $table->string("attachment1_path",50);
            $table->string("attachment2_name")->nullable();
            $table->string("attachment2_path",50)->nullable();
            $table->string("attachment3_name")->nullable();
            $table->string("attachment3_path",50)->nullable();
            $table->text("error_msg")->nullable();
            $table->text("full_response")->nullable();
            $table->timestamps();
        });
        Schema::create('hawsabah_request_senders', function (Blueprint $table) {
            $table->foreignId("hawsabah_request_id")->constrained("hawsabah_requests");
            $table->string("sender",30);
            $table->string("types",20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hawsabah_request_senders');
        Schema::dropIfExists('hawsabah_requests');
    }
}
