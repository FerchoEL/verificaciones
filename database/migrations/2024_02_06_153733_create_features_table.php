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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->string('axis_one',45);
            $table->string('axis_two',45);
            $table->string('axis_three',45)->nullable();
            $table->string('brake',5)->nullable();
            $table->string('suspension',10)->nullable();
            $table->string('camera',5)->nullable();
            $table->string('tape',5)->nullable();
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->float('length')->nullable();
            $table->float('weight')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
