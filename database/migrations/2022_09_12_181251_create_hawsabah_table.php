<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHawsabahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('hawsabah_pay_senders');
        Schema::dropIfExists('hawsabah_pays');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('ticket_tags');
        Schema::dropIfExists('ticket_replies');
        Schema::dropIfExists('ticket_categories');
        Schema::enableForeignKeyConstraints();
        Schema::create('ticket_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId("service_id")->constrained("services");
            $table->index(["id","service_id"]);
            $table->string("name_ar");
            $table->string("name_en");
            $table->timestamps();
        });

        Schema::create('ticket_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ticket_category_id");
            $table->unsignedBigInteger("service_id");
            $table->foreign(["ticket_category_id","service_id"])
                ->references(["id","service_id"])->on("ticket_categories");
            $table->index(["id","ticket_category_id","service_id"]);
            $table->string("name_ar");
            $table->string("name_en");
            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->string("ticket_serial",30)->unique();
            $table->unsignedBigInteger("ticket_category_id");
            $table->unsignedBigInteger("service_id");
            $table->unsignedBigInteger("ticket_tag_id");
            $table->foreign(["ticket_tag_id","ticket_category_id","service_id"])
                ->references(["id","ticket_category_id","service_id"])
                ->on("ticket_tags");
            $table->string("title");
            $table->text("desc");
            $table->tinyInteger("status");
            $table->timestamps();
        });

        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->foreignId("account_id")->nullable()->constrained("accounts");
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->foreignId("ticket_id")->constrained("tickets");
            $table->string("model",40)->nullable();
            $table->unsignedBigInteger("model_id")->index()->nullable();
            $table->tinyInteger("type")->default(0);
            $table->text("desc")->nullable();
            $table->timestamps();
        });

        Schema::create('hawsabah_pays', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->constrained("accounts");
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->tinyInteger("bank_id");
            $table->string("depositor_name");
            $table->string("depositor_bank");
            $table->string("depositor_number",50);
            $table->date("deposit_date");
            $table->string("invoice_id",50)->nullable();
            $table->string("invoice_attachment",50)->nullable();
            $table->string("deposit_receipt",50)->nullable();
            $table->tinyInteger("status")->default(0);
            $table->double("price",10,6);
            $table->double("tax",10,6);
            $table->double("total",10,6);
            $table->timestamps();
        });
        Schema::create('hawsabah_pay_senders', function (Blueprint $table) {
            $table->foreignId("hawsabah_pay_id")->constrained("hawsabah_pays");
            $table->uuid("sender_uuid");
            $table->foreign("sender_uuid")->references("sender_uuid")
                ->on("hawsabah_request_senders");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hawsabah_pay_senders');
        Schema::dropIfExists('hawsabah_pays');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('ticket_tags');
        Schema::dropIfExists('ticket_categories');
    }
}
