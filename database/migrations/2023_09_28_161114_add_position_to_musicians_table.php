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
        Schema::table('musicians', function (Blueprint $table) {
            $table->double('lat',20,10)->nullable();
            $table->double('lng',20,10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('musicians', function (Blueprint $table) {
            $table->dropColumn('lat', 'lng');
        });
    }
};
