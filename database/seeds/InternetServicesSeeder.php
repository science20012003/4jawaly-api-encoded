<?php

use Illuminate\Database\Seeder;

class InternetServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(\App\Model\InterestedService::count()<=0){
            foreach ([
                         [
                             1=>"الرسائل النصية",
                             2=>"Text messages"
                         ],[
                    1=>" استضافة المواقع",
                    2=>"Web hosting"
                ],[
                    1=>" رسائل الواتساب",
                    2=>"WhatsApp messages"
                ],[
                    1=>"برمجة تطبيقات الجوال  ",
                    2=>"Mobile application programming"
                ],[
                    1=>" الرسائل الصوتية",
                    2=>"Voice messages"
                ],[
                    1=>" برمجة المواقع",
                    2=>"Programming sites"
                ],[
                    1=>"رسائل تنبيهات سطح المكتب ",
                    2=>"Desktop notification messages"
                ],[
                    1=>" الموشن جرافيك",
                    2=>"Motion graphics"
                ]
                     ] as $item){
                $c = \App\Model\InterestedService::create();
                \App\Model\InterestedServiceLanguage::insert([
                    [
                        'interested_service_id'=>$c->id,
                        'title'=>$item[1],
                        'language_id'=>1
                    ] ,  [
                        'interested_service_id'=>$c->id,
                        'title'=>$item[2],
                        'language_id'=>2
                    ]
                ]);
            }
        }
    }
}
