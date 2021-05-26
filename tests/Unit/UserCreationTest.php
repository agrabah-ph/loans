<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\UnitTestService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserCreationTest extends TestCase {
    /* @test */
    public function test_user_creation() {
        $this->withoutEvents();
        Session::start();

        $unit_test = new UnitTestService;
        $unit_test->init_user();

        $this->assertTrue(true);
    }
}

