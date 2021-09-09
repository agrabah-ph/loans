<?php

use App\LoanPayment;
use App\LoanProvider;
use App\LoanType;
use App\Profile;
use App\Loan;
use App\Settings;
use App\User;
use App\Farmer;
use App\Inventory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use CreatvStudio\Itexmo\Facades\Itexmo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

if (!function_exists('emailNotification')) {
    function emailNotification($type, $id)
    {

    }
}

if (!function_exists('smsNotification')) {
    /**
     * @param $type
     * @param $id
     */
    function smsNotification($type, $id)
    {
        switch ($type){
            case 'loan-due':
                $arr = array();
                $recipients = array();
                $data = Loan::with('borrower', 'provider')->find($id);
                array_push($recipients, $data->borrower->profile->mobile);
                array_push($recipients, $data->provider->profile->mobile);
                array_push($recipients, mobileNumber('agrabah', null));
                array_push($arr, $data->due_info['amount']);
                array_push($arr, $data->due_info['date']);
                smsNotifMessage($type, $arr, $recipients);
                break;
            case 'new-loan-application-admin':
                $arr = array();
                $recipients = array();
                $data = Loan::find($id);
                $borrower = $data->borrower->profile->first_name.' '.$data->borrower->profile->last_name;
                $url = route('loan-applicant');
                array_push($arr, $borrower);
//                array_push($arr, $url);
                array_push($recipients, mobileNumber('agrabah', null));
                smsNotifMessage('new-loan-application', $arr, $recipients);
                break;
            case 'new-loan-application-provider':
                $arr = array();
                $recipients = array();
                $data = Loan::find($id);
                $borrower = $data->borrower->profile->first_name.' '.$data->borrower->profile->last_name;
                $url = route('loan-applicant');
                array_push($arr, $borrower);
//                array_push($arr, $url);
                array_push($recipients, mobileNumber('provider', $data->loan_provider_id));
                smsNotifMessage('new-loan-application', $arr, $recipients);
                break;
            case 'new-loan-application-borrower':
                $arr = array();
                $recipients = array();
                $data = Loan::find($id);
                $borrower = $data->borrower->profile->first_name.' '.$data->borrower->profile->last_name;
                $url = route('loan-applicant');
                array_push($arr, $borrower);
//                array_push($arr, $url);
                array_push($recipients, $data->borrower->profile->mobile);
                smsNotifMessage($type, $arr, $recipients);
                break;
            case 'loan-payment-posted':
                $arr = array();
                $recipients = array();
                $data = LoanPayment::find($id);
                $loanInfo = Loan::find($data->loan_id);
                $url = route('loan-applicant');
                array_push($arr, number_format($data->paid_amount, 2));
                array_push($arr, Carbon::parse($data->paid_date)->toFormattedDateString());
//                array_push($arr, $url);

                array_push($recipients, mobileNumber('provider', $loanInfo->loan_provider_id));
                array_push($recipients, mobileNumber('agrabah', null));
                smsNotifMessage($type, $arr, $recipients);
                break;
        }
    }
}

if (!function_exists('smsNotifMessage')) {
    function smsNotifMessage($type, $arr, $recipients)
    {
        $message = null;
        switch ($type){
            case 'loan-due':
                $message = 'Agrabah Loan reminder:
                Loan due amount of Php '.$arr[0].' on or before '.$arr[1].'.
                Thank you';
                break;
            case 'new-loan-application':
                $message = 'Agrabah Loan: new loan application created by, '.$arr[0];
                break;
            case 'new-loan-application-borrower':
                $message = 'Agrabah Loan: Congratulations! your loan application is now granted. Expect call or text from your loan provider';
                break;
            case 'loan-payment-posted':
                $message = 'Agrabah Loan: loan payment posted, PHP '.$arr[0].' made on '.$arr[1];
                break;
        }

        $smsSet = Settings::where('name', 'sms')->first();
        foreach ($recipients as $recipient) {
            Log::channel('sms_log')->info(
                'Type: ['.$type.']; 
                Recipient: '.$recipient.'; 
                Message: '. $message.';'
            );
            if($smsSet->is_active === 1){
                Itexmo::to($recipient)->content($message)->send();
            }
        }
    }
}

