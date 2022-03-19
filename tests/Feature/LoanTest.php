<?php

namespace Tests\Feature;

use App\Farmer;
use App\Loan;
use App\LoanProduct;
use App\LoanProvider;
use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class LoanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_loan_process()
    {
        $faker = Factory::create();
        //register loan provider
        $createLoanProvider = [
            'type' => 'loan-provider',
            'email' => $faker->email,
            'password' => $faker->password,
            'repeat-password' => $faker->password,
        ];
        $response = $this->post(route('loan-user-registration-store'), $createLoanProvider);
        $response->assertStatus(302);
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
        $response->assertStatus(302);
        $response->assertRedirect('/home');
        //authenticate
        $this->assertAuthenticatedAs($user);

        //complete profile of loan provider
        $completeLoanProviderProfile = [
            "first_name" => $loanProviderFname = $faker->firstName,
            "middle_name" => $faker->lastName,
            "last_name" => $loanProviderLname = $faker->lastName,
            "bank_name" => "bpi",
            "branch_name" => "albay",
            "address_line" => $faker->address,
            "account_name" => $loanProviderFname . ' ' . $loanProviderLname,
            "account_number" => $faker->bankAccountNumber,
            "tin" => Str::random(6),
            "contact_person" => $loanProviderFname . ' ' . $loanProviderLname,
            "contact_number" => $faker->phoneNumber,
            "designation" => $faker->jobTitle,
            "acceptTerms" => "on",
        ];
        $response = $this->post('/loan-provider/profile/store', $completeLoanProviderProfile);
        $response->assertStatus(302);
        $response->assertRedirect('/home');

        //create a product loan
        $loanProductStore = [
            "name" => " test ",
            "type" => " 1 ",
            "description" => " 1244 ",
            "amount" => " 100.00 ",
            "duration" => " 2 ",
            "interest_rate" => " 10 ",
            "payment_schedule_input" => "[{ date : Aug 26, 2021 , amount : 55}, { date : Sep 26, 2021 , amount : 55}] ",
            "timing" => " monthly ",
            "allowance" => " 1 ",
            "first_allowance" => " 0 ",
            "disclosure" => $faker->paragraph,
        ];
        $response = $this->post(route('products.store'), $loanProductStore);
        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));

        $this->get('logout');
        $this->refreshApplication();


        $createFarmer = [
            'type' => 'farmer',
            'email' => $faker->email,
            'password' => $faker->password,
            'repeat-password' => $faker->password,
        ];
        $response = $this->post(route('loan-user-registration-store'), $createFarmer);
        $response->assertStatus(302);

        $userFarmer = factory(User::class)->create([
            'password' => bcrypt($password1 = 'i-love-laravels'),
        ]);
        $userFarmer->assignRole(stringSlug('farmer'));
        $userFarmer->markEmailAsVerified();

        $farmer = new Farmer();
        $farmer->account_id = $farmerAccountNumber = Str::random(6);
        $farmer->url = route('home', array('account' => $farmerAccountNumber));
        $farmer->user_id = $userFarmer->id;
        $farmer->save();

        //login as farmer
        $this->withoutExceptionHandling();
        $response = $this->post('/login', [
            'email' => $userFarmer->email,
            'password' => $password1,
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($userFarmer);


        //complete profile of farmer user
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


        $response = $this->post('/user-profile-store', $farmerProfile);
        $response->assertStatus(200);
        //apply for a loan product

        $loanProduct = LoanProduct::first();
//        $loanProduct = LoanProduct::where('loan_provider_id', $loanProvider->id)->first();
        $applyLoan = [
            "inputs" => [
                0 => $loanProduct->id,
                1 => [
                    0 => [
                        0 => "spouse_first_name",
                        1 => "First name",
                        2 => "asd",
                    ],
                    1 => [
                        0 => "spouse_middle_name",
                        1 => "Middle name",
                        2 => "asd",
                    ],
                    2 => [
                        0 => "spouse_last_name",
                        1 => "Last name",
                        2 => "asd",
                    ],
                    3 => [
                        0 => "spouse_date_of_birth",
                        1 => "Date of Birth",
                        2 => "01/07/2019",
                    ],
                    4 => [
                        0 => "spouse_civil_status",
                        1 => "Civil Status",
                        2 => "Single",
                    ],
                    5 => [
                        0 => "spouse_gender",
                        1 => "Gender",
                        2 => "Male",
                    ],
                    6 => [
                        0 => "spouse_land_line",
                        1 => "Land Line",
                        2 => "12",
                    ],
                    7 => [
                        0 => "spouse_mobile",
                        1 => "Mobile",
                        2 => "123",
                    ],
                    8 => [
                        0 => "spouse_tin",
                        1 => "Tin No.",
                        2 => "11",
                    ],
                    9 => [
                        0 => "spouse_sss_gsis",
                        1 => "SSS / GSIS No.",
                        2 => "11",
                    ],
                    10 => [
                        0 => "spouse_education",
                        1 => "Education",
                        2 => "High School",
                    ]
                ],
                2 => [
                    0 => [
                        0 => "farming_description",
                        1 => "Farming Description",
                        2 => "asd",
                    ],
                    1 => [
                        0 => "organization",
                        1 => "Organization",
                        2 => "asd",
                    ],
                    2 => [
                        0 => "four_ps",
                        1 => "4P's",
                        2 => "1",
                    ],
                    3 => [
                        0 => "pwd",
                        1 => "PWD",
                        2 => "1",
                    ],
                    4 => [
                        0 => "indigenous",
                        1 => "Indigenous",
                        2 => "0",
                    ],
                    5 => [
                        0 => "livelihood",
                        1 => "Livelihood",
                        2 => "0",
                    ],
                ],
                3 => [
                    0 => [
                        0 => "employment",
                        1 => "Employment",
                        2 => [
                            0 => "Employed",
                            1 => [
                                0 => "employment_employed",
                                1 => "Type",
                                2 => "Private",
                            ],
                            2 => [
                                0 => "employed_position",
                                1 => "Position",
                                2 => "Staff",
                            ],
                            3 => [
                                0 => "employer_contact_number",
                                1 => "Tel No.",
                                2 => "123",
                            ],
                            4 => [
                                0 => "employer_business_address",
                                1 => "Employer/Business Address",
                                2 => "asda",
                            ]
                        ]
                    ]
                ],
                4 => [
                    0 => [
                        0 => "applicant_business_income",
                        1 => "Applicant Business Income",
                        2 => "1",
                    ],
                    1 => [
                        0 => "applicant_employment_income",
                        1 => "Applicant Employment Income",
                        2 => "1",
                    ],
                    2 => [
                        0 => "spouse_business_income",
                        1 => "Spouse Business Income",
                        2 => "1",
                    ],
                    3 => [
                        0 => "spouse_employment_income",
                        1 => "Spouse Employment Income",
                        2 => "1"
                    ],
                    4 => [
                        0 => "other_monthly_income",
                        1 => "Other Monthly Income",
                        2 => "1",
                    ],
                    5 => [
                        0 => "other_source_income",
                        1 => "Other Source Income",
                        2 => "1",
                    ],
                    6 => [
                        0 => "monthly_expenses",
                        1 => "Less Monthly Expenses (Living, Utilitites, rental, transpo..)",
                        2 => "1",
                    ],
                    7 => [
                        0 => "other_expenses",
                        1 => "Other Expenses",
                        2 => "0",
                    ],
                    8 => [
                        0 => "assets",
                        1 => "Assets",
                        2 => null,
                    ],
                ],
                5 => [
                    0 => [
                        0 => "Purpose of Loan",
                        1 => [
                            0 => "Auto Financing",
                        ]
                    ],
                    1 => [
                        0 => "Place of use",
                        1 => [
                            0 => "Residential",
                        ]
                    ],
                    2 => [
                        0 => "Collateral",
                        1 => [
                            0 => "None"
                        ]
                    ]
                ],
                6 => [
                    0 => [
                        0 => "Bank Accounts",
                        1 => [
                            0 => [
                                0 => [
                                    0 => "Bank name",
                                    1 => "asd",
                                ],
                                1 => [
                                    0 => "Account No.",
                                    1 => "11",
                                ]
                            ]
                        ]
                    ],
                    1 => [
                        0 => "Credit References",
                        1 => [
                            0 => [
                                0 => [
                                    0 => "Bank / Financing",
                                    1 => "asd"
                                ],
                                1 => [
                                    0 => "Monthly Amortization",
                                    1 => "1"
                                ]
                            ]
                        ]
                    ]
                ],
                7 => [
                    0 => [
                        0 => "Trade and other reference",
                        1 => [
                            0 => [
                                0 => [
                                    0 => "Customer name / Co-maker",
                                    1 => "asd"
                                ],
                                1 => [
                                    0 => "Address",
                                    1 => "asd",
                                ],
                                2 => [
                                    0 => "Contact No.",
                                    1 => "1",
                                ]
                            ]
                        ]
                    ]
                ],
                8 => [
                    0 => [
                        0 => "Reference ID's / Documents",
                        1 => [
                            0 => [
                                0 => "Attachment #1",
                                1 => "",
                                2 => "C:\fakepath\index.gif",
                            ],
                            1 => [
                                0 => "Attachment #2",
                                1 => "",
                                2 => "C:\fakepath\index.gif",
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = $this->post('/loan-submit-form', $applyLoan);
        $response->assertStatus(200);

        $application = $farmer->loans->first();
        //Test Admin decline
        $response = $this->get('/loan-update-status?id=' . $application->id . '&action=decline');
        $response->assertStatus(200);
        //Test Admin Accept
        $response = $this->get('/loan-update-status?id=' . $application->id . '&action=accept');
        $response->assertStatus(200);

        $this->assertEquals($application->status, 'Pending');

        $this->get('logout');
        $this->refreshApplication();

        //login as loan provider again
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);

        $response = $this->get('/loan-update-status?id=' . $application->id . '&action=approve&amount=70%2C000.00&duration=7&interest_rate=91&timing=day&allowance=1&first_allowance=0&schedules%5B%5D=Jul%2029%2C%202021&schedules%5B%5D=Jul%2030%2C%202021&schedules%5B%5D=Jul%2031%2C%202021&schedules%5B%5D=Aug%201%2C%202021&schedules%5B%5D=Aug%202%2C%202021&schedules%5B%5D=Aug%203%2C%202021&schedules%5B%5D=Aug%204%2C%202021');
        $response->assertStatus(200);

        $application = Loan::find($application->id);
        $this->assertEquals($application->status, 'Active');
        $this->get('logout');


        $this->get('logout');
        $this->refreshApplication();

        //login as farmer again

        $response = $this->post('/login', [
            'email' => $userFarmer->email,
            'password' => $password1,
        ]);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($userFarmer);

        $schedules = $application->payment_schedules;

        foreach($schedules as $schedule){
            $payment = [
                "loan_id" => $application->id,
                "payment_method" => "gcash",
                "paid_amount" => $schedule->payable_amount,
                "paid_date" => $faker->date(),
                "reference_number" => $faker->sentence,
                "proof_of_payment" => UploadedFile::fake()->image('avatar.jpg')
            ];
            $this->post('/verify-loan', $payment);
        }
        $this->withoutExceptionHandling();
        $this->assertGreaterThan(0, count($application->payments));

        $application = Loan::find($application->id);
        $this->assertEquals($application->status, 'Completed');
    }
}
