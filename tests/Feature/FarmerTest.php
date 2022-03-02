<?php

namespace Tests\Feature;

use App\Farmer;
use App\Profile;
use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $this->actingAs($user);

        $farmer = new Farmer();
        $farmer->account_id = $masterFarmerAccountNumber = Str::random(6);
        $farmer->user_id = $user->id;
        $farmer->url = 'http://agrabah-marketplace.test/farmer/1';
        $farmer->community_leader = 1;
        $farmer->save();


        $faker = Factory::create();

        $profile = new Profile();
        $profile->first_name = $faker->firstName;
        $profile->middle_name = $faker->lastName;
        $profile->last_name = $faker->lastName;
        $profile->mobile = $faker->phoneNumber;
        $profile->address = $faker->address;
        $profile->education = $faker->sentence;
        $profile->four_ps = $faker->sentence;
        $profile->pwd = $faker->word(1);
        $profile->indigenous = "0";
        $profile->livelihood = "0";
        $profile->farm_lot = $faker->sentence;
        $profile->farming_since = $faker->sentence;
        $profile->organization = $faker->sentence;
        $profile->qr_image = $faker->name.'.png';
        $profile->qr_image_path = '/images/farmer/'.$farmer->account_id.'.png';
        $farmer->profile()->save($profile);
    }
}
