<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 3/5/2021
 * Time: 11:03 PM
 */

namespace App\Services;


use App\Models\LoanProvider;
use App\Models\LoanProviderUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class LoanProviderService {
    public function createUser(User $user, $request) {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'lname' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

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
                        $loan_provider_user->loan_provider_id = $loan_provider->id;
                        $loan_provider_user->user_id = $user->id;
                        if($loan_provider_user->save()){
                            event(new Registered($user));
                        }
                    }
                }
            }
            DB::commit();
            return redirect(RouteServiceProvider::HOME);
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Oops. Something went wrong.');
        }
    }
}
