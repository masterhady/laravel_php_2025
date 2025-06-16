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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // int, auto-incrementing primary key
            $table->timestamps(); // 2 columns: created_at and updated_at
            $table->string('name'); // string, not nullable
            $table->integer('salary')->nullable(); // integer, nullable
            $table->text('info')->nullable(); // text, nullable
            $table->string('courses')->nullable(); // string, nullable, for storing courses
            $table->string('photo')->nullable(); // string, nullable, for storing photo path
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
