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
        Schema::create('factors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_installments_id')->nullable()->constrained('course_installments');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->unsignedBigInteger('total_amount');
            $table->unsignedBigInteger('amount_paid')->default(0);
            $table->enum('status', ['close', 'pending', 'paid', 'overdue'])->default('close');
            $table->date('du_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('factors', function (Blueprint $table) {
            $table->dropForeign('factors_course_installments_id_foreign');
            $table->dropForeign('factors_user_id_foreign');
        });
        Schema::dropIfExists('factors');
    }
};
