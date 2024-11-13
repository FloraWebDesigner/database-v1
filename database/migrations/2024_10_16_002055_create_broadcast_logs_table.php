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
        Schema::create('broadcast_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('segment_id')->constrained('segments');
            $table->datetime('broadcast_time')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broadcast_logs');
    }
};
