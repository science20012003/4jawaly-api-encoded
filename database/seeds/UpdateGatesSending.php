<?php

use Illuminate\Database\Seeder;


class UpdateGatesSending extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $gate = \App\Model\Gate::where('id',1)->first();
       if(!$gate){
           $gate = \App\Model\Gate::create(['name'=>"test",'service'=>"whatsapp",'protocol'=>"https",'domain'=>"php-eg.com",'port','username'=>"eslam",'password'=>"eslam",'status'=>1]);
       }

       $network = \App\Model\Network::where('id',1)->first();
      if(!$network){
          $network = \App\Model\Network::create(['status'=>1,'service'=>"whatsapp",'network_id'=>null,'code'=>"20"]);
          foreach (\App\Model\Language::all() as $language){
              \App\Model\NetworkLanguage::create(['network_id'=>$network->id,'title'=>"Egypt",'language_id'=>$language->id]);
          }
      }
    }
}
