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
            $table->string('price')->nullable()->after('serial_number');
            $table->string('contact')->nullable()->after('price');
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
