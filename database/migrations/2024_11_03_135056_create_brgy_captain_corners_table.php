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
        Schema::create('brgy_captain_corners', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Name of the chairperson
            $table->text('message');         // Chairperson's message
            $table->string('image')->nullable();     // Image of the chairperson
            $table->string('video_link')->nullable(); // Optional video link for a message
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brgy_captain_corners');
    }
};
