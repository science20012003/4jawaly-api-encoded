<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountPackageTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_packages', function (Blueprint $table) {
            $table->id();
            $table->double('package_price',30,10);
            $table->double('per_message',30,10);
            $table->date('expire_at');
            $table->foreignId('account_id')->nullable()->constrained('accounts');
            $table->foreignId('service_id')->nullable()->constrained('services');
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
        Schema::dropIfExists('account_packages');
    }
}
