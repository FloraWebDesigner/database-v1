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
        Schema::create('qr_code_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_code_id')->constrained('qr_codes')->onDelete('cascade');
            $table->string('scanned_url'); // Stores the URL at the time of scan
            $table->string('scanned_name'); // Stores the name at the time of scan
            $table->timestamp('scan_date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_code_logs');
    }
};
