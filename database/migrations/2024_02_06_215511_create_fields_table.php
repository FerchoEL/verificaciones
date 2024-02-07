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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('category',70);
            $table->string('subcategory',160);
            $table->string('field',255);
            $table->string('type',15);
            $table->string('NOM',10);
            $table->string('information',45)->nullable();
            $table->string('critically',15);
            $table->string('system_type',30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
