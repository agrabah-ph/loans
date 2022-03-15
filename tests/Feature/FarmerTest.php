<?php

namespace Tests\Feature;

use App\Farmer;
use App\Http\Controllers\PublicController;
use App\Loan;
use App\LoanProduct;
use App\LoanProvider;
use App\Profile;
use App\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        $userFarmer = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $userFarmer->assignRole(stringSlug('farmer'));
        $userFarmer->markEmailAsVerified();

        $farmer = new Farmer();
        $farmer->account_id = $farmerAccountNumber = Str::random(6);
        $farmer->url = route('home', array('account' => $farmerAccountNumber));
        $farmer->user_id = $userFarmer->id;
        $farmer->save();


        $response = $this->post('/login', [
            'email' => $userFarmer->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($userFarmer);

        $farmerProfile = [
            "forms" => [
                0 => [
                    0 => [
                        0 => "image",
                        1 => "Profile Picture",
                        2 => "test",
                    ],
                    1 => [
                        0 => "first_name",
                        1 => "First name",
                        2 => $faker->firstName,
                    ],
                    2 => [
                        0 => "middle_name",
                        1 => "Middle name",
                        2 => $faker->lastName,
                    ],
                    3 => [
                        0 => "last_name",
                        1 => "Last name",
                        2 => $faker->lastName,
                    ],
                    4 => [
                        0 => "dob",
                        1 => "Date of Birth",
                        2 => "01/27/2020",
                    ],
                    5 => [
                        0 => "civil_status",
                        1 => "Civil Status",
                        2 => "Single",
                    ],
                    6 => [
                        0 => "gender",
                        1 => "Gender",
                        2 => "Male",
                    ],
                    7 => [
                        0 => "education",
                        1 => "Education",
                        2 => "College",
                    ],
                    8 => [
                        0 => "tin",
                        1 => "Tin No.",
                        2 => "12421",
                    ],
                    9 => [
                        0 => "sss_gsis",
                        1 => "SSS / GSIS No.",
                        2 => "125125",
                    ],
                    10 => [
                        0 => "mobile",
                        1 => "Mobile",
                        2 => "09176402211",
                    ],
                    11 => [
                        0 => "landline",
                        1 => "Land Line",
                        2 => "09176402211",
                    ],
                ],
                1 => [
                    0 => [
                        0 => "address_current",
                        1 => "Current Address",
                        2 => "124",
                    ],
                    1 => [
                        0 => "address_year_stay",
                        1 => "Years of Stay",
                        2 => "2151",
                    ],
                    2 => [
                        0 => "address_status",
                        1 => "Address Status",
                        2 => "Owned (Mortgaged)",
                    ],
                    3 => [
                        0 => "dependents",
                        1 => "Dependents",
                        2 => null,
                    ],
                ],
            ]
        ];
        $this->withoutExceptionHandling();
        $response = $this->post('/user-profile-store', $farmerProfile);
        $response->assertStatus(200);
    }

}
