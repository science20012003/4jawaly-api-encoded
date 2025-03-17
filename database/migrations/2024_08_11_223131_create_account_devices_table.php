<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_devices', function (Blueprint $table) {
            $table->string("key",100)->primary();
            $table->foreignId("account_id")->constrained("accounts")->onDelete("cascade");
            $table->foreignId("sub_account_id")->nullable()->constrained("sub_accounts")->onDelete("cascade");
            $table->ipAddress("ip_address");
            $table->string("agent");
            $table->dateTime("expire_at");
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
        Schema::dropIfExists('account_devices');
    }
}
