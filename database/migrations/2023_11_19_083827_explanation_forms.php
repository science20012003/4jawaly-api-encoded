<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExplanationForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explanation_forms',function (Blueprint $table) {

        $table->id();
        $table->foreignId('account_commercial_record_id')
        ->constrained("account_commercial_records")
        ->name("acr_acc_comm_rec_foreign");
        $table->uuid("uuid")->unique();
        $table->string("email")->nullable();
        $table->string("comment")->nullable();
        $table->string("admin_comment")->nullable();
        $table->string("name")->nullable();
        $table->string("attachment1_name");
        $table->string("attachment1_path", 50);
        $table->foreignId("ticket_id")->nullable()->constrained("tickets");
        $table->tinyInteger("status")->default(0);
        $table->boolean("is_system")->default(false);
        $table->boolean("is_notify")->default(false);
        $table->dateTime("update_status")->nullable();
        $table->unique(["account_commercial_record_id", "email"], "accemail_unique");
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
        Schema::dropIfExists('explanation_forms');
    }
}
