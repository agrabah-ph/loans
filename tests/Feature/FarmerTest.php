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

    public function test_apply_loan_product(){

        $faker = Factory::create();
        //Register Loan Provider
        $createLoanProvider = [
            'type' => 'loan-provider',
            'email' => $faker->email,
            'password' => $faker->password,
            'repeat-password' => $faker->password,
        ];

        $response = $this->post(route('loan-user-registration-store'), $createLoanProvider);
        $response->assertRedirect('/');

        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $user->assignRole(stringSlug('loan-provider'));
        $user->markEmailAsVerified();

        $loanProvider = new LoanProvider();
        $loanProvider->account_id = $masterFarmerAccountNumber = Str::random(6);
        $loanProvider->user_id = $user->id;
        $loanProvider->save();


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);


        $completeLoanProviderProfile = [
            "first_name" => $loanProviderFname = $faker->firstName,
            "middle_name" => $faker->lastName,
            "last_name" => $loanProviderLname = $faker->lastName,
            "bank_name" => "bpi",
            "branch_name" => "albay",
            "address_line" => $faker->address,
            "account_name" => $loanProviderFname . ' '. $loanProviderLname,
            "account_number" => $faker->bankAccountNumber,
            "tin" => Str::random(6),
            "contact_person" => $loanProviderFname . ' '. $loanProviderLname,
            "contact_number" => $faker->phoneNumber,
            "designation" => $faker->jobTitle,
            "acceptTerms" => "on",
        ];
        $response = $this->post('/loan-provider/profile/store', $completeLoanProviderProfile);
        $response->assertRedirect('/home');

        $loanProduct = LoanProduct::where('loan_provider_id', $loanProvider->id)->first();
        $applyLoan = [
            "inputs" => [
                0 => $loanProduct->id,
                1 => [
                    0 => [
                        0 => "Purpose of Loan",
                        1 => [
                            0 => "Auto Financing",
                            1 => "Housing",
                        ],
                    ],
                    1 => [
                        0 => "Primary User",
                        1 => [
                            0 => "124",
                        ],
                    ],
                    2 => [
                        0 => "Relationship to Applicant",
                        1 => [
                            0 => "124",
                        ],
                    ],
                    3 => [
                        0 => "Place of use",
                        1 => [
                            0 => "Residential",
                            1 => "Residential / Commercial",
                        ],
                    ],
                    4 => [
                        0 => "Collateral",
                        1 => [
                            0 => "Land Title: TCT No.",
                            1 => [
                                0 => "Agracultural",
                            ],
                        ],
                    ],
                ],
                2 => [
                    0 => [
                        0 => "Bank Accounts",
                        1 => [
                            0 => [
                                0 => [
                                    0 => "Account type",
                                    1 => "Savings",
                                ],
                                1 => [
                                    0 => "Account No.",
                                    1 => "211255",
                                ],
                            ],
                        ],
                    ],
                    1 => [
                        0 => "Credit References",
                        1 => [
                            0 => [
                                0 => [
                                    0 => "Bank / Financing",
                                    1 => "1wqeqwe",
                                ],
                                1 => [
                                    0 => "Monthly Amortization",
                                    1 => "12412424",
                                ],
                            ],
                        ],
                    ],
                ],
                3 => [
                    0 => [
                        0 => "Trade and other reference",
                        1 => [
                            0 => [
                                0 => [
                                    0 => "Customer name / Co-maker",
                                    1 => "4124",
                                ],
                                1 => [
                                    0 => "Address",
                                    1 => "124124124",
                                ],
                                2 => [
                                    0 => "Contact No.",
                                    1 => "124124",
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = $this->post('/loan-submit-form', $applyLoan);
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
