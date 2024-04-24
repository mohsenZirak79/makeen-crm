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
        Schema::create('global_education_major', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('global_education_degree_id');
            $table->text('title');

            $table->foreign('global_education_degree_id')->references('id')->on('global_education_degree');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_education_major');
    }
};
