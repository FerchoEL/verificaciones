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
        Schema::create('feature_motor_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->string('electric_motor',5)->nullable();
            $table->integer('horsepower')->nullable();
            $table->integer('torque')->nullable();
            $table->string('traction',5)->nullable();
            $table->integer('capacity')->nullable();
            $table->string('auxiliary',5)->nullable();
            $table->string('regulator',5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_motor_units');
    }
};
