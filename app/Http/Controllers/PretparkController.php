<?php

namespace App\Http\Controllers;

use App\Models\Dagjeuit;
use Illuminate\Http\Request;

class PretparkController extends Controller
{
    public function showDagjeuitLocatie($id) {
        $pretparklocatie = Dagjeuit::findOrFail($id);
        return view('pretpark.show', [
            'item' => $pretparklocatie, 
            'categorie_id' => 1
        ]);
    }

    public function showPretpark() {
        $pretparkdagje = Dagjeuit::select('dagjeuits.name', 'dagjeuits.beschrijving', 'dagjeuits.titel', 'dagjeuits.created_at', 'dagjeuits.id', 'fotos.url', 'categorie_dagjeuit.categorie_id')
            ->join('categorie_dagjeuit', 'dagjeuits.id', '=', 'categorie_dagjeuit.dagjeuit_id')
            ->join('categories', 'categories.id', '=', 'categorie_dagjeuit.categorie_id')
            ->leftJoin('fotos', 'dagjeuits.id', '=', 'fotos.dagjeuit_id')
            ->where('categorie_dagjeuit.categorie_id', 1)
            ->get();

        return view('pretpark', compact('pretparkdagje'));
    }

    public function showPretparkDetail($id) {
        $pretparkdagje = Dagjeuit::select('dagjeuits.name', 'dagjeuits.beschrijving', 'dagjeuits.titel', 'dagjeuits.created_at', 'dagjeuits.id', 'dagjeuits.adres', 'fotos.url', 'categorie_dagjeuit.categorie_id', 'dagjeuits.postcode', 'dagjeuits.buiten', 'dagjeuits.minder_validen', 'dagjeuits.restaurant_aanwezig')
            ->join('categorie_dagjeuit', 'dagjeuits.id', '=', 'categorie_dagjeuit.dagjeuit_id')
            ->join('categories', 'categories.id', '=', 'categorie_dagjeuit.categorie_id')
            ->leftJoin('fotos', 'dagjeuits.id', '=', 'fotos.dagjeuit_id')
            ->where('dagjeuits.id', $id)
            ->firstOrFail();
    
        return view('pretpark.show', compact('pretparkdagje'));
    
    }
}
