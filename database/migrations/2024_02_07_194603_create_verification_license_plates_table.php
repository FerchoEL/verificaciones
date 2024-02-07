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
        Schema::create('verification_license_plates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('verification_id');
            $table->foreign('verification_id')->references('id')->on('verifications');
            $table->unsignedBigInteger('unit_vehicle_id');
            $table->foreign('unit_vehicle_id')->references('vehicle_id')->on('units');
            $table->unsignedBigInteger('unit_component_id');
            $table->foreign('unit_component_id')->references('component_id')->on('units');
            $table->Integer('license_plate');
            $table->foreign('license_plate')->references('license_plate')->on('units');
            $table->Integer('stricker_serial');
            $table->foreign('stricker_serial')->references('stricker_serial')->on('units');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_license_plates');
    }
};
