<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 3/5/2021
 * Time: 11:09 PM
 */

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UnitTestService {
    public function init_user() {
        $mail = 'unittest'.rand(0, 999);
        return User::create([
            'email' => "{$mail}@ag.com",
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => bcrypt('admin'),
        ]);
    }

    public function generateLoanProviderDetails() {
        return new Request([
            'fname' => 'John',
            'lname' => 'Doe',
            'bank_name' => 'Mabuhay Rural Bank',
            'branch_name' => 'Quezon Branch',
            'address_line' => '672 2F, 2-D Bldg., Quezon',
            'account_name' => 'BANK - MRB',
            'account_number' => '3332-223-123',
            'tin' => '12345678',
            'contact_person' => 'Jane Doe',
            'contact_number' => '+998 312 8645',
            'designation' => 'Branch Manager'
        ]);
    }
}
