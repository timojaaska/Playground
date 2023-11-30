<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playground extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'location',
        'src',
    ];

    public function ratings() // tässä määritellään suhde playgrounds ja ratings -taulujen välillä
    {
        return $this->hasMany(Rating::class);
    }

    public function equipments(): BelongsToMany // laitteita varten
    {
        return $this->belongsToMany(Equipment::class, 'playground_equipment')->withPivot('amount'); // lisätään mukaan kpl määrä komennolla ->withPivot('amount')
    }
}