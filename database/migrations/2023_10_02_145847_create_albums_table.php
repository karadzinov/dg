<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->cascadeOnDelete();
            $table->unsignedBigInteger('musician_id')->nullable();
            $table->foreign('musician_id')->references('id')->on('musicians')->cascadeOnDelete();
            $table->unsignedBigInteger('photographer_id')->nullable();
            $table->foreign('photographer_id')->references('id')->on('photographers')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
