<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'playground_id', 'rating', 'comment',
    ];
    
    public function playground() //  lisätään suhde playground-tauluun
    {
        return $this->belongsTo(Playground::class);
    }
}
