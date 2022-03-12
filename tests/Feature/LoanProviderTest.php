<?php

namespace Tests\Feature;

use App\Http\Controllers\LoanProviderController;
use App\Http\Controllers\PublicController;
use App\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Tests\TestCase;

class LoanProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithoutMiddleware;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_save_loan_provider(){
        $faker = Factory::create();

        $request = Request::create('/store', 'POST',[
            'type'     =>  'loan-provider',
            'email'  =>  $faker->email,
            'password'  =>  "changeme",
            'repeat-password'  =>  "changeme",
        ]);

        $user = new PublicController();
        $user->loanUserRegistrationStore($request);


        $this->withoutExceptionHandling();
        $response = $this->post('loan-provider/profile/store', [
            'first_name' => $faker->firstName,
            'middle_name' => $faker->name,
            'last_name' => $faker->lastName,
            'designation' => $faker->sentence,
            'mobile' => $faker->phoneNumber,
            'landline' => $faker->phoneNumber,
            'bank_name' => $faker->randomNumber(8),
            'branch_name' => $faker->city,
            'branch_code' => $faker->city,
            'contact_person' => $faker->name,
            'contact_designation' => $faker->sentence,
            'contact_number' => $faker->sentence,
        ]);
        $response->assertStatus(302);
    }
}
