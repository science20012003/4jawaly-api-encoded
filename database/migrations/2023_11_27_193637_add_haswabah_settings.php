<?php

use Illuminate\Database\Migrations\Migration;


class AddHaswabahSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        try {
            \App\Model\GeneralSetting::create([
                'key' => "hawsabah_domain_send",
                'value' => 2,
                'is_serialize' => 0
            ]);
        } catch (\PDOException $exception) {

        }
        try {
            \App\Model\GeneralSetting::create([
                'key' => "hawsabah_domain_reports",
                'value' => 3,
                'is_serialize' => 0
            ]);
        } catch (\PDOException $exception) {

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
