<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $super = Role::create(['name' => 'super_admin']);
        $loan_provider = Role::create(['name' => 'loan_provider']);
        $borrower = Role::create(['name' => 'borrower']);

        DB::table('users')->insert([
            'fname'=>'Super',
            'mname'=>'',
            'lname'=>'Admin',
            'email' => 'superadmin@agrabah.com',
            'password' => Hash::make('qweqwe'),
            'email_verified_at' => \Carbon\Carbon::now()->toDateString(),
        ]);

        DB::table('users')->insert([
            'fname'=>'Jerry',
            'mname'=>'',
            'lname'=>'Thompson',
            'email' => 'loanprovider@agrabah.com',
            'password' => Hash::make('qweqwe'),
            'email_verified_at' => \Carbon\Carbon::now()->toDateString(),
        ]);

        DB::table('users')->insert([
            'fname'=>'Albert',
            'mname'=>'',
            'lname'=>'Tiensi',
            'email' => 'borrower@agrabah.com',
            'password' => Hash::make('qweqwe'),
            'email_verified_at' => \Carbon\Carbon::now()->toDateString(),
        ]);



        $user1 = User::find(1);
        $user1->assignRole($super);

        $user2 = User::find(2);
        $user2->assignRole($loan_provider);

        $user3 = User::find(3);
        $user3->assignRole($borrower);



    }
}
