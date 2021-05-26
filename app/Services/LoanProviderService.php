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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class LoanProviderService {
    public function createUser(Request $request, $user_data) {
        try {
             DB::beginTransaction();

            $user = $user_data;
            if($user) {
                $user->fname = $request->fname;
                $user->mname = $request->mname;
                $user->lname = $request->lname;
                if ($user->save()) {
                    $loan_provider_role = Role::where('name','loan_provider')->first();
                    if($loan_provider_role){
                        $user->assignRole($loan_provider_role);
                        $loan_provider = new LoanProvider();
                        $loan_provider->bank_name = $request->bank_name;
                        $loan_provider->branch_name = $request->branch_name;
                        $loan_provider->address_line = $request->address_line;
                        $loan_provider->account_name = $request->account_name;
                        $loan_provider->account_number = $request->account_number;
                        $loan_provider->tin = $request->tin;
                        $loan_provider->contact_person = $request->contact_person;
                        $loan_provider->contact_number = $request->contact_number;
                        $loan_provider->designation = $request->designation;

                        if($loan_provider->save()){
                            $loan_provider_user = new LoanProviderUser();
                            $loan_provider_user->loan_provider_id = $loan_provider->id;
                            $loan_provider_user->user_id = $user->id;
                        }
                    }
                }
            }
             DB::commit();
            return true;
        } catch(\Exception $e) {
             DB::rollBack();
            return false;
        }
    }
}
