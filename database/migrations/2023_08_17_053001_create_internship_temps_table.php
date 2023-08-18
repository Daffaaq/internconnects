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
        Schema::create('internship_temps', function (Blueprint $table) {
            $table->id();
            $table->string('internship_position');
            $table->timestamps();

            // Foreign Keys
            $table->unsignedBigInteger('category_id');

            // Define Foreign Key Constraints
            $table->foreign('category_id')->references('id')->on('categoryinterns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internship_temps');
    }
};
