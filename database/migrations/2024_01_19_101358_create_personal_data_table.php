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
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_data_id');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('religion');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->boolean('is_married');
            $table->integer('child_count');
            $table->set('mbti', ['INTJ', 'ENTJ', 'INFJ', 'ENFJ', 'ISTJ', 'ESTJ', 'ISFJ', 'ESFJ', 'ISTP', 'ESTP', 'ISFP', 'ESFP', 'INTP', 'ENTP', 'INFP', 'ENFP']);
            $table->string('parent_phone_number');
            $table->string('emergency_phone_number');
            $table->timestamps();

            $table->foreign('user_data_id')->references('id')->on('user_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};