if (!function_exists('mobileNumber')) {
    function mobileNumber($recipient, $id)
    {
        $number = null;
        switch ($recipient){
            case 'agrabah':
                $data = Settings::where('name', 'agrabah-mobile-number')->first();
                $number = $data->value;
                break;
            case 'provider':
                $data = LoanProvider::find($id);
                $number = $data->profile->mobile;
                break;
            case 'borrower':

                break;
        }
        return $number;
    }
}

if (!function_exists('subdomain_title')) {
    function subdomain_title($case)
    {
        $subdomain = join('.', explode('.', $_SERVER['HTTP_HOST'], -2));

        switch($case){
            case 'ucfirst':
                $subdomain = ucfirst(config('app.name').' '.$subdomain);
                break;
            case 'ucwords':
                $subdomain = ucwords(config('app.name').' '.$subdomain);
                break;
            default:
                $subdomain = strtoupper(config('app.name').' '.$subdomain);
                break;
        }

        return $subdomain;
    }
}

if (!function_exists('subdomain_name')) {
    function subdomain_name()
    {
        $subdomain = join('.', explode('.', $_SERVER['HTTP_HOST'], -2));

        return $subdomain;
    }
}

if (!function_exists('subDomainPath')) {
    function subDomainPath($path)
    {
        $subdomain = join('.', explode('.', $_SERVER['HTTP_HOST'], -2));
        if(is_null(Auth::user())){

        }else{
            if(auth()->user()->hasRole('super-admin')){
                return 'admin.'.$path;
            }
        }

        return $subdomain.'.'.$path;
    }
}

if (!function_exists('farmerCount')) {
    function farmerCount($id)
    {
        $ids = Inventory::where('leader_id', $id)->distinct('farmer_id')->pluck('farmer_id')->toArray();
        $count = Farmer::whereIn('id', $ids)
            ->count();

//        $count = Farmer::where('master_id', $id)->count();

        return $count;
    }
}

if (!function_exists('productInvCount')) {
    function productInvCount($id)
    {
        if(auth()->user()->hasRole('super-admin')){
            $count = Inventory::where('product_id', $id)
                ->count();
        }else{
            $count = Inventory::where('product_id', $id)
                ->where('leader_id', Auth::user()->leader->id)
                ->count();
        }
        return $count;
    }
}

if (!function_exists('mobileMask')) {
    function mobileMask($string)
    {
        $string = substr_replace($string, '(', 0, 0);
        $string = substr_replace($string, ') ', 5, 0);
        $string = substr_replace($string, '-', 10, 0);

        return $string;
    }
}

if (!function_exists('contactMask')) {
    function contactMask($type, $data)
    {
        switch ($type){
            case 'mobile':
                $data = substr_replace($data, '(', 0, 0);
                $data = substr_replace($data, ') ', 5, 0);
                $data = substr_replace($data, '-', 10, 0);
                break;
        }

        return $data;
    }
}

if (!function_exists('stringSlug')) {
    function stringSlug($string)
    {
        $string = strtolower($string); // Replaces all spaces with hyphens.
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
        return $string;
    }
}

if (!function_exists('getRoleName')) {
    function getRoleName($data)
    {
        $info = null;
        switch($data){
            case 'name':
                $info = Auth::user()->roles->pluck('name');
                break;
            case 'display_name':
                $info = Auth::user()->roles->pluck('display_name');
                break;
        }
        $info =  substr($info, 2);
        $info =  substr($info, 0, -2);
        return $info;
    }
}

if (!function_exists('getRoleNameByID')) {
    function getRoleNameByID($id, $type)
    {
        $data = User::find($id);
        $info = null;
        switch($type){
            case 'name':
                $info = $data->roles->pluck('name');
                break;
            case 'display_name':
                $info = $data->roles->pluck('display_name');
                break;
        }
        $info =  substr($info, 2);
        $info =  substr($info, 0, -2);
        return $info;
    }
}

