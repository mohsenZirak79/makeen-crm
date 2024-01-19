<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('foreign_languages_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_data_id');
            $table->set('languages_name', ['english', 'french', 'german', 'spanish', 'turkey']);
            $table->set('read', ['beginner', 'intermediate', 'advanced', 'best']);
            $table->set('write', ['beginner', 'intermediate', 'advanced', 'best']);
            $table->set('conversation', ['beginner', 'intermediate', 'advanced', 'best']);
            $table->set('comprehension', ['beginner', 'intermediate', 'advanced', 'best']);
            $table->text('description');
            $table->timestamps();

            $table->foreign('user_data_id')->references('id')->on('user_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_languages_data');
    }
};
