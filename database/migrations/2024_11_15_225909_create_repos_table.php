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
            $table->integer('pull_requests')->default(0);
            $table->boolean('error_readme_exists')->default(0);
            $table->boolean('error_readme_contents')->default(0);
            $table->boolean('error_favicon_exists')->default(0);
            $table->boolean('error_gitignore_exists')->default(0);
            $table->boolean('error_gitignore_contents')->default(0);
            $table->boolean('error_protected')->default(0);
            $table->boolean('error_description')->default(0);
            $table->boolean('error_topics')->default(0);
            $table->text('error_comments')->nullable();
            $table->integer('error_count')->default(0);
            $table->timestamps();
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
