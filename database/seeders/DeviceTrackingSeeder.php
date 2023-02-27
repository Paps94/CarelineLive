<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeviceTracking;

class DeviceTrackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DeviceTracking::factory()->times(5)->create();
    }
}
