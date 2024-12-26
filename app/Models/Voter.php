<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    // Define the primary key for the model
    protected $primaryKey = 'voter_id';

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'voter_name',
        'date_of_birth',
        'gender',
        'contact_information',
    ];

    // Define the relationship with the Vote model
    public function votes()
    {
        return $this->hasMany(Vote::class, 'voter_id');
    }
}
