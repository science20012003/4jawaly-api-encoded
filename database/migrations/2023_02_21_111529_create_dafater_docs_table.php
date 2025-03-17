<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDafaterDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dafater_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("account_id")->nullable()->constrained("accounts")->onDelete("CASCADE");
            $table->string("name");
            $table->string("doctype");
            $table->string("default_currency",10)->nullable();
            $table->string("customer_type",20)->nullable();
            $table->string("tax_number",20)->nullable();
            $table->string("phone",20)->nullable();
            $table->string("customer_name")->nullable();
            $table->string("customer_id",50)->nullable();
            $table->unique(["name","doctype"]);
            $table->tinyInteger("status")->default(\App\Model\DafaterDoc::STATUS_NORMAL);
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
        Schema::dropIfExists('dafater_docs');
    }
}
