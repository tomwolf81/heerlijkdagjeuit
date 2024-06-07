<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dagjeuit extends Model
{
    use HasFactory;

    
    
    protected $fillable = ['titel', 'beschrijving', 'buiten', 'minder_validen', 'restaurant_aanwezig', 'datum', 'adres', 'postcode', 'plaats'];

    
    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

    public function gezelschap()
    {
        return $this->belongsTo(Gezelschap::class);
    }

    public function locatie()
    {
        return $this->belongsTo(Locatie::class);
    }

    public function foto()
    {
        return $this->hasOne(Foto::class);
    }

    public function categories() {
        return $this->belongsToMany(Categorie::class, 'categorie_dagjeuit');
    }
}
