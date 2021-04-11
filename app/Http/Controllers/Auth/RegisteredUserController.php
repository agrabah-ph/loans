<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\LoanProvider;
use App\Models\LoanProviderUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
            return view('auth.register');
    }
 
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        if($user){
            $loan_provider_role = Role::where('name','loan_provider')->first();
            if($loan_provider_role){
                $user->assignRole($loan_provider_role);
                $loan_provider = new LoanProvider();
                $loan_provider->company_name = $request->company_name;
                $loan_provider->region = $request->company_name;
                $loan_provider->province = $request->province;
                $loan_provider->city = $request->city;
                $loan_provider->address_line = $request->address_line;
                if($loan_provider->save()){
                    $loan_provider_user = new LoanProviderUser();
                    $loan_provider_user->user_id = $user->id;
                    if($loan_provider_user->save()){
                        event(new Registered($user));

                        return redirect(RouteServiceProvider::HOME);
                    }
                }
            }

        }



    }
}
