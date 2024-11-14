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
        Schema::create('squares', function (Blueprint $table) {
            $table->id();
            $table->integer('x');
            $table->integer('y');
            $table->integer('road_id')->default(0);
            $table->string('road_rules')->nullable();
            $table->integer('track_id')->default(0);
            $table->string('track_rules')->nullable();
            $table->enum('type', ["ground","water"])->default('ground');
            $table->foreignId('building_id')->nullable();
            $table->foreignId('city_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('squares');
    }
};
