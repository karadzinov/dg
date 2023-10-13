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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('male_name');
            $table->string('female_name');
            $table->longText('male_text');
            $table->longText('female_text');
            $table->integer('template_number');
            $table->string('invitation_link');
            $table->string('male_photo');
            $table->string('female_photo');
            $table->string('group_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
