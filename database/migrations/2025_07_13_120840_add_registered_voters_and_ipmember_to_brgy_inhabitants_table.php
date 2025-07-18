<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brgy_inhabitants', function (Blueprint $table) {
            $table->string('registeredVoters')->default('No')->after('pwd');
            $table->string('IPmember')->default('No')->after('registeredVoters');
        });
    }

    public function down(): void
    {
        Schema::table('brgy_inhabitants', function (Blueprint $table) {
            $table->dropColumn('registeredVoters');
            $table->dropColumn('IPmember');
        });
    }
};