if (!function_exists('permissionTable')) {
    function permissionTable($tableName)
    {
        $data = Permission::where('table_name', $tableName)->get();

        return $data;
    }
}

if (!function_exists('authProfilePic')) {
    function authProfilePic($id)
    {
        $data = '/img/blank-profile.jpg';

        $profile = Profile::where('user_id', $id)->first();

        if(!empty($profile)){
            if($profile->image !== null){
                $data = $profile->image;
            }
        }


        return $data;
    }
}

if (!function_exists('computeAmortization')) {
    function computeAmortization($amount, $terms, $interest, $decimal = 2)
    {
        $interest = $amount * ($interest/100);
        $amount = $amount + $interest;
        $amor = $amount / $terms;
        $amor = preg_replace('/,/', '',number_format($amor, 2));
        $amor = floatval($amor);
        return $amor;
    }
}

if (!function_exists('computeTotalLoan')) {
    function computeTotalLoan($amount, $terms, $interest, $decimal = 2)
    {
        $interest = $amount * ($interest/100);
        $amount = $amount + $interest;
        $amount = preg_replace('/,/', '',number_format($amount, 2));
        $amount = floatval($amount);
        return $amount;
    }
}

if (!function_exists('currency_format')) {
    function currency_format($amount, $decimal = 2)
    {
        return number_format($amount, $decimal);
    }
}

if (!function_exists('settings')) {
    function settings($setting)
    {
        $settingQuery =  DB::table('settings')->where('name', $setting)->first();
        if($settingQuery){
            return $settingQuery->value;
        }
    }
}

if (!function_exists('loanStatInfo')) {
    function loanStatInfo($provider_id)
    {
        $data = array();
        $loanType = LoanType::withCount([
            'product as product_count' => function ($query) use ($provider_id) {
                $query->where('loan_provider_id', $provider_id);
            }])
            ->with(array('product' => function($query) use ($provider_id) {
                $query->where('loan_provider_id', $provider_id);
            }))
            ->get();
        foreach ($loanType as $type){
            $typeArray = array();
            $pending = 0;
            $active = 0;
            $completed = 0;
            $declined = 0;
            foreach ($type->product as $product){
                foreach ($product->loan as $loan){
                    if($loan->accept === 1){
                        switch ($loan->status) {
                            case 'Pending':
                                $pending += 1;
                                break;
                            case 'Active':
                                $active += 1;
                                break;
                            case 'Completed':
                                $completed += 1;
                                break;
                            case 'Declined':
                                $declined += 1;
                                break;
                        }
                    }
                }
            }
            array_push($typeArray, array($type->display_name, $type->product_count), $pending, $active, $completed, $declined);
            array_push($data, $typeArray);
        }
//        dd($data);
        return $data;
    }
}

if (!function_exists('isCommunityLeader')) {
    function isCommunityLeader()
    {
        $isCommunityLeader = false;
        if(auth()->user()->farmer){
            if(auth()->user()->farmer->community_leader){
                $isCommunityLeader = true;
            }
        }
        return $isCommunityLeader;
    }
}

if (!function_exists('getUserSpotMarketCartCount')) {
    function getUserSpotMarketCartCount()
    {
        return \App\SpotMarketCart::where('user_id', auth()->user()->id)->sum('quantity');
    }
}

if (!function_exists('getSpotMarketOrderStatus')) {
    function getSpotMarketOrderStatus($orderNumber)
    {
        return \App\SpotMarketOrderStatus::where('spot_market_orders', $orderNumber)->where('is_current', 1)->first();
    }
}

if (!function_exists('getSpotMarketOrderStatuses')) {
    function getSpotMarketOrderStatuses($orderNumber)
    {
        return \App\SpotMarketOrderStatus::where('spot_market_orders', $orderNumber)->pluck('is_current', 'status')->toArray();
    }
}

if (!function_exists('base64ImageToFile')) {
    function base64ImageToFile($image)
    {
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = Str::random(30).'.'.'png';

        $dir = 'temp-images/';
        $path = '/public/'.$dir.''.$image_name;
        Storage::put($path, $image);

        return public_path('storage/'.$dir.''.$image_name);
    }
}

