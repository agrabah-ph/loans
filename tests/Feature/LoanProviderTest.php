<?php

namespace Tests\Feature;

use App\Http\Controllers\LoanProviderController;
use App\Http\Controllers\PublicController;
use App\LoanProvider;
use App\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Tests\TestCase;

class LoanProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithoutMiddleware;


    public function test_loan_products_create_can_be_rendered()
    {
        $this->test_save_loan_provider();
        $response = $this->get('/loan-provider-dashboard');
        $response->assertStatus(200);
    }

    public function test_loan_provider_dashboard_can_be_rendered()
    {
        $this->test_save_loan_provider();
        $response = $this->get('/loan-provider-dashboard');
        $response->assertStatus(200);
    }

    public function test_loan_provider_applicants_can_be_rendered()
    {
        $this->test_save_loan_provider();
        $response = $this->get('/loan/applicants');
        $response->assertStatus(200);
    }

    public function test_loan_provider_reports_can_be_rendered()
    {
        $this->test_save_loan_provider();
        $response = $this->get('/reports/loan');
        $response->assertStatus(200);
    }


    public function test_loan_product_edit_can_be_rendered()
    {
        $this->test_save_loan_provider();
        $response = $this->get(route('products.show',1));
        $response->assertStatus(200);
    }

    public function test_create_loan_product(){
        $faker = Factory::create();
        $this->test_save_loan_provider();
        $loanProductStore = [
            "name" => " test ",
            "type" => " 1 ",
            "description" => " 1244 ",
            "amount" => " 100.00 ",
            "duration" => " 2 ",
            "interest_rate" => "1",
            "payment_schedule_input" => "[{ date : Aug 26, 2021 , amount : 55}, { date : Sep 26, 2021 , amount : 55}] ",
            "timing" => " monthly ",
            "allowance" => " 1 ",
            "first_allowance" => " 0 ",
            "disclosure" => $faker->paragraph,
            "requirements" => $faker->paragraph,
            "attachment" => "test.pdf",
            "service_fee" => 0,
        ];

        $response = $this->post(route('products.store'), $loanProductStore);
        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));

    }


    public function test_save_loan_provider()
    {
        $faker = Factory::create();

        $request = Request::create('/store', 'POST', [
            'type' => 'loan-provider',
            'email' => $faker->email,
            'password' => "changeme",
            'repeat-password' => "changeme",
        ]);

        $user = new PublicController();
        $user->loanUserRegistrationStore($request);

        $this->withoutExceptionHandling();
        $response = $this->post('loan-provider/profile/store', [
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
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }
}
