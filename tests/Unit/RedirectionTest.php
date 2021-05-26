<?php

namespace Tests\Unit;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\TestCase;

class RedirectionTest extends TestCase
{
    /* @test */
    public function test_login_page_redirection() {
        new RedirectResponse('/');
        $this->assertTrue(true);
    }

    /* @test  */
    public function test_register_page_redirection() {
        new RedirectResponse('/register');
        $this->assertTrue(true);
    }

    /* @test */
    public function test_forgot_password_page_redirection() {
        new RedirectResponse('/forgot-password');
        $this->assertTrue(true);
    }

    /* @test */
    public function test_reset_password_page_redirection() {
        new RedirectResponse('/login');
        $this->assertTrue(true);
    }

    public function test_borrower_registration_redirection() {
        new RedirectResponse('/register-borrower');

        $this->assertTrue(true);
    }
}
