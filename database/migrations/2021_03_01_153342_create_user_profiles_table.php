<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('user_id')->nullable();
            $table->string('address_line');
            $table->string('city');
            $table->string('province');
            $table->string('region');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
