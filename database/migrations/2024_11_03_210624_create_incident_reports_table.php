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
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->id();

            // Columns from the Basic Information section
            $table->dateTime('incident_datetime'); // For the Date & Time of Incident
            $table->string('location');            // Location of the incident
            $table->string('incident_type');       // Type of Incident (altercation, theft, etc.)
            $table->string('other_incident_type')->nullable(); // Specify Other Incident if needed

            // Columns from the Persons Involved section
            $table->json('persons_involved')->nullable(); // JSON array to store persons involved
            $table->boolean('is_resident')->default(false); // Residency status
            $table->json('witnesses')->nullable();         // JSON array to store witnesses

            // Columns from the Incident Description section
            $table->text('incident_details');  // Details of the incident
            $table->text('injuries_or_damages')->nullable(); // Injuries or damages

            // Columns from the Immediate Response section
            $table->text('actions_taken')->nullable();          // Actions taken during the incident
            $table->string('resolution_or_escalation');         // Resolution status

            $table->timestamps(); // Created at and Updated at timestamps
            $table->json('persons_involved')->nullable();
            $table->json('witnesses')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_reports');
    }
};
