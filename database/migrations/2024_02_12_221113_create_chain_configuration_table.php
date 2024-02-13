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
        Schema::create('chain_configuration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chain_id');
            $table->foreign('chain_id')->references('id')->on('chains');
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
        Schema::dropIfExists('chain_configuration');
    }
};
