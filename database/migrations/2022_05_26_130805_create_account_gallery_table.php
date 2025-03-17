<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_galleries', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->integer("order")->default(0);
            $table->string("file");
            $table->string("file_name")->nullable();
            $table->string("mime_type",50)->nullable();
            $table->string("ext",10)->nullable();
            $table->integer("size")->nullable();
            $table->foreignId("account_id")->nullable()->constrained("accounts")->onDelete("SET NULL");
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
        Schema::dropIfExists('account_galleries');
    }
}
