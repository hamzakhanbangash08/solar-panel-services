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
        Schema::table('panels', function (Blueprint $table) {
            //
            $table->string('name')->nullable()->after('id');
            $table->string('image')->nullable()->after('name');
            $table->string('company')->nullable()->after('image');
            $table->string('installation_date')->nullable()->after('serial_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('panels', function (Blueprint $table) {
            //
        });
    }
};
