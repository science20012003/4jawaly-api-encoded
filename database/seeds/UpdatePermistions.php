<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UpdatePermistions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $insert = [];
       $i =  collect(app('router')->getRoutes())->pluck('action')->pluck('as')->filter()
            ->map(function ($item){
                if(\Illuminate\Support\Str::contains($item,'{service}')){
                    $items = [];
                    foreach (["sms","whatsapp","voice"] as $i){
                        $my_itm = \Illuminate\Support\Str::replaceFirst('{service}',$i,$item);
                        if(\Illuminate\Support\Str::contains($my_itm,'{type}')){
                            foreach (["sender","word","number"] as $ii){
                                $items[] = \Illuminate\Support\Str::replaceFirst('{type}',$ii,$my_itm);
                            }
                        }else{
                            $items[] = $my_itm;
                        }
                    }
                    return  $items;
                }else{
                    return $item;
                }
            })->merge(collect(config('special_permissions')))->toArray();
       foreach ($i as $item){
           if(is_array($item)){
               foreach ($item as $ii){
                   if(!Str::endsWith($ii,["find","set-default",'status'])){
                       $this->storePerm($ii);
                       $insert[] = $ii;
                   }

               }
           }else{
               if(!Str::endsWith($item,["find","set-default",'status'])) {
                   $this->storePerm($item);
                   $insert[] = $item;
               }
           }
       }
       if(in_array(app()->environment(),["local","development"])) {
        \Spatie\Permission\Models\Permission::whereNotIn("name",$insert)->delete();
        $role = \Spatie\Permission\Models\Role::where('name',AddUsersAdminTest::ROLE_TEST)->first();
        if(!$role){
            $role = \Spatie\Permission\Models\Role::create(['name' => AddUsersAdminTest::ROLE_TEST]);
        }
        $role->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        $role = \Spatie\Permission\Models\Role::where('name',AddUsersAdminTest::ROLE_OPERATION_MANAGER)->first();
        if(!$role){
            $role = \Spatie\Permission\Models\Role::create(['name' => AddUsersAdminTest::ROLE_OPERATION_MANAGER]);
        }
        $role->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        $role = \Spatie\Permission\Models\Role::where('name',AddUsersAdminTest::ROLE_SUPPORT)->first();
        if(!$role){
            $role = \Spatie\Permission\Models\Role::create(['name' => AddUsersAdminTest::ROLE_SUPPORT]);
        }
        $role->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        $role = \Spatie\Permission\Models\Role::where('name',AddUsersAdminTest::ROLE_ACCOUNTANT)->first();
        if(!$role){
            $role = \Spatie\Permission\Models\Role::create(['name' => AddUsersAdminTest::ROLE_ACCOUNTANT]);
        }
        $role->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        $role = \Spatie\Permission\Models\Role::where('name',AddUsersAdminTest::ROLE_SUPER_ADMIN)->first();
        if(!$role){
            $role = \Spatie\Permission\Models\Role::create(['name' => AddUsersAdminTest::ROLE_SUPER_ADMIN]);
        }
        $role->givePermissionTo(\Spatie\Permission\Models\Permission::all());
       }
    }

    /**
     * @param $name
     * @return bool
     */
    private function storePerm($name)
    {
        $count = \Spatie\Permission\Models\Permission::where("name",$name)->count();
        if($count<=0){
            \Spatie\Permission\Models\Permission::create(["name"=>$name]);
        }
        return true;
    }
}
