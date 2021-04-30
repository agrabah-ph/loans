<?php

namespace App\Http\Controllers\LoanProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        $user = auth()->user();
        if ($user && $user->fname == null && $user->lname == null) {
            return redirect()->route('loan_provider.account_setup');
        } else {
            return view('dashboard');
        }
    }
}
