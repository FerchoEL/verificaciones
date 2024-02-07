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
        Schema::create('verification_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('verification_id');
            $table->foreign('verification_id')->references('id')->on('verifications');
            $table->string('comentary');
            $table->foreign('comentary')->references('comentary')->on('verifications');
            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')->references('id')->on('fields');
            $table->string('status',45);
            $table->string('fields_critically',15);
            $table->string('photo',120);
            $table->unsignedBigInteger('detail_id');
            $table->foreign('detail_id')->references('id')->on('detail_values');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_details');
    }
};
