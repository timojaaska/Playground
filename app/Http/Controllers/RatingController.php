<?php

namespace App\Http\Controllers;

use App\Models\Rating; // käytetään Rating.php modelia
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([ // tarkistaa vastaako annettu arviointi vaatimuksia
            'rating' => 'required|integer|min:1|max:5', // arvosana pakollinen väliltä 1-5
            'comment' => 'nullable|string|max:800' // mahdollinen kommentti, tämän arvo saa olla myös null koska käyttäjää ei velvoiteta viestiä kirjoittamaan
        ]);

        Rating::create([ // tässä tallennetaan arviointi tietokantaan
            'playground_id' => $request->playgroundId, // leikkikentän id
            'rating' => $request->rating, // arviointi
            'comment' => $request->comment, // mahdollinen kommentti
        ]);

        return redirect('/playgrounds/'.$request->playgroundId)->with('rated', 'Kiitos arvostelusta'); // palautetaan käyttäjä viestin kera

    }
}
