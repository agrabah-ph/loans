<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_provider_id')->nullable();
            $table->string('name');
            $table->integer('default_interest');
            $table->tinyInteger('default_terms');
            $table->timestamps();

            $table->foreign('loan_provider_id')
                ->references('id')
                ->on('loan_providers')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_types');
    }
}
