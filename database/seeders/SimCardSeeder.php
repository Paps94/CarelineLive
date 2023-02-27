<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SimCard;

class SimCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      SimCard::factory()->times(5)->create();
    }
}
