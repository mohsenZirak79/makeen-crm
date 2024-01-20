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
        Schema::create('factors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_installments_id');
            $table->integer('total_amount');
            $table->integer('amount_paid');
            $table->set('status',['1','2']);
            $table->date('du_date');
            $table->timestamps();

            $table->foreign('course_installments_id')->references('id')->on('course_installments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factors');
    }
};
