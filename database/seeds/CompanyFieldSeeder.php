<?php

use Illuminate\Database\Seeder;

class CompanyFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Model\CompanyField::count()<=0){
            foreach ([
                         [
                             1=>"برمجة",
                             2=>"programing"
                         ],[
                    1=>"بترول",
                    2=>"petrol"
                ]
                     ] as $item){
                $c = \App\Model\CompanyField::create();
                \App\Model\CompanyFieldLanguage::insert([
                    [
                        'company_field_id'=>$c->id,
                        'title'=>$item[1],
                        'language_id'=>1
                    ] ,  [
                        'company_field_id'=>$c->id,
                        'title'=>$item[2],
                        'language_id'=>2
                    ]
                ]);
            }
        }
    }
}
