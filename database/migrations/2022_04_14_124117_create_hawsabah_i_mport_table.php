<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHawsabahIMportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_requests', function (Blueprint $table) {
          $table->enum("source",[
              \App\Model\HawsabahRequest::SOURCE_HOUSESMS,
              \App\Model\HawsabahRequest::SOURCE_4JAWALYNET,
              \App\Model\HawsabahRequest::SOURCE_4JAWALYCOM,
              \App\Model\HawsabahRequest::SOURCE_SMPP,
              \App\Model\HawsabahRequest::SOURCE_SMSSC,
          ])->nullable()->after("full_response");
        });

        Schema::create('hawsabah_imports', function (Blueprint $table) {
            $table->uuid("uuid")->primary();
            $table->string("title");
            $table->mediumText("data");
            $table->tinyInteger("status")->default(0);
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
        Schema::table('hawsabah_requests', function (Blueprint $table) {
            $table->dropColumn("source");
        });
        Schema::dropIfExists('hawsabah_imports');
    }
}
