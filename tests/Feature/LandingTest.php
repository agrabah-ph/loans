<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    use RefreshDatabase;

    public function test_landing_screen_can_be_rendered()
    {
//        $this->withoutExceptionHandling(); //for detailed error logging
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_about_screen_can_be_rendered()
    {
        $response = $this->get('/about-us');
        $response->assertStatus(200);
    }

    public function test_privacy_policy_screen_can_be_rendered()
    {
        $response = $this->get('/about-us');
        $response->assertStatus(200);
    }


    public function test_terms_condition_screen_can_be_rendered()
    {
        $response = $this->get('/terms-condition');
        $response->assertStatus(200);
    }

    public function test_contacts_screen_can_be_rendered()
    {
        $response = $this->get('/contacts');
        $response->assertStatus(200);
    }


}
