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
            $table->string('family_code')->nullable()->after('positioninFamily');
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
