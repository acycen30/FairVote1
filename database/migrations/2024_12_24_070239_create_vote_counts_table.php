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
        // Check if the table already exists before creating it
        if (!Schema::hasTable('vote_counts')) {
            Schema::create('vote_counts', function (Blueprint $table) {
                $table->id('vote_count_id'); // Custom primary key
                $table->unsignedBigInteger('candidate_id');
                $table->unsignedBigInteger('election_id'); // Assuming there's an Elections table
                $table->integer('vote_count')->default(0);
                $table->timestamps();

                // Foreign key constraints (assuming 'candidates' and 'elections' tables exist)
                $table->foreign('candidate_id')->references('candidate_id')->on('candidates')->onDelete('cascade');
                $table->foreign('election_id')->references('id')->on('elections')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if the table exists before dropping it
        if (Schema::hasTable('vote_counts')) {
            Schema::dropIfExists('vote_counts');
        }
    }
};
