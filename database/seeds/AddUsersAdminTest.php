<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AddUsersAdminTest extends Seeder
{
    public static $test_emails =  [
        "system@4jawaly.com",
        "mad3om@gmail.com",
        "ebtesam.mohamed@4jawaly.net",
        "s.adel@4jawaly.net"
    ];
    const ROLE_TEST ="sales-man";
    const ROLE_OPERATION_MANAGER ="Operation-Manger";
    const ROLE_SUPPORT ="Support";
    const ROLE_ACCOUNTANT ="Accountant";
    const ROLE_SUPER_ADMIN ="Super-Admin";
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return;
        $role = Role::where('name',self::ROLE_TEST)->first();
        if(!$role){
            $role = Role::create(['name' => self::ROLE_TEST]);
        }
        foreach (self::$test_emails as $email) {
            $user = \App\User::where('email',$email)->first();
            if(!$user){
                $user =  \App\User::create(
                    [
                        'name'=>$email,"password"=>$email ,'email'=>$email,'status'=>1
                    ]
                );
            }
            $user->syncRoles([$role]);
        }
    }
}
