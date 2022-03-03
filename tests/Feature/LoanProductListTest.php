<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoanProductListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_loan_product_list_screen_can_be_rendered()
    {
        $response = $this->get('loan/product/list');
        $response->assertStatus(302);
    }
}
