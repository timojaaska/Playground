<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Playground;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function store(Request $request)
    {
        
        Equipment::create([

            'name' => $request->name,
        ]);
        return redirect('/playgrounds')->with('added', 'Laite lisätty');
    }

    public function index()
    {
        $data = Equipment::all();
        return view('/playgrounds.show', [
            'data' => $data
        ]);
    }

    public function show()
    {
        $equipments = Equipment::all(); // siirretään kaikki tiedot equipments taulusta $equipments muuttujaan myöhempää käyttöä varten
        return view('playgrounds.form', ['equipments' => $equipments]); // palautetaan form.blade.php näkymä joka sijaitsee playgrounds kansiossa. siirretään näkymään taulukko joka sisältää kaikki tiedot equipments taulusta. siten voidaan käyttää leikkikentän luomisessa laitteiden nimiä ja niiden id tietoja.
    }

}
