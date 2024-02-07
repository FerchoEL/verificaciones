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
        Schema::create('supporting_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->string('electric_motor',5);
            $table->integer('horsepower');
            $table->integer('torque');
            $table->string('traction',5);
            $table->integer('capacity');
            $table->string('brake',5);
            $table->string('auxiliary',5);
            $table->string('camera',5);
            $table->string('regulator',5);
            $table->string('tape',5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supporting_features');
    }
};
