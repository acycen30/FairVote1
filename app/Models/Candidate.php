<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    // Specify the fillable attributes for mass assignment
    protected $fillable = ['name', 'party_affiliation', 'election_position'];
}
