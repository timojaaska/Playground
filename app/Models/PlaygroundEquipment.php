<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaygroundEquipment extends Model
{
    use HasFactory;
    protected $table = 'playground_equipment';
    protected $fillable = [
        'playground_id', 'equipment_id', 'amount', // nämä piti laittaa fillableksi jotta laitteiden lisäys leikkikentän luonnin yhteydessä onnistuu
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
