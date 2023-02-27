<?php

namespace Tests\Unit;

use App\Models\User;
use Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * Summary of setUp
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }

    /**
     * It's important not to run tests on a live db therefore we are making user of RefreshDatabase
     * where everytime we run our tests it wipes out the test database and new records are seeded
     * and destroyed after our test is over!
     */
    use RefreshDatabase;
    /**
     * Test our index page
     *
     * @return void
     */
    public function test_user_index()
    {
        $this->get(route('users.index'))
            ->assertOk()
            ->assertJsonStructure([
                'success',
                'data' => [
                  '*' => [
                    'id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at'
                  ]
                ]
            ]);
    }

    /**
     * Function to check if we can load a single user
     * @return void
     */
    public function test_user_show()
    {
        $user = user::first();

        $this->get(route('users.show', ['user' => $user]))
            ->assertOk()
            ->assertJsonStructure([
                'success',
                'data' => [
                  'id',
                  'name',
                  'email',
                  'posts' => [
                    '*' => [
                      'id',
                      'user_id',
                      'type',
                      'serial_number',
                      'imei',
                      'manufacturer',
                      'model',
                      'operating_system',
                      'deactivated',
                      'created_at',
                      'updated_at',
                    ]
                ],
                'created_at'
              ]
            ]);
    }

    /**
     * Function to check if adding a new user works!
     * @return void
     */
    public function test_user_add()
    {
        //Make sure the record does not exist
        $this->assertDatabaseMissing('users', [
            'name' => 'Mr Tester'
        ]);

        //Create our targeted record
        $this->post(route('users.store'), [
            'name' => 'Mr Tester',
            'email' => 'testing@email.com',
            'password' => 'TestingPassword',
        ])->assertOk();

        //Check that our targeted record exists
        $this->assertDatabaseHas('users', ['name' => 'Mr Tester']);
    }

     /**
     * Function to check if updating an existing user works!
     * @return void
     */
    public function test_user_update()
    {
        //Get the first record from the database
        $user = user::first();

        //Make sure the record does not exist
        $this->assertDatabaseMissing('users', [
            'name' => 'UpdatedName'
        ]);

        //Update our targeted record
        $this->patch(route('users.update', ['user' => $user]), [
            'name' => 'UpdatedName',
            'email' => 'testingUpdate@email.com',
            'password' => 'TestingPasswordUpdate',
        ])->assertOk();

        //Check that our targeted record exists
        $this->assertDatabaseHas('users', [
          'name' => 'UpdatedName',
          'email' => 'testingUpdate@email.com',
          'password' => 'TestingPasswordUpdate',
        ]);
    }


    /**
     * Function to check if deleting a user works
     *
     * @return void
     */
    public function test_user_delete()
    {
        //Get the first record from the database
        $user = user::first();

        //Update our targeted record
        $this->delete(route('users.destroy', ['user' => $user]))
            ->assertOk();

        //Make sure the record does not exist
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
