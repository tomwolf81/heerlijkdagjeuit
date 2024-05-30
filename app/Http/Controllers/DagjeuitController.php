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


class DagjeuitController
{
    public function frontpage() {
        return view('frontpage');
    }

    public function create()
    { $categories = Categorie::all();

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
            ]);
    
            $datum = date('Y-m-d', strtotime($request->datum));
    
            $buiten = $request->has('buiten');
            $minder_validen = $request->has('minder_validen');
            $restaurant_aanwezig = $request->has('restaurant_aanwezig');
    
            DB::beginTransaction();
    
            try {
                $dagjeuit = Dagjeuit::create([
                    'titel' => $request->titel,
                    'datum' => $datum,
                    'beschrijving' => $request->beschrijving,
                    'buiten' => $buiten,
                    'minder_validen' => $minder_validen,
                    'restaurant_aanwezig' => $restaurant_aanwezig,
                ]);
    
                // Voeg de categorie toe aan het dagje uit
                $dagjeuit->categories()->attach($request->categorie_id);
    
                if ($request->hasFile('foto')) {
                    $fotoPath = $request->file('foto')->store('fotos', 'public');
    
                    Foto::create([
                        'dagjeuit_id' => $dagjeuit->id,
                        'url' => $fotoPath,
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
    }