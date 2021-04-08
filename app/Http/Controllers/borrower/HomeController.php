<?php

namespace App\Http\Controllers\borrower;

use App\Http\Controllers\Controller;
use App\Services\BorrowerService;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index(BorrowerService $borrower_srvc) {
        return view('dashboard');
        $simulate_request = new Request([
            'fname' => 'John Doe',
            'mname' => 'Doe',
            'lname' => 'Lucas'
        ]);

        return $borrower_srvc->store_borrower_data($simulate_request);
    }
}
