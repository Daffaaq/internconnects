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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->date('start_date'); // Tanggal mulai magang
            $table->date('end_date');   // Tanggal selesai magang
            $table->time('input_time');
            $table->timestamps();

            // Foreign Keys
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('internshiptemps_id');
            

            // Define Foreign Key Constraints
            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('internshiptemps_id')->references('id')->on('internship_temps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
};
