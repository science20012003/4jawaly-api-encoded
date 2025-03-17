<?php

use Illuminate\Database\Seeder;

class CountryCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Model\Country::count()<=0){
            $countries = [
              [
                  "country"=>[
                      "iso"=>'eg',
                      "1"=>"مصر",
                      "2"=>"Egypt",
                  ],
                  "cities"=>[

                          "1"=>'القاهره;الجيزة;السادس من أكتوبر;الشيخ زايد;الحوامدية;البدرشين;الصف;أطفيح;العياط;الباويطي;منشأة القناطر;أوسيم;كرداسة;أبو النمرس;كفر غطاطي;منشأة البكاري;الأسكندرية;برج العرب;برج العرب الجديدة;بنها;قليوب;شبرا الخيمة;القناطر الخيرية;الخانكة;كفر شكر;طوخ;قها;العبور;الخصوص;شبين القناطر;دمنهور;كفر الدوار;رشيد;إدكو;أبو المطامير;أبو حمص;الدلنجات;المحمودية;الرحمانية;إيتاي البارود;حوش عيسى;شبراخيت;كوم حمادة;بدر;وادي النطرون;النوبارية الجديدة;مرسى مطروح;الحمام;العلمين;الضبعة;النجيلة;سيدي براني;السلوم;سيوة;دمياط;دمياط الجديدة;رأس البر;فارسكور;الزرقا;السرو;الروضة;كفر البطيخ;عزبة البرج;ميت أبو غالب;كفر سعد;المنصورة;طلخا;ميت غمر;دكرنس;أجا;منية النصر;السنبلاوين;الكردي;بني عبيد;المنزلة;تمي الأمديد;الجمالية;شربين;المطرية;بلقاس;ميت سلسيل;جمصة;محلة دمنة;نبروه;كفر الشيخ;دسوق;فوه;مطوبس;برج البرلس;بلطيم;مصيف بلطيم;الحامول;بيلا;الرياض;سيدي سالم;قلين;سيدي غازي;طنطا;المحلة الكبرى;كفر الزيات;زفتى;السنطة;قطور;بسيون;سمنود;شبين الكوم;مدينة السادات;منوف;سرس الليان;أشمون;الباجور;قويسنا;بركة السبع;تلا;الشهداء;الزقازيق;العاشر من رمضان;منيا القمح;بلبيس;مشتول السوق;القنايات;أبو حماد;القرين;ههيا;أبو كبير;فاقوس;الصالحية الجديدة;الإبراهيمية;ديرب نجم;كفر صقر;أولاد صقر;الحسينية;صان الحجر القبلية;منشأة أبو عمر;بورسعيد;بورفؤاد;الإسماعيلية;فايد;القنطرة شرق;القنطرة غرب;التل الكبير;أبو صوير;القصاصين الجديدة;السويس;العريش;الشيخ زويد;نخل;رفح;بئر العبد;الحسنة;الطور;شرم الشيخ;دهب;نويبع;طابا;سانت كاترين;أبو رديس;أبو زنيمة;رأس سدر;بني سويف;بني سويف الجديدة;الواسطى;ناصر;إهناسيا;ببا;الفشن;سمسطا;الفيوم;الفيوم الجديدة;طامية;سنورس;إطسا;إبشواي;يوسف الصديق;المنيا;المنيا الجديدة;العدوة;مغاغة;بني مزار;مطاي;سمالوط;المدينة الفكرية;ملوي;دير مواس;أسيوط;أسيوط الجديدة;ديروط;منفلوط;القوصية;أبنوب;أبو تيج;الغنايم;ساحل سليم;البداري;صدفا;الخارجة;باريس;موط;الفرافرة;بلاط;الغردقة;رأس غارب;سفاجا;القصير;مرسى علم;الشلاتين;حلايب;سوهاج;سوهاج الجديدة;أخميم;أخميم الجديدة;البلينا;المراغة;المنشأة;دار السلام;جرجا;جهينة الغربية;ساقلته;طما;طهطا;قنا;قنا الجديدة;أبو تشت;نجع حمادي;دشنا;الوقف;قفط;نقادة;فرشوط;قوص;الأقصر;الأقصر الجديدة;إسنا;طيبة الجديدة;الزينية;البياضية;القرنة;أرمنت;الطود;أسوان;أسوان الجديدة;دراو;كوم أمبو;نصر النوبة;كلابشة;إدفو;الرديسية;البصيلية;السباعية;ابوسمبل السياحية',
                          "2" => 'Cairo;Giza;Sixth of October;Cheikh Zayed;Hawamdiyah;Al Badrasheen;Saf;Atfih;Al Ayat;Al-Bawaiti;ManshiyetAl Qanater;Oaseem;Kerdasa;Abu Nomros;Kafr Ghati;Manshiyet Al Bakari;Alexandria;Burj Al Arab;New Burj Al Arab;Banha;Qalyub;Shubra Al Khaimah;Al Qanater Charity;Khanka;Kafr Shukr;Tukh;Qaha;Obour;Khosous;Shibin Al Qanater;Damanhour;Kafr El Dawar;Rashid;Edco;Abu al-Matamir;Abu Homs;Delengat;Mahmoudiyah;Rahmaniyah;Itai Baroud;Housh Eissa;Shubrakhit;Kom Hamada;Badr;Wadi Natrun;New Nubaria;Marsa Matrouh;El Hamam;Alamein;Dabaa;Al-Nagila;Sidi Brani;Salloum;Siwa;Damietta;New Damietta;Ras El Bar;Faraskour;Zarqa;alsaru;alruwda;Kafr El-Batikh;Azbet Al Burg;Meet Abou Ghalib;Kafr Saad;Mansoura;Talkha;Mitt Ghamr;Dekernes;Aga;Menia El Nasr;Sinbillawin;El Kurdi;Bani Ubaid;Al Manzala;tami al\'amdid;aljamalia;Sherbin;Mataria;Belqas;Meet Salsil;Gamasa;Mahalat Damana;Nabroh;Kafr El Sheikh;Desouq;Fooh;Metobas;Burg Al Burullus;Baltim;Masief Baltim;Hamol;Bella;Riyadh;Sidi Salm;Qellen;Sidi Ghazi;Tanta;Al Mahalla Al Kobra;Kafr El Zayat;Zefta;El Santa;Qutour;Basion;Samannoud;Shbeen El Koom;Sadat City;Menouf;Sars El-Layan;Ashmon;Al Bagor;Quesna;Berkat El Saba;Tala;Al Shohada;Zagazig;Al Ashr Men Ramadan;Minya Al Qamh;Belbeis;Mashtoul El Souq;Qenaiat;Abu Hammad;El Qurain;Hehia;Abu Kabir;Faccus;El Salihia El Gedida;Al Ibrahimiyah;Deirb Negm;Kafr Saqr;Awlad Saqr;Husseiniya;san alhajar alqablia;Manshayat Abu Omar;PorSaid;PorFouad;Ismailia;Fayed;Qantara Sharq;Qantara Gharb;El Tal El Kabier;Abu Sawir;Kasasien El Gedida;Suez;Arish;Sheikh Zowaid;Nakhl;Rafah;Bir al-Abed;Al Hasana;Al Toor;Sharm El-Shaikh;Dahab;Nuweiba;Taba;Saint Catherine;Abu Redis;Abu Zenaima;Ras Sidr;Bani Sweif;Beni Suef El Gedida;Al Wasta;Naser;Ehnasia;beba;Fashn;Somasta;Fayoum;Fayoum El Gedida;Tamiya;Snores;Etsa;Epschway;Yusuf El Sediaq;Minya;Minya El Gedida;El Adwa;Magagha;Bani Mazar;Mattay;Samalut;Madinat El Fekria;Meloy;Deir Mawas;Assiut;Assiut El Gedida;Dayrout;Manfalut;Qusiya;Abnoub;Abu Tig;El Ghanaim;Sahel Selim;El Badari;Sidfa;El Kharga;Paris;Mout;Farafra;Balat;Hurghada;Ras Ghareb;Safaga;El Qusiar;Marsa Alam;Shalatin;Halaib;Sohag;Sohag El Gedida;Akhmeem;Akhmim El Gedida;Albalina;El Maragha;almunsha\'a;Dar AISalaam;Gerga;Jahina Al Gharbia;Saqilatuh;Tama;Tahta;Qena;New Qena;Abu Tesht;Nag Hammadi;Deshna;Alwaqf;Qaft;Naqada;Farshout;Quos;Luxor;New Luxor;Esna;New Tiba;Al ziynia;Al Bayadieh;Al Qarna;Armant;Al Tud;Aswan;Aswan El Gedida;Drau;Kom Ombo;Nasr Al Nuba;Kalabsha;Edfu;Al-Radisiyah;Al Basilia;Al Sibaeia;Abo Simbl Al Siyahia'

                  ]
              ],
                [
                    "country"=>[
                        "iso"=>'sa',
                        "1"=>"السعودية",
                        "2"=>"Saudi arabia",
                    ],
                    "cities"=>[

                            "1"=>'الابوة;الارطاوية;بدر;بلجرشي;بيشة;بارج;بريدة;الباحة;بوك أ;الدمام;الظهران;ضرما;ذهبان;الدرعية;ضباء;دومة الجندل;الدوادمي;مدينة فرسان;جاتجات;جيرها;القريات;الجوية;حوطة سدير;حبالة;هجرة;حقل;الحريق;حرمة;وابل;حوطة بني تميم;الهفوف;حريميلة;حفر الباطن;جبل أم الروؤس;جلاجل;الجوف;جدة;جيزان;مدينة جيزان الاقتصادية;الجبيل;الجعفر;الخفجي;خيبر;مدينة الملك عبدالله الاقتصادية;خميس مشيط;الخرج;مدينة المعرفة الاقتصادية بالمدينة المنورة;مدينه الخبر;Al-Khutt;ليلى;لحيان;الليث;المجمعة;مستورة;المخواة;المبرز;المواين;مكة المكرمة;المدينة المنورة;مزاحمية;نجران;النماص;اوملوج;العمران;العيون;القديمة;القطيف;القيصومة;القنفذة;رابغ;رفحاء;الرس;رأس تنورة;مدينة الرياض;رياض الخبراء;الرميلة;سبت العلايا;سيهات;مدينة الصفوة;سكاكا;شرورة;شقراء;شيبة;السليل;الطائف;تبوك;تنومة;تاروت;تيماء;ثادق;ثول;الثقبة;طريف;طبرجل;العضيلية;العلا;ام الصاحق;عنيزة;العقير;عيينة;عيون الجواء;وادي الدواسر;الوجه;ينبع;الزيمة;الزلفي',
                            "2" => 'Al-Abwa;Al Artaweeiyah;Badr;Baljurashi;Bisha;Bareg;Buraydah;Al Bahah;Buq a;Dammam;Dhahran;Dhurma;Dahaban;Diriyah;Duba;Dumat Al-Jandal;Dawadmi;Farasan city;Gatgat;Gerrha;Gurayat;Al-Gwei\'iyyah;Hautat Sudair;Habala;Hajrah;Haql;Al-Hareeq;Harmah;Ha\'il;Hotat Bani Tamim;Hofuf;Huraymila;Hafr Al-Batin;Jabal Umm al Ru\'us;Jalajil;Al Jawf;Jeddah;Jizan;Jizan Economic City;Jubail;Al Jafer;Khafji;Khaybar;King Abdullah Economic City;Khamis Mushayt;Al Kharj;Knowledge Economic City , Medina;Khobar;Al-Khutt;Layla;Lihyan;Al Lith;Al Majma\'ah;Mastoorah;Al Mikhwah;Al-Mubarraz;Al Mawain;Mecca;Medina;Muzahmiyya;Najran;Al-Namas;Omloj;Al-Omran;Al-Oyoon;Qadeimah;Qatif;Qaisumah;Al Qunfudhah;Rabigh;Rafha;Ar Rass;Ras Tanura;Riyadh;Riyadh Al-Khabra;Rumailah;Sabt Al Alaya;Saihat;Safwa city;Sakakah;Sharurah;Shaqraa;Shaybah;As Sulayyil;Taif;Tabuk;Tanomah;Tarout;Tayma;Thadiq;Thuwal;Thuqbah;Turaif;Tabarjal;Udhailiyah;Al-`Ula;Um Al-Sahek;Unaizah;Uqair;\'Uyayna;Uyun AlJiwa;Wadi Al-Dawasir;Al Wajh;Yanbu;Az Zaimah;Zulfi'

                    ]
                ]
            ];

            foreach ($countries as $country){
                $c = \App\Model\Country::create(['iso_code'=>$country['country']['iso']]);
                \App\Model\CountryLanguage::insert([
                    [
                        'country_id'=>$c->id,
                        'title'=>$country['country']['1'],
                        'language_id'=>1
                    ] ,  [
                    'country_id'=>$c->id,
                    'title'=>$country['country']['2'],
                    'language_id'=>2
                ]
                ]);
                $cities = [];

                foreach (explode(";",$country['cities'][1]) as $k=>$cc){
                    $cx = \App\Model\City::create(['country_id'=>$c->id]);
                    \App\Model\CityLanguage::insert([
                        [
                            'city_id'=>$cx->id,
                            'title'=>$cc,
                            'language_id'=>1
                        ] ,  [
                            'city_id'=>$cx->id,
                            'title'=>explode(";",$country['cities'][2])[$k] ,
                            'language_id'=>2
                        ]
                    ]);
                }
            }
        }
    }
}
