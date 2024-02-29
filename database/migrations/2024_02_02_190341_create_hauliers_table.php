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
        Schema::create('hauliers', function (Blueprint $table) {
            $table->id();
            $table->string('name',145);
            $table->integer('idsap');
            $table->string('rfc',14)->nullable();
            $table->string('phone')->nullable();
            $table->string('email',145)->nullable();
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->string('city',45)->nullable();
            $table->string('street',45)->nullable();
            $table->string('address',45)->nullable();
            $table->string('cp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hauliers');
    }
};
