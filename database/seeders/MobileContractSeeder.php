<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MobileContract;

class MobileContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      MobileContract::factory()->times(5)->create();
    }
}
