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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->decimal('lat', 6, 4);
            $table->decimal('lng', 6, 4);
            $table->string('country');
            $table->string('iso2');
            $table->string('admin_name');
            $table->string('capital');
            $table->integer('population')->nullable();
            $table->integer('population_proper')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
