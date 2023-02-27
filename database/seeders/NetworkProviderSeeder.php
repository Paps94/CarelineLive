<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NetworkProvider;

class NetworkProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      NetworkProvider::factory()->times(5)->create();
    }
}
