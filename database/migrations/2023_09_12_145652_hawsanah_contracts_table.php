<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HawsanahContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hawsabah_request_contracts', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->foreignId("ticket_id")->nullable()->constrained("tickets");
            $table->foreignId("hawsabah_request_id")->nullable()->constrained("hawsabah_requests");
            $table->integer("duration")->default(1);
            $table->date("start_date")->nullable();
            $table->text("sender_names");
            $table->integer("request_type");
            $table->tinyInteger("status")->default(0);
            $table->tinyInteger("h_status")->default(0);
            $table->text("error_msg")->nullable();
            $table->text("full_response")->nullable();
            $table->text("comment")->nullable();
            $table->date("expiry_date");
            $table->string("attachment",50);
            $table->string("attachment_file_mame",191);
            $table->string("stamp_attachment",50)->nullable();
            $table->string("stamp_attachment_file_mame",191)->nullable();
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
        Schema::dropIfExists('hawsabah_request_contracts');
    }
}
