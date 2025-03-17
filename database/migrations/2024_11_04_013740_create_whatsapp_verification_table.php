<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained("accounts");
            $table->foreignId('whatsapp_number_id')->constrained("whatsapp_numbers");
            $table->foreignId('ticket_id')->nullable()->constrained("tickets");
            $table->string('business_account_link', 255)->nullable();
            $table->string('commercial_record_attachment', 50);
            $table->string('invoice_attachment', 50)->nullable();
            $table->string('other_attach', 50)->nullable();
            $table->string('site_link', 255)->nullable();
            $table->tinyInteger('verify_by')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->foreignId('refuse_reason_id')->nullable()->constrained("refuse_reasons");
            $table->string('other_reason', 255)->nullable();
            $table->dateTime('update_status')->nullable();
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
        Schema::dropIfExists('whatsapp_verifications');
    }
}
