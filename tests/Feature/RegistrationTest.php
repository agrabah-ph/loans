<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
//        $this->withoutExceptionHandling(); //for detaild error logging
        $response = $this->get('/registration');
        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $faker = Factory::create();
        $array = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $password = $faker->password,
            'password_confirmation' => $password,
        ];
        $this->withoutExceptionHandling();
        $response = $this->post('/register', $array);
        $response->assertStatus(302);
    }
}
