<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //Call each seeding class to create it's respectable db dummy records
      $this->call(UsersSeeder::class);
      $this->call(DeviceSeeder::class);
      $this->call(DeviceTrackingSeeder::class);
      $this->call(MobileContractSeeder::class);
      $this->call(NetworkProviderSeeder::class);
      $this->call(PhoneNumberSeeder::class);
      $this->call(SimCardSeeder::class);
    }
}
