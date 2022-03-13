<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QrReaderTest extends TestCase
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
        $response = $this->get('/qr-reader');
        $response->assertStatus(200);
    }
}
