<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FinanceRegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    use RefreshDatabase;

    public function test_farmer_registration()
    {
        $faker = Factory::create();
        $response = $this->post('loan-user-registration-store', [
            'email' => $faker->email,
            'password' => bcrypt($faker->password),
            'passkey' => 'password',
            'type' => 'farmer',
        ]);
        $this->withoutExceptionHandling();
        $response->assertRedirect('/');
    }
}
