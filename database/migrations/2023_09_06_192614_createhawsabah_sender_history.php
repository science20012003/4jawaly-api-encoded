<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatehawsabahSenderHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hawsabah_sender_histories', function (Blueprint $table) {
            $table->foreignUuid("id")->constrained("hawsabah_senders");
            $table->date("create_date");
            $table->string("request_status",50);
            $table->text("comment")->nullable();
            $table->timestamps();
        });

        Schema::table('hawsabah_senders', function (Blueprint $table) {
            $table->integer("number_of_actions")->default(0)->after("full_mobile");
            $table->date("payment_date")->nullable()->after("number_of_actions");
            $table->date("expiry_date")->nullable()->after("payment_date");
            $table->date("last_modified_date")->nullable()->after("expiry_date");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hawsabah_sender_histories');
        Schema::table('hawsabah_senders', function (Blueprint $table) {
            $table->dropColumn("number_of_actions");
            $table->dropColumn("payment_date");
            $table->dropColumn("expiry_date");
            $table->dropColumn("last_modified_date");
        });
    }
}
