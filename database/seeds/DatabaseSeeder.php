<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('CountryCitySeeder');
         $this->call('CompanyFieldSeeder');
         $this->call('InternetServicesSeeder');
         $this->call('RegisterTermsSeeder');
         $this->call('CreateTestAccounts');
         $this->call('AddUsersAdminTest');
         $this->call('UpdatePermistions');
         $this->call(UpdateGeneralSettings::class);
    }
}
