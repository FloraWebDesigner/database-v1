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
            $table->boolean('road')->default(0);
            $table->text('road_rules')->nullable();
            $table->boolean('track')->default(0);
            $table->text('track_rules')->nullable();
            $table->enum('type', ["ground","water","road"])->default('ground');
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
