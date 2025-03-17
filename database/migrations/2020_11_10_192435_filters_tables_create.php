<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FiltersTablesCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_default')->default(0);
            $table->text('widgets')->nullable();
            $table->timestamps();
        });

        Schema::create('theme_languages', function (Blueprint $table) {
            $table->foreignId('theme_id')->constrained('themes');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['theme_id','language_id']);
            $table->string('title',200);
        });

        Schema::create('filter_groups', function (Blueprint $table) {
            $table->id();
            $table->enum('service',["sms","whatsapp","voice"]);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_default')->default(0);
            $table->timestamps();
        });

        Schema::create('filter_group_languages', function (Blueprint $table) {
            $table->foreignId('filter_group_id')->constrained('filter_groups');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['filter_group_id','language_id']);
            $table->string('title',200);
        });

        Schema::create('filter_group_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('reason')->nullable();
            $table->foreignId('filter_group_id')->constrained('filter_groups');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('type',["sender","word","number"]);
            $table->timestamps();
        });

        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->enum('service',["sms","whatsapp","voice"]);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_default')->default(0);
            $table->timestamps();
        });

        Schema::create('currency_languages', function (Blueprint $table) {
            $table->foreignId('currency_id')->constrained('currencies');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['currency_id','language_id']);
            $table->string('title',200);
            $table->string('abbr',10);
            $table->string('small_title',200);
            $table->string('small_abbr',10);
        });




        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->enum('service',["sms","whatsapp","voice"]);
            $table->integer('code');
            $table->tinyInteger('status')->default(1);
            $table->foreignId('network_id')->nullable()->constrained('networks');
            $table->timestamps();
        });

        Schema::create('network_languages', function (Blueprint $table) {
            $table->foreignId('network_id')->constrained('networks');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['network_id','language_id']);
            $table->string('title',200);
        });

        Schema::create('network_tags', function (Blueprint $table) {
            $table->id();
            $table->enum('service',["sms","whatsapp","voice"]);
            $table->foreignId('network_id')->constrained('networks');
            $table->timestamps();
        });
        Schema::table('networks', function (Blueprint $table) {
            $table->foreignId('network_tag_id')->after('network_id')->nullable()->constrained('network_tags');
        });
        Schema::create('network_tag_languages', function (Blueprint $table) {
            $table->foreignId('network_tag_id')->constrained('network_tags');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(['network_tag_id','language_id']);
            $table->string('title',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('networks', function (Blueprint $table) {
            $table->dropForeign("networks_network_tag_id_foreign");
            $table->dropColumn('network_tag_id');
        });
        Schema::dropIfExists('network_tag_languages');
        Schema::dropIfExists('network_tags');
        Schema::dropIfExists('theme_languages');
        Schema::dropIfExists('themes');
        Schema::dropIfExists('filter_group_blocks');
        Schema::dropIfExists('filter_group_languages');
        Schema::dropIfExists('filter_groups');
        Schema::dropIfExists('networks');
        Schema::dropIfExists('network_languages');
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('currency_languages');
        Schema::enableForeignKeyConstraints();
    }
}
