<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablehawsabahRequestSenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->tinyInteger("request_status")->default(0)->index()->after("sender_key");
            $table->integer("total_days")->default(0)->after("remaining_days");
            $table->date("payment_date")->nullable()->after("total_days");
            $table->date("expiry_date")->nullable()->after("payment_date");
            $table->date("last_modified_date")->nullable()->after("expiry_date");
            $table->integer("number_of_actions")->default(0)->after("last_modified_date");

            $table->text("c_hawsabah_refuse_reason")->nullable()->after("number_of_actions");
            $table->string("c_sender_key",10)->nullable()->index()->after("c_hawsabah_refuse_reason");
            $table->tinyInteger("c_request_status")->default(0)->index()->after("c_sender_key");
            $table->date("c_created")->nullable()->after("c_request_status");
            $table->date("c_last_date")->nullable()->after("c_created");
            $table->uuid("c_sender_id")->nullable()->index()->after("c_last_date");
            $table->integer("c_remaining_days")->default(0)->after("c_last_date");
            $table->integer("c_total_days")->default(0)->after("c_remaining_days");
            $table->date("c_payment_date")->nullable()->after("c_total_days");
            $table->date("c_expiry_date")->nullable()->after("c_payment_date");
            $table->date("c_last_modified_date")->nullable()->after("c_expiry_date");
            $table->integer("c_number_of_actions")->default(0)->after("c_last_modified_date");
            $table->index("sender_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hawsabah_request_senders', function (Blueprint $table) {
            $table->dropIndex("hawsabah_request_senders_c_sender_id_index");
            $table->dropIndex("hawsabah_request_senders_c_request_status_index");
            $table->dropIndex("hawsabah_request_senders_c_sender_key_index");
            $table->dropIndex("hawsabah_request_senders_request_status_index");
            $table->dropIndex("hawsabah_request_senders_sender_id_index");
            $table->dropColumn("request_status");
            $table->dropColumn("total_days");
            $table->dropColumn("payment_date");
            $table->dropColumn("expiry_date");
            $table->dropColumn("last_modified_date");
            $table->dropColumn("number_of_actions");

            $table->dropColumn("c_hawsabah_refuse_reason");
            $table->dropColumn("c_sender_key",10);
            $table->dropColumn("c_request_status");
            $table->dropColumn("c_created");
            $table->dropColumn("c_last_date");
            $table->dropColumn("c_sender_id");
            $table->dropColumn("c_remaining_days");
            $table->dropColumn("c_total_days");
            $table->dropColumn("c_payment_date");
            $table->dropColumn("c_expiry_date");
            $table->dropColumn("c_last_modified_date");
            $table->dropColumn("c_number_of_actions");
        });
    }
}
