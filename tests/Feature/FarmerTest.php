<?php

namespace Tests\Feature;

use App\Farmer;
use App\Profile;
use App\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class FarmerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_farmer_create_screen_can_be_rendered()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $this->actingAs($user);
//        $user->assignRole(stringSlug('farmer'));
        $user->markEmailAsVerified();
        $response = $this->get('/farmer/profile/create');
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    public function test_save_farmer_profile()
    {
        $faker = Factory::create();
        $user = $this->post('loan-user-registration-store', [
            'email' => $faker->email,
            'password' => bcrypt($faker->password),
            'passkey' => 'password',
            'type' => 'farmer',
        ]);

        $response = $this->post('user-profile-store', [
            'id' => "1",
            'image' => $faker->image,
            'first_name' => $faker->firstName,
            'middle_name' => $faker->name,
            'dob' => Carbon::parse($faker->dateTime),
            'civil_status' => $faker->sentence,
            'gender' => "male",
            'education' => $faker->sentence,
            'tin' => $faker->randomNumber(7),
            'sss_gsis' => $faker->randomNumber(7),
            'landline' => $faker->randomNumber(7),
            'mobile' => $faker->phoneNumber,
            'secondary_info' => $faker->phoneNumber,
            'qr_image' => "test.png",
            'qr_image_path' => '/images/farmer/.1..png',
        ]);
        $response->assertStatus(302);
    }


//    public function test_disbursement_save()
//    {
//        $faker = Factory::create();
////        $user = $this->post('loan-user-registration-store', [
////            'email' => $faker->email,
////            'password' => bcrypt($faker->password),
////            'passkey' => 'password',
////            'type' => 'farmer',
////        ]);
//
//        $user = factory(User::class)->create([
//            'password' => bcrypt($password = 'i-love-laravel'),
//        ]);
//        $this->actingAs($user);
//        $user->markEmailAsVerified();
//
//
//
//        $arrtoSave=[];
//        $arrtoSave[0]="GCash";
//        $arrtoSave[1]="test";
//        $arrtoSave[2]="12132";
//
//        $user = [];
//        $user["id"] = $faker->randomNumber(2);
//        $user["account_id"] = $faker->randomNumber(4);
//        $user["url"] = $faker->url;
//        $user["user_id"] = $faker->randomNumber(3);
//        $user["community_leader"] = "0";
//        $user["created_at"] = $faker->date;
//        $user["updated_at"] = $faker->date;
//
//        $this->withoutExceptionHandling();
//        $response = $this->post('store-disbursement', [
//            "datas" => $arrtoSave,
//            "user" => $user,
//        ]);
////        dd($response);
//        $response->assertStatus(302);
//    }
}
