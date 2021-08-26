<?php

namespace App\Http\Controllers;

use App\Farmer;
use App\Inventory;
use App\Loan;
use App\LoanProvider;
use App\LoanType;
use App\Trace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        if(auth()->user()->hasRole('community-leader')){
//            $inventory = Inventory::where('leader_id', Auth::user()->leader->account_id)->count();
//            $trace = Trace::where('user_id', Auth::user()->id)->count();
//            $farmer = Inventory::where('leader_id', Auth::user()->leader->account_id)->distinct('farmer_id')->count('farmer_id');
//            return view('loan.dashboard', compact( 'inventory', 'trace', 'farmer'));
//        }

        if(auth()->user()->hasRole('loan-provider')){

            $loanType = LoanType::withCount([
                'product as product_count' => function ($query) {
                    $query->where('loan_provider_id', Auth::user()->loan_provider->id);
                }])
                ->with(array('product' => function($query) {
                    $query->where('loan_provider_id', Auth::user()->loan_provider->id);
                }))
                ->get();

//            return $loanType;

            return view('loan.loan-provider.dashboard', compact('loanType'));
        }

        if( (auth()->user()->hasRole('farmer')) || (auth()->user()->hasRole('community-leader')) ){
            $farmer = Farmer::find(Auth::user()->farmer->id);
            $loans = $farmer->loans;

//            return $loans;
            return view('loan.farmer.dashboard', compact('loans'));
        }

    }

    public function loanProviderDashboard()
    {
        $loanProviderId = Auth::user()->loan_provider->id;
        $now = Carbon::now();

        $approveLoanThisWeek = Loan::where('loan_provider_id', $loanProviderId)
            ->whereBetween('start_date', [
                $now->copy()->startOfWeek()->toDateTimeString(),
                $now->copy()->endOfWeek()->toDateTimeString()
            ])
            ->where('accept', 1)
            ->count();

        $pending = Loan::where('loan_provider_id', $loanProviderId)
            ->where('status', 'Pending')
            ->where('accept', 1)
            ->count();
        $active = Loan::where('loan_provider_id', $loanProviderId)
            ->where('status', 'Active')
            ->where('accept', 1)
            ->count();
        $completed = Loan::where('loan_provider_id', $loanProviderId)
            ->where('status', 'Completed')
            ->where('accept', 1)
            ->count();
        $declined = Loan::where('loan_provider_id', $loanProviderId)
            ->where('status', 'Declined')
            ->where('accept', 1)
            ->count();
        $cancelled = Loan::where('loan_provider_id', $loanProviderId)
            ->where('status', 'Cancelled')
            ->where('accept', 1)
            ->count();

        return response()->json(array($approveLoanThisWeek, $pending, $active, $completed, $declined, $cancelled));
    }
}
