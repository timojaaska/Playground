<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipments'; // määritetään taulun nimi manuaalisesti koska equipment on vähän hankala sana koska se on jo valmiiksi monikko muoto ja laravel olettaa että taulun nimen tulisi olla equipment ja voikin olla oikeassa mutta tehdään tämä nyt ainakin harjoituksen vuoksi näin
    protected $fillable = [ // fillable tekee kentän täytettäväksi
        'name',
    ];
}
