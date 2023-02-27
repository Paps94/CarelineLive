<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PhoneNumber;

class PhoneNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      PhoneNumber::factory()->times(5)->create();
    }
}
