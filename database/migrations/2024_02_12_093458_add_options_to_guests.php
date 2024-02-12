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
        Schema::table('guest', function (Blueprint $table) {
            $table->enum('menu_option', ['vegetarian', 'vegan', 'halal', 'regular'])->default('regular');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guest', function (Blueprint $table) {
            $table->dropColumn(['menu_option']);
        });
    }
};
