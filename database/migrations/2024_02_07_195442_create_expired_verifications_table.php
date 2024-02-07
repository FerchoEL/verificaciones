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
        Schema::create('expired_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('verification_id');
            $table->foreign('verification_id')->references('id')->on('verifications');
            $table->dateTime('expired_date');
            $table->foreign('expired_date')->references('next_date')->on('verifications');
            $table->Integer('license_plate');
            $table->foreign('license_plate')->references('license_plate')->on('verification_license_plates');
            $table->Integer('stricker_serial');
            $table->foreign('stricker_serial')->references('stricker_serial')->on('verification_license_plates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expired_verifications');
    }
};
