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
        Schema::create('update_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->string('old_user',75);
            $table->unsignedBigInteger('new_user');
            $table->foreign('new_user')->references('user_id')->on('units');
            $table->dateTime('old_date');
            $table->dateTime('new_date');
            $table->foreign('new_date')->references('date')->on('units');
            $table->integer('old_license_plate');
            $table->Integer('new_license_plate');
            $table->foreign('new_license_plate')->references('license_plate')->on('units');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_units');
    }
};
