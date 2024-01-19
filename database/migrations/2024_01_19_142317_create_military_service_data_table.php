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
        Schema::create('military_service_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_data_id');
            $table->set('service_status',['1','2']);
            $table->string('service_address');
            $table->timestamps();

            $table->foreign('user_data_id')->references('id')->on('user_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('military_service_data');
    }
};
