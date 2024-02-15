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
        Schema::create('mentor_data', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('work_address');
            $table->unsignedBigInteger('global_education_degree_id');
            $table->unsignedBigInteger('global_education_major_id');
            $table->string('representative');
            $table->string('skills');
            $table->string('work_experience');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('global_education_degree_id')->references('id')->on('global_education_degree');
            $table->foreign('global_education_major_id')->references('id')->on('global_education_major');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_data');
    }
};
