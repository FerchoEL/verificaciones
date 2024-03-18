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
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->dateTime('real_date');
            $table->dateTime('next_date');
            $table->index('next_date');
            $table->unsignedBigInteger('verification_type_id');
            $table->foreign('verification_type_id')->references('id')->on('type_verifications');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->unsignedBigInteger('chain_id');
            $table->foreign('chain_id')->references('id')->on('chains');
            $table->string('operator_name',45);
            $table->unsignedBigInteger('configuration_id')->nullable();
            $table->foreign('configuration_id')->references('id')->on('configurations')->onDelete('set null');
            $table->string('comentary',191);
            $table->index('comentary');
            $table->unsignedBigInteger('haulier_id');
            $table->foreign('haulier_id')->references('id')->on('hauliers');
            $table->unsignedBigInteger('status');
            $table->foreign('status')->references('id')->on('status_verifications');
            $table->string('device',45);
            $table->string('latitude',45);
            $table->string('longitude',45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');

    }
};
