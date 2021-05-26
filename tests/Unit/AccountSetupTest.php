<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\LoanProviderService;
use App\Services\UnitTestService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class AccountSetupTest extends TestCase
{
    /* @@test */
    public function test_loan_provider_account_setup() {
        $this->withoutEvents();
        Session::start();

        $unit_test = new UnitTestService();
        $user = $unit_test->init_user();
        $request_payload = $unit_test->generateLoanProviderDetails();

        $loan_provider = new LoanProviderService();
        $loan_provider->createUser($request_payload, $user);

        $this->assertTrue(true);
    }
}
