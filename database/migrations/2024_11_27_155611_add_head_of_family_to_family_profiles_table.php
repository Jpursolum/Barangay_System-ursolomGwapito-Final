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
        Schema::table('family_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('head_of_family')->nullable()->after('user_id');
            $table->foreign('head_of_family')->references('id')->on('brgy_inhabitants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('family_profiles', function (Blueprint $table) {
            $table->dropForeign(['head_of_family']);
            $table->dropColumn('head_of_family');
        });
    }
};
