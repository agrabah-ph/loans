<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_providers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('facebook_url');
            $table->string('contact_person');
            $table->string('contact_number');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('region');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_providers');
    }
}
