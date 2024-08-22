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
        Schema::table('invitations', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('years')->nullable();

            $table->string('male_name')->nullable()->change();
            $table->string('female_name')->nullable()->change();
            $table->string('male_photo')->nullable()->change();
            $table->string('female_photo')->nullable()->change();
            $table->string('hash')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn(['name', 'years']);
        });
    }
};
