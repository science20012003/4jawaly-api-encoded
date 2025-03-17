<?php

use Illuminate\Database\Seeder;

class RegisterTermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Model\RegisterTerm::count()<=0){
            for ($i=0;$i<=10;$i++){
                $c = \App\Model\RegisterTerm::create();
                \App\Model\RegisterTermLanguage::insert([
                    [
                        'register_term_id'=>$c->id,
                        'title'=>"title $i title $i",
                        'desc'=>" Desc $i Desc $i Desc $i Desc $i Desc $i Desc $i Desc $i Desc $i Desc $i Desc $i",
                        'language_id'=>2
                    ] ,  [
                        'register_term_id'=>$c->id,
                        'title'=>"عنوان $i عنوان $i ",
                        'desc'=>"وصف $i وصف $i وصف $i وصف $i وصف $i وصف $i وصف $i وصف $i وصف $i وصف $i وصف $i وصف $i ",
                        'language_id'=>1
                    ]
                ]);
            }
        }
    }
}
