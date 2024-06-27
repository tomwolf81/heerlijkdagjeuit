<?php 

namespace App\Http\Controllers;

use Exception;
use App\Models\Foto;
use App\Models\Dagjeuit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DagjeuitController extends Controller
{
    public function frontpage() {
        return view('frontpage');
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('dashboard', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titel' => 'required|string|max:255',
            'datum' => 'required|date',
            'beschrijving' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'adres' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'plaats' => 'required|string|max:100',
        ]);

        $datum = date('Y-m-d', strtotime($request->datum));
        $buiten = $request->has('buiten');
        $minder_validen = $request->has('minder_validen');
        $restaurant_aanwezig = $request->has('restaurant_aanwezig');

        DB::beginTransaction();

        try {
            $path = null;
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('fotos', 'public');
            }

            $dagjeuit = Dagjeuit::create([
                'titel' => $request->titel,
                'datum' => $datum,
                'beschrijving' => $request->beschrijving,
                'buiten' => $buiten,
                'minder_validen' => $minder_validen,
                'restaurant_aanwezig' => $restaurant_aanwezig,
                'adres' => $request->adres,
                'postcode' => $request->postcode,
                'plaats' => $request->plaats,
                'url' => $path, // We gebruiken de URL-kolom in plaats van foto
            ]);

            // Voeg de categorie toe aan het dagje uit
            $dagjeuit->categories()->attach($request->categorie_id);

            if ($path) {
                Foto::create([
                    'dagjeuit_id' => $dagjeuit->id,
                    'url' => $path,
                ]);
            }

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Dagje uit en foto succesvol toegevoegd!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Fout bij het opslaan van dagje uit: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Er is een fout opgetreden bij het toevoegen van het dagje uit. Probeer het opnieuw.');
        }
    }
    public function showFrontpage()
{
    $pretparkdag = Dagjeuit::select('dagjeuits.name', 'dagjeuits.beschrijving', 'dagjeuits.titel', 'dagjeuits.datum', 'dagjeuits.created_at', 'dagjeuits.id', 'fotos.url', 'categorie_dagjeuit.categorie_id')
        ->join('categorie_dagjeuit', 'dagjeuits.id', '=', 'categorie_dagjeuit.dagjeuit_id')
        ->join('categories', 'categories.id', '=', 'categorie_dagjeuit.categorie_id')
        ->leftJoin('fotos', 'dagjeuits.id', '=', 'fotos.dagjeuit_id')
        ->where('categorie_dagjeuit.categorie_id', 1)
        ->get();

    // Controleer of er items zijn voordat je een willekeurig item selecteert
    if ($pretparkdag->isNotEmpty()) {
        $randomPretparkdag = $pretparkdag->random();
    } else {
        $randomPretparkdag = null; // Voor het geval er geen items zijn
    }

    return view('frontpage', compact('randomPretparkdag'));
}

}
