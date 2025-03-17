<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_templates', function (Blueprint $table) {
            $table->string('id',30)->primary();
            $table->foreignId("whatsapp_number_id")->constrained("whatsapp_numbers");
            $table->string('category');
            $table->json('components');
            $table->timestamp('created_at_system')->nullable();
            $table->string('created_by_user_id')->nullable();
            $table->string('created_by_user_name')->nullable();
            $table->string('external_id');
            $table->string('language');
            $table->timestamp('modified_at');
            $table->string('modified_by_user_id')->nullable();
            $table->string('modified_by_user_name')->nullable();
            $table->string('name');
            $table->string('namespace');
            $table->string('partner_id');
            $table->json('quality_score');
            $table->string('rejected_reason');
            $table->string('status');
            $table->boolean('updated_external');
            $table->string('waba_account_id');
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
        Schema::dropIfExists('whatsapp_templates');
    }
}
