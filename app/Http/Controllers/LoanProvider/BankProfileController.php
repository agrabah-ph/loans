<?php

namespace App\Http\Controllers\LoanProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankProfileController extends Controller {
    public function index() {
        return view('loan_provider.profile.index');
    }
}
