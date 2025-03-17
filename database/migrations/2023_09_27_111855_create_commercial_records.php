<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_commercial_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained("accounts");
            $table->uuid("uuid")->unique();
            $table->string("owner_name")->nullable();
            $table->string("client_name");
            $table->tinyInteger("customer_type");
            $table->string("cr_number");
            $table->string("enterprise_unified_number");
            $table->string("attachment1_name")->nullable();
            $table->string("attachment1_path",50)->nullable();
            $table->foreignId("ticket_id")->nullable()->constrained("tickets");
            $table->tinyInteger("status")->default(0);
            $table->boolean("is_notify")->default(false);
            $table->dateTime("update_status")->nullable();
            $table->boolean("is_system")->default(false);
            $table->unique(["account_id","cr_number"]);
            $table->timestamps();
        });

        Schema::create('account_commercial_representatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_commercial_record_id')
                ->constrained("account_commercial_records")
                ->name("acr_acc_comm_rec_foreign");
            $table->uuid("uuid")->unique();
            $table->string("representative_email");
            $table->string("representative_mobile",50);
            $table->string("representative_name");
            $table->string("attachment1_name");
            $table->string("attachment1_path",50);
            $table->foreignId("ticket_id")->nullable()->constrained("tickets");
            $table->tinyInteger("status")->default(0);
            $table->boolean("is_system")->default(false);
            $table->boolean("is_notify")->default(false);
            $table->dateTime("update_status")->nullable();
            $table->unique(["account_commercial_record_id","representative_email","representative_mobile"],"accr_unique");
            $table->timestamps();
        });
        Schema::create('account_commercial_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_commercial_record_id')
                ->constrained("account_commercial_records")
                ->name("acr_acc_comm_rec1_foreign");
            $table->uuid("uuid")->unique();
            $table->text("comment")->nullable();
            $table->date("expiry_date");
            $table->string("attachment",50)->nullable();
            $table->string("attachment_file_mame",191)->nullable();
            $table->string("stamp_attachment",50)->nullable();
            $table->string("stamp_attachment_file_mame",191)->nullable();
            $table->boolean("is_system")->default(false);
            $table->foreignId("ticket_id")->nullable()->constrained("tickets");
            $table->tinyInteger("status")->default(0);
            $table->boolean("is_notify")->default(false);
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
        Schema::dropIfExists('account_commercial_contracts');
        Schema::dropIfExists('account_commercial_representatives');
        Schema::dropIfExists('account_commercial_records');
    }
}
