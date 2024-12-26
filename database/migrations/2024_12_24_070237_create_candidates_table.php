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
        Schema::create('candidates', function (Blueprint $table) {
            // Changing the ID column name to 'candidate_id'
            $table->id('candidate_id');
            
            // Changing the 'name' column to 'candidate_name'
            $table->string('candidate_name');
            
            // Retaining the original columns
            $table->string('party_affiliation');
            $table->string('election_position');
            
            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the candidates table
        Schema::dropIfExists('candidates');
    }
};
