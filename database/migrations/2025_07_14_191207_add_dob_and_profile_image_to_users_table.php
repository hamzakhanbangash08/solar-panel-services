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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->date('dob')->nullable()->after('email'); // Date of Birth
            $table->string('profile_image')->nullable()->after('dob'); // Profile Image
            $table->string('phone')->nullable()->after('profile_image'); // Phone Number
            $table->string('address')->nullable()->after('phone'); // Address
            $table->string('city')->nullable()->after('address'); // City
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
