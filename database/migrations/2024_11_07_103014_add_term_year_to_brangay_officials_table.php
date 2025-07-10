<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('brangay_officials', function (Blueprint $table) {
            $table->integer('term_year')->nullable(); // Nullable field for term year
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brangay_officials', function (Blueprint $table) {
            $table->dropColumn('term_year'); // Remove term year column on rollback
        });
    }
};
