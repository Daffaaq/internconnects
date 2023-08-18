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
        Schema::create('categoryinterns', function (Blueprint $table) {
            $table->id();
            $table->string('3_months')->nullable(); // Kolom untuk 3 bulan
            $table->string('6_months')->nullable(); // Kolom untuk 6 bulan
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
        Schema::dropIfExists('categoryinterns');
    }
};
