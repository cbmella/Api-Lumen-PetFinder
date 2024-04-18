<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public $timestamps = false;
    
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'breed_id');
    }
}
