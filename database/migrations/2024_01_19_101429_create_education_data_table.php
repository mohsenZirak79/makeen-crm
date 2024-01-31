<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('education_data', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->unsignedBigInteger('user_data_id');
            $table->string('diploma');
            $table->json('associate_degree');
            $table->json('bachelor_degree');
            $table->json('master_degree');
            $table->timestamps();

            $table->foreign('user_data_id')->references('id')->on('user_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_data');
    }
};
