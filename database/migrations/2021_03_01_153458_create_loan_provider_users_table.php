<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanProviderUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_provider_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_provider_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();

            $table->foreign('loan_provider_id')
                ->references('id')
                ->on('loan_providers')->cascadeOnDelete();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_provider_users');
    }
}
