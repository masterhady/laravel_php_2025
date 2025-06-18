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

        // migrate 
        Schema::table('teachers', function (Blueprint $table) {
            // add forgin key refre to department table 
            // users --> user_id
            // teachers --> department_id
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade')->onUpdate('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { // refresh the migration
        Schema::table('teachers', function (Blueprint $table) {
            // 
            // drop foreign key and column
            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');
        });
    }
};
