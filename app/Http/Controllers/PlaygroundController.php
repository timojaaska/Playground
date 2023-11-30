<?php

namespace App\Http\Controllers;

use App\Models\Playground;
use App\Models\Equipment;
use App\Models\PlaygroundEquipment;
use Illuminate\Http\Request;

class PlaygroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Playground::all();
        $data = Playground::with('equipments', 'ratings')->get();
        
        // lasketaan leikkikentille keskiarvosana jotta ne voidaan järjestää sen mukaan
        foreach ($data as $playground) {
            $averageRating = $playground->ratings->avg('rating');
            $playground->averageRating = number_format($averageRating, 1);
        }
        
        $data = $data->sortByDesc('averageRating'); // järjestetään leikkikentät keskiarvosanan mukaan
        // dump($data->toArray()); //                    DUMP
        return view('playgrounds.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playgrounds.form');
    }

    public function store(Request $request)
    {
        //     // dump($request->post()); //                           DUMP
        $playground=Playground::create([ // luodaan uusi leikkikenttä annetuilla tiedoilla
        'name' => $request->name,
        'location' => $request->location,
        'src' => $request->src,
        ]);
    
        $playground->save(); // tallennetaan uuden leikkikentän tiedot tietokantaan
    
        foreach ($request->input('selected_equipments', []) as $equipmentId) { // käytetään looppia luomaan jokaiselle valitulle laitteelle oma rivi tauluun
            $playgroundEquipment = PlaygroundEquipment::create([
                'playground_id' => $playground->id,
                'equipment_id' => $equipmentId,
                'amount' => $request->input('amount_' . $equipmentId, 0), // amount_{$equipmentId} on kentän nimi tyyliin amount_1, amount_2 jne | käytetään oletus arvoa 0 jos käyttäjä ei täytäkään kenttää toki tämänhän vois tehdä suoraan tietokantaankin
            ]);
    
            $playgroundEquipment->save();   // tallennetaan leikkikentän laite tiedot playground_equipment tauluun
        }
        return redirect('/playgrounds')->with('added', 'Leikkikenttä lisätty');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Playground $playground)
    // public function show($id)
    // {
    //     $playground = Playground::with('equipments')->find($id); // https://laravel.com/docs/10.x/eloquent-relationships#eager-loading
    //     dump($playground->toArray()); //                     DUMP
    //     return view('playgrounds.show', [
    //         'item' => $playground
    //     ]);
    // }

    public function show($id)
    {
        $playground = Playground::with('equipments', 'ratings')->find($id); // https://laravel.com/docs/10.x/eloquent-relationships#eager-loading
        // dump($playground->toArray()); //                    DUMP
        $latestRatings = $playground->ratings->whereNotNull('comment')->sortByDesc('created_at')->take(3); // haetaan uusimmat 3 arvostelua joissa comment kenttä ei ole tyhjä, näistä näytetään kommentit käyttäjälle
        //  pitäs kysellä tyyliin: SELECT * FROM ratings WHERE commet IS NOT NULL
        $allLatestRatings = $playground->ratings->whereNotNull('comment')->sortByDesc('created_at'); // kaikki uusimmat kommentit modalia varten
        $averageRating = number_format($playground->ratings->avg('rating'), 1); //  number_format(1) pyöristää luvun 1 desimaalin tarkkuudella, lasketaan arvostelujen keskiarvo jotta voidaan näyttää se käyttäjälle

        return view('playgrounds.show', [
            'item' => $playground,
            'latestRatings' => $latestRatings,
            'allLatestRatings' => $allLatestRatings,
            'averageRating' => $averageRating,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $query = Playground::with([
            'equipments'=>function($query){
                $query->orderBy('name');
                // dump(\App\Classes\QueryHelper::toSql($query)); 
            }
            
        ]);
        // dump(\App\Classes\QueryHelper::toSql($query));
        $playground = $query->find($id);
        $equipments = Equipment::orderBy('name')->get(); // siirretään kaikki tiedot equipments taulusta $equipments muuttujaan
        $selectedEquipments = PlaygroundEquipment::all(); // siirretään taulun kaikki tiedot muuttujaan
        // dump($playground->toArray());
        foreach ($equipments as $equipment) {
            $equipment->amount = 0;
            foreach ($playground->equipments as $pe) {
                if ($equipment->id === $pe->id) {
                    $equipment->selected = true;
                    $equipment->amount = $pe->pivot->amount;
                    // dump('löyty '.$equipment->id);
                    break; // hyppää ulos ensimmäisestä loopista
                }
            }
        }
        // dump($equipments->toArray());
        return view('playgrounds.edit', [ // siirrytään edit näkymään
            'playground' => $playground, // siirretään leikkikentän tiedot sisältävä muuttuja edit näkymään
            'equipments' => $equipments, // laitetietoja tarvitaan laite listan tulostamiseen edit näkymässä

            'selectedEquipments' => $selectedEquipments]); // siirretään taino välitetään muuttuja edit näkymään jotta voidaan verrata onko taulussa muokattavan leikkikentän laite tietoja 
            // pitäskö lisätä with->pivot et saadaan laitetiedot siirrettyä 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $playground = Playground::find($id);

        $playground->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'src' => $request->input('src'),
            
        ]);
            $playground->equipments()->detach(); // poistetaan vanhat laitemerkinnät jonka jälkeen sitten voi vain lisätä uudet tilalle
            foreach ($request->input('selected_equipments', []) as $equipmentId) { // käytetään looppia luomaan jokaiselle valitulle laitteelle oma rivi tauluun
                $playgroundEquipment = PlaygroundEquipment::create([
                    'playground_id' => $playground->id,
                    'equipment_id' => $equipmentId,
                    'amount' => $request->input('amount_' . $equipmentId, 0), // amount_{$equipmentId} on kentän nimi tyyliin amount_1, amount_2 jne | käytetään oletus arvoa 0 jos käyttäjä ei täytäkään kenttää toki tämänhän vois tehdä suoraan tietokantaankin
                ]);
                $playgroundEquipment->save();   // tallennetaan leikkikentän laite tiedot playground_equipment tauluun    
            }
    return redirect('/playgrounds');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // hoxs destroy
    {
    // dump($id);
    $playground = Playground::find($id);
    $playground->delete();

    return redirect('/playgrounds');
    }

}
