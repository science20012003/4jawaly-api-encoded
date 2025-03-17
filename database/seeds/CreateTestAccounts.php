<?php

use Illuminate\Database\Seeder;

class CreateTestAccounts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test_emails = [
            "system@4jawaly.com",
            "science20012003@gmail.com",
            "mohamedalaa80000@gmail.com",
            "s.adel@4jawaly.net",
            "ebtesam.mohamed@4jawaly.net",
            "m.mokhtar.fci@gmail.com"
        ];
        $password = "4J@waly123";
        foreach ($test_emails as $email) {
            $city = \App\Model\City::inRandomOrder()->first();
            try {
                 \App\Model\Account::create(
                    [
                        "email" => $email,
                        "mobile" => rand(201110633086, 201190633086),
                        "country_iso" => 'EG',
                        "name" => $email,
                        "account_type" => rand(1, 2),
                        "company_name" => $email,
                        "company_field_id" => \App\Model\CompanyField::first()->id,
                        "is_developer" => rand(1, 2),
                        "country_id" => $city->country_id,
                        "city_id" => $city->id,
                        "is_marketer" => rand(1, 2),
                        "password" => app('hash')->make($password),
                        "odoo_id" => rand(1, 100000),
                        "status" => 1,
                        "fb_id" => null,
                        "google_id" => null,
                        "zoho_id" => null
                    ]
                );
            }catch (\Exception $e){
             //   dump($e->getMessage());
            }
        }


//        try {
//            \App\Model\Account::create(
//                [
//                    "email" => "abubandar995@gmail.com",
//                    "mobile" => "966508569831",
//                    "country_iso" => 'SA',
//                    "name" => "مجموعة عرايب للتجارة والصناعة",
//                    "account_type" => rand(1, 2),
//                    "company_name" => "مجموعة عرايب للتجارة والصناعة  ",
//                    "company_field_id" => \App\Model\CompanyField::first()->id,
//                    "is_developer" => rand(1, 2),
//                    "country_id" => $city->country_id,
//                    "city_id" => $city->id,
//                    "is_marketer" => rand(1, 2),
//                    "password" => app('hash')->make("jv3k*q6REbhS"),
//                    "odoo_id" => rand(1, 100000),
//                    "status" => 1,
//                    "fb_id" => null,
//                    "google_id" => null,
//                    "zoho_id" => null
//                ]
//            );
//        }catch (\Exception $e){
//            //   dump($e->getMessage());
//        }
    }
}
