<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FinanceRegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_farmer_registration()
    {
        $faker = Factory::create();
        $response = $this->post('loan-user-registration-store', [
            'email' => $faker->email,
            'password' => bcrypt($faker->password),
            'passkey' => 'password',
            'type' => 'farmer',
        ]);
        $this->withoutExceptionHandling();
        $response->assertRedirect('/');
    }

//    public function test_farmer_profile_create_registration()
//    {
//        $faker = Factory::create();
//
//
//        $user = factory(User::class)->create();
//        $this->actingAs($user);
//
//
//        $formArr = [];
//
//        $imgArr=[];
//        $imgArr[0]="image";
//        $imgArr[1]="Profile Picture";
//        $imgArr[2]="iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAIAAADTED8xAAADMElEQVR4nOzVwQnAIBQFQYXff81RUkQCOyDj1YOPnbXWPmeTRef+/3O/OyBjzh3CD95BfqICMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMK0CMO0TAAD//2Anhf4QtqobAAAAAElFTkSuQmCC";
//
//
//        $fname=[];
//        $fname[0]="first_name";
//        $fname[1]="First name";
//        $fname[2]=$faker->name;
//
//        $mname=[];
//        $mname[0]="middle_name";
//        $mname[1]="Middle name";
//        $mname[2]=$faker->name;
//
//        $lname=[];
//        $lname[0]="last_name";
//        $lname[1]="Last  name";
//        $lname[2]=$faker->name;
//
//        $dob=[];
//        $dob[0]="dob";
//        $dob[1]="Date of Birth";
//        $dob[2]=$faker->date;
//
//        $cStatus=[];
//        $cStatus[0]="civil_status";
//        $cStatus[1]="Civil Status";
//        $cStatus[2]="Single";
//
//        $gender=[];
//        $gender[0]="gender";
//        $gender[1]="Gender";
//        $gender[2]="Male";
//
//        $educ=[];
//        $educ[0]="education";
//        $educ[1]="Education";
//        $educ[2]="College";
//
//        $tin=[];
//        $tin[0]="tin";
//        $tin[1]="Tin No.";
//        $tin[2]=$faker->randomNumber();
//
//        $sss_gsis=[];
//        $sss_gsis[0]="sss_gsis";
//        $sss_gsis[1]="SSS / GSIS No.";
//        $sss_gsis[2]=$faker->randomNumber();
//
//
//        $mobile=[];
//        $mobile[0]="mobile";
//        $mobile[1]="Mobile";
//        $mobile[2]=$faker->randomNumber();
//
//        $landline=[];
//        $landline[0]="land-line";
//        $landline[1]="Land Line";
//        $landline[2]=$faker->randomNumber();
//
//
//        $address=[];
//        $address[0]="address_current";
//        $address[1]="Current Address";
//        $address[2]=$faker->address;
//
//        $yrsStay=[];
//        $yrsStay[0]="address_year_stay";
//        $yrsStay[1]="Years of Stay";
//        $yrsStay[2]=$faker->randomNumber(1);
//
//
//        $address_status=[];
//        $address_status[0]="address_status";
//        $address_status[1]="Address Status";
//        $address_status[2]="Owned (Mortgaged)";
//
//        $dep=[];
//        $dep[0]="dependents";
//        $dep[1]="Dependents";
//        $dep[2]=null;
//
//        $formArr[0][0] =$imgArr;
//        $formArr[0][1] =$fname;
//        $formArr[0][2] =$lname;
//        $formArr[0][3] =$mname;
//        $formArr[0][4] =$dob;
//        $formArr[0][5] =$cStatus;
//        $formArr[0][6] =$gender;
//        $formArr[0][7] =$educ;
//        $formArr[0][8] =$tin;
//        $formArr[0][9] =$sss_gsis;
//        $formArr[0][10] =$mobile;
//        $formArr[0][11] =$landline;
//        $formArr[1][0] = $address;
//        $formArr[1][1] = $yrsStay;
//        $formArr[1][2] = $address_status;
//        $formArr[1][3] = $dep;
//
//        $response = $this->post('user-profile-store', [
//            "forms" => $formArr
//        ]);
//        dd($response);
//        $this->withoutExceptionHandling();
//        $response->assertRedirect('/');
//    }
}
