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
        Schema::create('barangayproduct', function (Blueprint $table) {
            $table->id(); // Primary key, auto-incrementing
            $table->string('name'); // Name of the product
            $table->text('description')->nullable(); // Description of the product
            $table->string('image')->nullable(); // For storing image path, if applicable
            $table->text('media_path')->nullable(); // File path or URL for image or video
            $table->decimal('price', 8, 2)->default(0.00); // Price of the product
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangayproduct');
    }
};
