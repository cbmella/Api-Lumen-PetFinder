<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'location', 'photo_url', 'status', 'breed_id', 'age', 'personality', 'adoption_requirements', 'user_id'
    ];

    public function breed()
    {
        return $this->belongsTo(Breed::class, 'breed_id');
    }
}