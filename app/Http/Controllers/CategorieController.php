<?php

namespace App\Http\Controllers;


use App\Models\Dagjeuit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{

   
    public function showPretpark()
    {
        
        $pretparkdagje =  Dagjeuit::select('dagjeuits.name', 'dagjeuits.beschrijving', 'dagjeuits.titel', 'dagjeuits.created_at', 'dagjeuits.id', 'fotos.url', 'categorie_dagjeuit.categorie_id')
            ->join('categorie_dagjeuit', 'dagjeuits.id', '=', 'categorie_dagjeuit.dagjeuit_id')
            ->join('categories', 'categories.id', '=', 'categorie_dagjeuit.categorie_id')
            ->leftJoin('fotos', 'dagjeuits.id', '=', 'fotos.dagjeuit_id')
            ->where('categorie_dagjeuit.categorie_id', 4)
            ->get();

            return view('pretpark', compact('pretparkdagje'));
        
    }
    
    
        
        public function Pretparkshow($id)
    {
        $pretparkdagje = Dagjeuit::select('dagjeuits.name', 'dagjeuits.beschrijving', 'dagjeuits.titel', 'dagjeuits.created_at', 'dagjeuits.id', 'fotos.url', 'categorie_dagjeuit.categorie_id')
        ->join('categorie_dagjeuit', 'dagjeuits.id', '=', 'categorie_dagjeuit.dagjeuit_id')
        ->join('categories', 'categories.id', '=', 'categorie_dagjeuit.categorie_id')
        ->leftJoin('fotos', 'dagjeuits.id', '=', 'fotos.dagjeuit_id')
        ->where('dagjeuits.id', $id)
        ->first();

    return view('pretpark.show', compact('pretparkdagje'));
    }
    
    public function showDierentuin()
    
{
    $dierentuindagje = Dagjeuit::select('dagjeuits.name', 'dagjeuits.beschrijving', 'dagjeuits.titel', 'dagjeuits.created_at', 'dagjeuits.id', 'fotos.url', 'categorie_dagjeuit.categorie_id')
        ->join('categorie_dagjeuit', 'dagjeuits.id', '=', 'categorie_dagjeuit.dagjeuit_id')
        ->join('categories', 'categories.id', '=', 'categorie_dagjeuit.categorie_id')
        ->leftJoin('fotos', 'dagjeuits.id', '=', 'fotos.dagjeuit_id')
        ->where('categorie_dagjeuit.categorie_id', 2)  // Verander categorie_id naar 3 voor 'dierentuin'
        ->get();

    return view('dierentuin', compact('dierentuindagje'));
}
    
        public function Dierentuinshow($id)
    {
        $dierentuindag = Dagjeuit::select('dagjeuits.name', 'dagjeuits.beschrijving', 'dagjeuits.titel', 'dagjeuits.created_at', 'dagjeuits.id', 'fotos.url', 'categorie_dagjeuit.categorie_id')
        ->join('categorie_dagjeuit', 'dagjeuits.id', '=', 'categorie_dagjeuit.dagjeuit_id')
        ->join('categories', 'categories.id', '=', 'categorie_dagjeuit.categorie_id')
        ->leftJoin('fotos', 'dagjeuits.id', '=', 'fotos.dagjeuit_id')
        ->where('categorie_dagjeuit.categorie_id', 2)  // Verander categorie_id naar 3 voor 'dierentuin'
        ->get();
        
        
        return view('dierentuin.show', compact('dierentuindag'));
    }
    
}










