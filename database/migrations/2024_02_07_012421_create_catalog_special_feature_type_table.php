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
        Schema::create('catalog_special_feature_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catalog_special_feature_id');
            $table->foreign('catalog_special_feature_id')->references('id')->on('catalog_special_features');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_special_feature_type');
    }
};
