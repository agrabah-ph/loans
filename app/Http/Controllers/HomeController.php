<?php

namespace App\Http\Controllers;

use App\Farmer;
use App\Inventory;
use App\Loan;
use App\LoanPayment;
use App\LoanProvider;
use App\LoanType;
use App\Trace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $now = Carbon::now();
            $counts = array();
            $newLoan = Loan::where('accept', 1)->where('status', 'Active')
                ->where('loan_provider_id', Auth::user()->loan_provider->id)
                ->count();
            $declined = Loan::where('accept', 1)->where('status', 'Declined')
                ->where('loan_provider_id', Auth::user()->loan_provider->id)
                ->count();
            $loansWeek = Loan::where('accept', 1)
                ->where('loan_provider_id', Auth::user()->loan_provider->id)
                ->where('status', 'Active')->whereBetween('created_at', [
                    $now->copy()->startOfWeek()->toDateTimeString(),
                    $now->copy()->endOfWeek()->toDateTimeString()
                ])
                ->count();

            array_push($counts, $newLoan);
            array_push($counts, $loansWeek);
            array_push($counts, $declined);
//            return $counts;
            return view('loan.loan-provider.dashboard', compact('loanType', 'counts'));
        }

        if( (auth()->user()->hasRole('farmer')) || (auth()->user()->hasRole('community-leader')) ){
            $farmer = Farmer::find(Auth::user()->farmer->id);
            $loans = $farmer->loans;

            $loanId = array();
            foreach ($loans as $loan){
                array_push($loanId, $loan->id);
            }

            $payments = LoanPayment::whereIn('loan_id', $loanId)
                ->get()
                ->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->diffForHumans(); // grouping by years
                });

//            return $loans->where('status', 'Active')->count();

            return view('loan.farmer.dashboard', compact('loans', 'payments'));
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
