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
        Schema::create('component_configuration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('configuration_id');
            $table->foreign('configuration_id')->references('id')->on('configurations');
            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components');
            $table->integer('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_configuration');
    }
};
