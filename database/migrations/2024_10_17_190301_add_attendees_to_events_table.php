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
        Schema::table('events', function (Blueprint $table) {
            $table->json('attendees')->nullable()->after('location'); // Store the list of attendees as a JSON array
            $table->integer('expected_attendees')->nullable()->after('attendees'); // Store expected number of attendees
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('attendees');
            $table->dropColumn('expected_attendees');
        });
    }
};
