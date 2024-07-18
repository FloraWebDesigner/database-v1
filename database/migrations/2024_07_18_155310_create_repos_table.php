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
        Schema::create('repos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner')->nullable();
            $table->text('readme')->nullable();
            $table->text('json')->nullable();
            $table->boolean('error_readme')->default(0);
            $table->boolean('error_favicon')->default(0);
            $table->boolean('error_gitignore')->default(0);
            $table->boolean('error_pages')->default(0);
            $table->boolean('error_protected')->default(0);
            $table->boolean('error_cdn')->default(0);
            $table->boolean('error_pull')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repos');
    }
};
