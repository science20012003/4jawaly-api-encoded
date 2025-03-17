<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UpdateGeneralSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
                     "wordpress_ext_download",
                     "wordpress_ext_code",
                     "wordpress_ext_url",
                     "stop_hawsabah_senders",
                     "stop_hawsabah_contracts",
                     "secure_qr_code",
                     "secure_qr_code2",
                 ] as $key){
            if(\App\Model\GeneralSetting::where("key",$key)->count()<=0) {
                \App\Model\GeneralSetting::create(["key" => $key]);
            }
        }
    }

}
