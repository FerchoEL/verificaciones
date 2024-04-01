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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->index('date');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('idsap');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components');
            $table->string('chassis_serial',25)->nullable();
            $table->string('chassis_serial_origin',25)->nullable();
            $table->string('license_plate',25)->nullable();
            $table->index('license_plate');
            $table->string('license_plate_origin',25)->nullable();
            $table->string('license_plate_type',10)->nullable();
            $table->string('permission',10)->nullable();
            $table->string('license_plate_tractor',25)->nullable();
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->unsignedBigInteger('entity_id');
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->string('sticker_serial',25)->nullable();
            $table->index('sticker_serial');
            $table->unsignedBigInteger('car_brand');
            $table->foreign('car_brand')->references('id')->on('car_brands');
            $table->integer('car_model')->nullable();
            $table->tinyInteger('modification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
