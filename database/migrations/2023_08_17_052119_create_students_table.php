<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();;
            $table->string('name');
            $table->string('address');
            $table->string('religion');
            $table->enum('gender', ['male', 'female']);
            $table->string('phone_number');
            $table->string('email')->unique();
            
            // Foreign Keys
            $table->unsignedBigInteger('education_id');
            $table->unsignedBigInteger('cv_id');
            $table->unsignedBigInteger('proposals_id');

            $table->timestamps();

            // Define Foreign Key Constraints
            $table->foreign('education_id')->references('id')->on('education');
            $table->foreign('cv_id')->references('id')->on('curriculumvitaes');
            $table->foreign('proposals_id')->references('id')->on('proposals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
