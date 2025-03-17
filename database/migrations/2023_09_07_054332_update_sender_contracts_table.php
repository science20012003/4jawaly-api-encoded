<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSenderContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('hawsabah_sender_contracts');
        Schema::create('hawsabah_sender_contracts', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("request_id")->index();
            $table->uuid("sender_id")->index();
            $table->date("created_date");
            $table->tinyInteger("request_status");
            $table->tinyInteger("sender_status");
            $table->tinyInteger("request_type");
            $table->string("client_name");
            $table->string("provider_name");
            $table->integer("remaining_days");
            $table->integer("total_days");
            $table->string("sender_name",50)->index();
            $table->string("customer_type",20);
            $table->text("sender_conectivity_detail")->nullable();
            $table->integer("sender_conectivity_count")->default(0);
            $table->integer("sender_type")->default(0);
            $table->text("hawsabah_refuse_reason")->nullable();
            $table->string("created_by")->nullable();
            $table->integer("number_of_actions")->default(0);
            $table->date("expiry_date")->nullable();
            $table->date("payment_date")->nullable();
            $table->date("last_modified_date")->nullable();
            $table->date("zain_activation_date")->nullable();
            $table->date("mobily_activation_date")->nullable();
            $table->date("stc_activation_date")->nullable();
            $table->string("sender_type_txt")->nullable();
            $table->string("cr_number",50)->nullable();
            $table->uuid("update_session")->nullable();
            $table->timestamps();
        });

        Schema::create('hawsabah_sender_contract_histories', function (Blueprint $table) {
            $table->foreignUuid("id")->constrained("hawsabah_sender_contracts");
            $table->date("create_date");
            $table->string("request_status",50);
            $table->text("comment")->nullable();
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
        Schema::dropIfExists('hawsabah_sender_contract_histories');
        Schema::dropIfExists('hawsabah_sender_contracts');
        Schema::create('hawsabah_sender_contracts', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("request_id")->index();
            $table->uuid("sender_id")->index();
            $table->date("created_date");
            $table->tinyInteger("request_status");
            $table->tinyInteger("sender_status");
            $table->tinyInteger("request_type");
            $table->string("client_name");
            $table->string("provider_name");
            $table->integer("remaining_days");
            $table->integer("total_days");
            $table->string("sender_name",50)->index();
            $table->string("customer_type",20);
            $table->text("sender_conectivity_detail")->nullable();
            $table->integer("sender_conectivity_count")->default(0);
            $table->integer("sender_type")->default(0);
            $table->text("hawsabah_refuse_reason")->nullable();
            $table->string("created_by")->nullable();
            $table->string("expiryDate")->nullable();
            $table->string("sender_type_txt")->nullable();
            $table->string("cr_number",50)->nullable();
            $table->string("status_txt")->nullable();
            $table->uuid("update_session")->nullable();
            $table->timestamps();
        });
    }
}
