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
        Schema::create('configuration_field', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')->references('id')->on('fields');
            $table->unsignedBigInteger('configuration_id');
            $table->foreign('configuration_id')->references('id')->on('configurations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuration_field');
    }
};
