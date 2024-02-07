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
        Schema::create('chain_location_mailing_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chain_location');
            $table->foreign('chain_location')->references('id')->on('chain_location');
            $table->unsignedBigInteger('mailing_list');
            $table->foreign('mailing_list')->references('id')->on('mailing_lists');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chain_location_mailing_list');
    }
};
