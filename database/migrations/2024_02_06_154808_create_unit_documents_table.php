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
        Schema::create('unit_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->string('unit_photo',100)->nullable();
            $table->string('image_cer_FM',100)->nullable();
            $table->date('validity_cer_FM')->nullable();
            $table->string('image_pol_seg',100)->nullable();
            $table->date('validity_pol_seg')->nullable();
            $table->string('image_cer_nem',100)->nullable();
            $table->date('validity_cer_nem')->nullable();
            $table->string('image_mtto',100)->nullable();
            $table->date('validity_mtto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_documents');
    }
};
