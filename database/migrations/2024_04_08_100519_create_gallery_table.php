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
        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->foreign('profile_id')->references('id')->on('profile');
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->unsignedBigInteger('photographer_id')->nullable();
            $table->foreign('photographer_id')->references('id')->on('photographers');
            $table->unsignedBigInteger('musician_id')->nullable();
            $table->foreign('musician_id')->references('id')->on('musicians');
            $table->bigInteger('position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery');
    }
};
