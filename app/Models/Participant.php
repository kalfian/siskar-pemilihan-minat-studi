<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'status',
        'result'
    ];

    public function facts()
    {
        return $this->belongsToMany(Fact::class, 'participant_fact');
    }
}
