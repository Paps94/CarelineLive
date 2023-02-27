<?php
namespace Tests\Unit;

use App\Models\Device;
use App\Models\DeviceTracking;
use App\Models\User;
use App\Models\MobileContract;
use App\Models\SimCard;
use App\Models\NetworkProvider;
use App\Models\PhoneNumber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Artisan;

class RelationsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Summary of setUp
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh');
    }

    /** @test */
    public function test_user_has_device()
    {
        $user = User::factory()->create();
        $device = Device::factory()->create(['user_id' => $user->id]);

        $this->assertEquals(1, $user->devices->count());
    }

    public function test_device_belongs_to_user()
    {
      $user = User::factory()->create();
      $device = Device::factory()->create(['user_id' => $user->id]);

      $this->assertInstanceOf(User::class, $device->user);
    }

    /** @test */
    public function test_user_has_mobile_contract()
    {
        $user = User::factory()->create();
        $sim = SimCard::factory()->create();
        $network = NetworkProvider::factory()->create();
        $phoneNumber = PhoneNumber::factory()->create();

        $mobileContract = MobileContract::factory()->create([
          'user_id' => $user->id,
          'network_provider_id' => $network->id,
          'sim_card_id' => $sim->id,
          'phone_number_id' => $phoneNumber->id
        ]);

        $this->assertEquals(1, $user->mobileContract->count());
    }

    public function test_mobile_contract_belongs_to_user()
    {
      $user = User::factory()->create();
      $sim = SimCard::factory()->create();
      $network = NetworkProvider::factory()->create();
      $phoneNumber = PhoneNumber::factory()->create();

      $mobileContract = MobileContract::factory()->create([
        'user_id' => $user->id,
        'network_provider_id' => $network->id,
        'sim_card_id' => $sim->id,
        'phone_number_id' => $phoneNumber->id
      ]);

      $this->assertInstanceOf(User::class, $mobileContract->user);
    }

    public function test_user_has_device_tracking()
    {
        $user = User::factory()->create();
        $device = Device::factory()->create(['user_id' => $user->id]);
        $deviceTracking = DeviceTracking::factory()->create([
          'user_id' => $user->id,
          'device_id' => $device->id
        ]);

        $this->assertEquals(1, $user->deviceTrackings->count());
    }

    public function test_device_tracking_belongs_to_user()
    {
      $user = User::factory()->create();
      $device = Device::factory()->create(['user_id' => $user->id]);
      $deviceTracking = DeviceTracking::factory()->create([
        'user_id' => $user->id,
        'device_id' => $device->id
      ]);

      $this->assertInstanceOf(User::class, $deviceTracking->user);
    }

    public function test_device_has_device_tracking()
    {
        $user = User::factory()->create();
        $device = Device::factory()->create(['user_id' => $user->id]);
        $deviceTracking = DeviceTracking::factory()->create([
          'user_id' => $user->id,
          'device_id' => $device->id
        ]);

        $this->assertEquals(1, $device->deviceTrackings->count());
    }

    public function test_device_tracking_belongs_to_device()
    {
      $user = User::factory()->create();
      $device = Device::factory()->create(['user_id' => $user->id]);
      $deviceTracking = DeviceTracking::factory()->create([
        'user_id' => $user->id,
        'device_id' => $device->id
      ]);

      $this->assertInstanceOf(Device::class, $deviceTracking->device);
    }

    /** @test */
    public function test_network_provider_has_mobile_contract()
    {
        $user = User::factory()->create();
        $sim = SimCard::factory()->create();
        $network = NetworkProvider::factory()->create();
        $phoneNumber = PhoneNumber::factory()->create();

        $mobileContract = MobileContract::factory()->create([
          'user_id' => $user->id,
          'network_provider_id' => $network->id,
          'sim_card_id' => $sim->id,
          'phone_number_id' => $phoneNumber->id
        ]);

        $this->assertEquals(1, $network->mobileContracts->count());
    }

    public function test_mobile_contract_belongs_to_network_provider()
    {
      $user = User::factory()->create();
      $sim = SimCard::factory()->create();
      $network = NetworkProvider::factory()->create();
      $phoneNumber = PhoneNumber::factory()->create();

      $mobileContract = MobileContract::factory()->create([
        'user_id' => $user->id,
        'network_provider_id' => $network->id,
        'sim_card_id' => $sim->id,
        'phone_number_id' => $phoneNumber->id
      ]);

      $this->assertInstanceOf(NetworkProvider::class, $mobileContract->networkProvider);
    }

    /** @test */
    public function test_sim_card_has_one_mobile_contract()
    {
        $user = User::factory()->create();
        $sim = SimCard::factory()->create();
        $network = NetworkProvider::factory()->create();
        $phoneNumber = PhoneNumber::factory()->create();

        $mobileContract = MobileContract::factory()->create([
          'user_id' => $user->id,
          'network_provider_id' => $network->id,
          'sim_card_id' => $sim->id,
          'phone_number_id' => $phoneNumber->id
        ]);

        $this->assertEquals(1, $sim->mobileContract->count());
    }

    public function test_sim_card_belongs_to_mobile_contract()
    {
      $user = User::factory()->create();
      $sim = SimCard::factory()->create();
      $network = NetworkProvider::factory()->create();
      $phoneNumber = PhoneNumber::factory()->create();

      $mobileContract = MobileContract::factory()->create([
        'user_id' => $user->id,
        'network_provider_id' => $network->id,
        'sim_card_id' => $sim->id,
        'phone_number_id' => $phoneNumber->id
      ]);

      $this->assertInstanceOf(SimCard::class, $mobileContract->simCard);
    }

    /** @test */
    public function test_phone_number_has_one_mobile_contract()
    {
        $user = User::factory()->create();
        $sim = SimCard::factory()->create();
        $network = NetworkProvider::factory()->create();
        $phoneNumber = PhoneNumber::factory()->create();

        $mobileContract = MobileContract::factory()->create([
          'user_id' => $user->id,
          'network_provider_id' => $network->id,
          'sim_card_id' => $sim->id,
          'phone_number_id' => $phoneNumber->id
        ]);

        $this->assertEquals(1, $phoneNumber->mobileContract->count());
    }

    public function test_phone_number_belongs_to_mobile_contract()
    {
      $user = User::factory()->create();
      $sim = SimCard::factory()->create();
      $network = NetworkProvider::factory()->create();
      $phoneNumber = PhoneNumber::factory()->create();

      $mobileContract = MobileContract::factory()->create([
        'user_id' => $user->id,
        'network_provider_id' => $network->id,
        'sim_card_id' => $sim->id,
        'phone_number_id' => $phoneNumber->id
      ]);

      $this->assertInstanceOf(PhoneNumber::class, $mobileContract->phoneNumber);
    }

    /** @test */
    public function test_network_provider_has_phone_numbers()
    {
        $network = NetworkProvider::factory()->create();
        $phoneNumber = PhoneNumber::factory()->create([
          'network_provider_id' => $network->id,
        ]);

        $this->assertEquals(1, $network->phoneNumbers->count());
    }

    public function test_phone_number_belongs_to_network_provider()
    {
      $network = NetworkProvider::factory()->create();
      $phoneNumber = PhoneNumber::factory()->create([
        'network_provider_id' => $network->id,
      ]);

      $this->assertInstanceOf(NetworkProvider::class, $phoneNumber->networkProvider);
    }

    /** @test */
    public function test_network_provider_has_sim_cards()
    {
        $network = NetworkProvider::factory()->create();
        $sim = SimCard::factory()->create([
          'network_provider_id' => $network->id,
        ]);

        $this->assertEquals(1, $network->simCards->count());
    }

    public function test_sim_card_belongs_to_network_provider()
    {
      $network = NetworkProvider::factory()->create();
      $sim = SimCard::factory()->create([
        'network_provider_id' => $network->id,
      ]);

      $this->assertInstanceOf(NetworkProvider::class, $sim->networkProvider);
    }

    /** @test */
    public function test_sim_card_has_phone_number()
    {
        $sim = SimCard::factory()->create();
        $phone = PhoneNumber::factory()->create(['sim_card_id' => $sim->id]);

        $this->assertEquals(1, $sim->phoneNumber->count());
    }

    public function test_phone_number_belongs_to_sim_card()
    {
      $sim = SimCard::factory()->create();
      $phone = PhoneNumber::factory()->create(['sim_card_id' => $sim->id]);


      $this->assertInstanceOf(PhoneNumber::class, $sim->phoneNumber);
    }
}

?>
