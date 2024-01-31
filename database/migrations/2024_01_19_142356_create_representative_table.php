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
        Schema::create('representative_data', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->unsignedBigInteger('user_data_id');
            $table->string('name');
            $table->string('acquaintance_duration');
            $table->string('relation');
            $table->string('info');
            $table->set('introduction_method',['instagram_makeen','instagram_friends','makeen_site','introducing_friends','telegram_channel','employment_site','other']);
            $table->timestamps();

            $table->foreign('user_data_id')->references('id')->on('user_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('representative_data', function (Blueprint $table) {
            $table->dropForeign('representative_data_user_data_id_foreign');
        });
        Schema::dropIfExists('representative');
    }
};
