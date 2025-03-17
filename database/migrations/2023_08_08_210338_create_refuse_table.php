<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefuseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refuse_reasons', function (Blueprint $table) {
            $table->id();
            $table->text("reason");
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_default')->default(0);
            $table->timestamps();
        });


        Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->foreignId("refuse_reason_id")->nullable()->after("status")->constrained("refuse_reasons");
            $table->string("other_reason")->nullable()->after("refuse_reason_id");
        });

        Schema::table('sms_account_packages', function (Blueprint $table) {
            $table->foreignId("refuse_reason_id")->nullable()->after("status")->constrained("refuse_reasons");
            $table->string("other_reason")->nullable()->after("refuse_reason_id");
        });

        Schema::table('account_fund_charges', function (Blueprint $table) {
            $table->foreignId("refuse_reason_id")->nullable()->after("status")->constrained("refuse_reasons");
            $table->string("other_reason")->nullable()->after("refuse_reason_id");
        });

        Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->foreignId("refuse_reason_id")->nullable()->after("status")->constrained("refuse_reasons");
            $table->string("other_reason")->nullable()->after("refuse_reason_id");
        });
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->foreignId("refuse_reason_id")->nullable()->after("status")->constrained("refuse_reasons");
            $table->string("other_reason")->nullable()->after("refuse_reason_id");
        });

        Schema::table('account_make_ext_pays', function (Blueprint $table) {
            $table->foreignId("refuse_reason_id")->nullable()->after("status")->constrained("refuse_reasons");
            $table->string("other_reason")->nullable()->after("refuse_reason_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_refuse_reasons');


        Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->dropForeign("refuse_reason_id");
            $table->dropColumn("refuse_reason_id");
            $table->dropColumn("other_reason");
        });

        Schema::table('sms_account_packages', function (Blueprint $table) {
            $table->dropForeign("refuse_reason_id");
            $table->dropColumn("refuse_reason_id");
            $table->dropColumn("other_reason");
        });

        Schema::table('account_fund_charges', function (Blueprint $table) {
            $table->dropForeign("refuse_reason_id");
            $table->dropColumn("refuse_reason_id");
            $table->dropColumn("other_reason");
        });

        Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->dropForeign("refuse_reason_id");
            $table->dropColumn("refuse_reason_id");
            $table->dropColumn("other_reason");
        });
        Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->dropForeign("refuse_reason_id");
            $table->dropColumn("refuse_reason_id");
            $table->dropColumn("other_reason");
        });

        Schema::table('account_make_ext_pays', function (Blueprint $table) {
            $table->dropForeign("refuse_reason_id");
            $table->dropColumn("refuse_reason_id");
            $table->dropColumn("other_reason");
        });
    }
}
