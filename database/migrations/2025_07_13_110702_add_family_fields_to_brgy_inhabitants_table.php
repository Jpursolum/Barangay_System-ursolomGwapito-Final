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
    Schema::table('brgy_inhabitants', function (Blueprint $table) {
        $table->string('religion')->nullable();
        $table->string('monthlyincome')->nullable();
        $table->string('employment')->nullable();
        $table->string('other_employment')->nullable();
        $table->string('typeOfDwelling')->nullable();
        $table->string('watersource')->nullable();
        $table->string('other_watersource')->nullable();
        $table->string('toiletFacility')->nullable();
        $table->string('other_toiletFacility')->nullable();
        $table->string('4ps')->nullable();
        $table->json('houseMembers')->nullable()->after('positioninFamily');
        $table->string('extensionName')->nullable()->after('middlename'); // Jr., Sr., III, etc.
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brgy_inhabitants', function (Blueprint $table) {
            //
        });
    }
};
