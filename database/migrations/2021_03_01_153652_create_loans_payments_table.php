<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_profile_id')->nullable();
            $table->foreignId('loan_provider_id')->nullable();
            $table->foreignId('loan_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->tinyInteger('is_paid')->default(0);
            $table->timestamps();

            $table->foreign('user_profile_id')
                ->references('id')
                ->on('user_profiles')->nullOnDelete();

            $table->foreign('loan_provider_id')
                ->references('id')
                ->on('loan_providers')->nullOnDelete();

            $table->foreign('loan_id')
                ->references('id')
                ->on('loans')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans_payments');
    }
}
