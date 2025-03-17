<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HawsabahPayUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       \Illuminate\Support\Facades\DB::statement("ALTER TABLE  `hawsabah_pays`
MODIFY COLUMN `with` enum('Bank','Visa','Balance') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bank' AFTER `approve_via`;");

       \Illuminate\Support\Facades\DB::statement("ALTER TABLE  `hawsabah_renew_pays`
MODIFY COLUMN `with` enum('Bank','Visa','Balance') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bank' AFTER `approve_via`;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE   `hawsabah_pays`
MODIFY COLUMN `with` enum('Bank','Visa') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bank' AFTER `approve_via`;");

        \Illuminate\Support\Facades\DB::statement("ALTER TABLE   `hawsabah_renew_pays`
MODIFY COLUMN `with` enum('Bank','Visa') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bank' AFTER `approve_via`;");
    }
}
