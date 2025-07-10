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
        Schema::create('family_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('head_of_family'); // Head of the Family
            $table->string('sex');
            $table->integer('age');
            $table->date('birthdate');
            $table->string('civilstatus');
            $table->string('religion');
            $table->string('educAttainment');
            $table->string('occupation');
            $table->string('monthlyincome');
            $table->string('employment'); // Employment status
            $table->string('other_employment')->nullable(); // Optional field for other employment
            $table->string('typeOfDwelling');
            $table->string('watersource');
            $table->string('other_watersource')->nullable(); // Optional field for other water source
            $table->string('toiletFacility');
            $table->string('other_toiletFacility')->nullable(); // Optional field for other toilet facility
            $table->string('4ps'); // 4Ps Program
            $table->string('houseMember'); // Family members stored as JSON
            $table->boolean('is_approved')->default(false); // Approval status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_profiles');
    }
};
