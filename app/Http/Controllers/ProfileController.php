<?php

namespace App\Http\Controllers;

use App\CommunityLeader;
use App\Farmer;
use App\LoanProvider;
use App\Profile;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function profileStore(Request $request)
    {
        $inputs = $request->input('forms');
//        $type = getRoleName('name');
        $type = 'farmer';
//        if($type === 'farmer'){
//            $userType = Farmer::find(Auth::user()->farmer->id);
//        }
//        if($type === 'community-leader'){
//            $userType = Farmer::find(Auth::user()->leader->id);
//        }
        $userType = Farmer::find(Auth::user()->farmer->id);
        $userType->url = route($type.'.show', array($type=>$userType));
        $userType->save();
        QrCode::size(500)
            ->format('png')
            ->generate($userType->url, public_path('images/'.$type.'/'.$userType->account_id.'.png'));

        if(is_null(Auth::user()->farmer->profile)){
            $profile = new Profile();
        }else{
            $profile = Profile::where('model_id', $userType->id)->where('model_type', 'App\Farmer')->first();
        }

        $profile->first_name = $inputs[0][1][2];
        $profile->middle_name = $inputs[0][2][2];
        $profile->last_name = $inputs[0][3][2];
        $profile->dob = Carbon::parse($inputs[0][4][2]);
        $profile->civil_status = $inputs[0][5][2];
        $profile->gender = $inputs[0][6][2];
        $profile->landline = $inputs[0][7][2];
        $profile->mobile = $inputs[0][8][2];
        $profile->tin = $inputs[0][9][2];
        $profile->sss_gsis = $inputs[0][10][2];
        $profile->education = $inputs[0][11][2];
        $profile->image = $inputs[0][0][2];
        $profile->secondary_info = serialize($inputs[1]);
        $profile->spouse_comaker_info = serialize($inputs[2]);
        $profile->farming_info = serialize($inputs[3]);
        $profile->employment_info = serialize($inputs[4]);
        $profile->income_asset_info = serialize($inputs[5]);

        $profile->qr_image = $userType->account_id.'.png';
        $profile->qr_image_path = '/images/'.$type.'/'.$userType->account_id.'.png';
        if($userType->profile()->save($profile)){
            $user = User::find($userType->user_id);
            $user->name = $profile->first_name.' '.$profile->last_name;
            $user->save();

            $url = route('home');
            return response()->json($url);
        }
    }

    public function myProfile()
    {
        $type = getRoleName('name');
        $profile = null;
        if($type === 'farmer'){
            $profile = Auth::user()->farmer->profile;
        }
        if($type === 'community-leader'){
            $profile = Auth::user()->leader->profile;
        }
        if($type === 'loan-provider'){
            $profile = Auth::user()->loan_provider->profile;
        }

//        return $profile;
        return view('layouts.show-profile', compact('profile'));
    }

    public function selectProfile(Request $request)
    {
        $id = $request->input('id');
        $data = Farmer::with('profile')->find($id);

        return response()->json($data);
    }

    public function getMyProfile(Request $request)
    {
        $type = getRoleName('name');
        $data = null;
        if($type === 'farmer'){
            $data = Farmer::with('profile')->find(Auth::user()->farmer->id);
        }
        if($type === 'community-leader'){
            $data = Farmer::with('profile')->find(Auth::user()->leader->id);
        }
        if($type === 'loan-provider'){
            $data = LoanProvider::with('profile')->find(Auth::user()->loan_provider->id);
        }

        return response()->json(array($type, $data));
    }

    public function editMyProfileUrl(Request $request)
    {
        $type = getRoleName('name');
        $data = null;
        if($type === 'farmer'){
//            $data = Farmer::with('profile')->find(Auth::user()->farmer->id);
        }
        if($type === 'community-leader'){
//            $data = Farmer::with('profile')->find(Auth::user()->leader->id);
        }
        if($type === 'loan-provider'){
            $data = route('profile-edit', array('id' => Auth::user()->loan_provider->account_id));
        }

        return response()->json($data);
    }

    public function editMyProfile(Request $request)
    {
        $type = getRoleName('name');
        $data = null;
        if($type === 'farmer'){
//            $data = Farmer::with('profile')->find(Auth::user()->farmer->id);
        }
        if($type === 'community-leader'){
//            $data = Farmer::with('profile')->find(Auth::user()->leader->id);
        }
        if($type === 'loan-provider'){
            $data = LoanProvider::with('profile')->find(Auth::user()->loan_provider->id);
        }

        return view('loan.loan-provider.profile.edit', compact('data'));
    }

    public function updateMyProfile(Request $request)
    {
        $type = getRoleName('name');
        $data = null;
        $forms = $request->input('forms');
        if($type === 'farmer'){
//            $data = Farmer::with('profile')->find(Auth::user()->farmer->id);
        }
        if($type === 'community-leader'){
//            $data = Farmer::with('profile')->find(Auth::user()->leader->id);
        }
        if($type === 'loan-provider'){
            $data = LoanProvider::with('profile')->find(Auth::user()->loan_provider->id);
            $profile = Profile::find($data->profile->id);
            $profile->first_name = $forms[4];
            $profile->middle_name = $forms[5];
            $profile->last_name = $forms[6];
            $profile->designation = $forms[7];
            $profile->mobile = $forms[8];
            $profile->landline = $forms[9];
            $profile->bank_name = $forms[0];
            $profile->branch_name = $forms[1];
            $profile->branch_code = $forms[2];
            $profile->branch_address = $forms[3];
            $profile->contact_person = $forms[10];
            $profile->contact_designation = $forms[11];
            $profile->contact_number = $forms[12];
            $profile->image = $forms[13];
            if($profile->save()){
                $user = User::find($data->user_id);
                $user->name = $profile->first_name.' '.$profile->last_name;
                $user->save();
            }

        }

        $url = route('my-profile');

        return response()->json($url);
    }
}
