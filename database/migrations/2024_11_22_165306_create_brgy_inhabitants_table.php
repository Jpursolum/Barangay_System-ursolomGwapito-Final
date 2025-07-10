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
        Schema::create('brgy_inhabitants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('extensionName')->nullable(); // Added extension name
            $table->integer('age')->nullable(); // Updated to integer type for proper age handling
            $table->date('birthdate'); // Updated to a date type
            $table->string('placeofbirth');
            $table->string('sex');
            $table->string('civilstatus');
            $table->string('positioninFamily');
            $table->string('citizenship');
            $table->string('other_citizenship')->nullable(); // Added for 'Others' citizenship
            $table->string('educAttainment');
            $table->string('other_educationalAtt')->nullable(); // Added for 'Others' education
            $table->string('purok');
            $table->string('email');
            $table->string('occupation');
            $table->string('livestock')->nullable(); // Added for livestock
            $table->string('other_livestock')->nullable(); // Added for 'Others' livestock
            $table->string('ofw');
            $table->string('pwd');
            $table->boolean('registeredVoters')->default(false); // Updated to boolean
            $table->boolean('IPmember')->default(false); // Updated to boolean
            $table->boolean('is_approved')->default(false); // Added approval field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brgy_inhabitants');
    }
};
