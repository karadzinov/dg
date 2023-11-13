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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')->references('id')->on('albums')->cascadeOnDelete();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->cascadeOnDelete();
            $table->unsignedBigInteger('musician_id')->nullable();
            $table->foreign('musician_id')->references('id')->on('musicians')->cascadeOnDelete();
            $table->unsignedBigInteger('photographer_id')->nullable();
            $table->foreign('photographer_id')->references('id')->on('photographers')->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->string('youtube_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
