<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_provider_id')->nullable();
            $table->foreignId('loan_type_id')->nullable();
            $table->foreignId('user_profile_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            $table->foreign('loan_provider_id')
                ->references('id')
                ->on('loan_providers')->nullOnDelete();

            $table->foreign('loan_type_id')
                ->references('id')
                ->on('loan_types')->nullOnDelete();

            $table->foreign('user_profile_id')
                ->references('id')
                ->on('user_profiles')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
