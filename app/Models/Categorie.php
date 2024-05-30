<?php

namespace App\Models;

use App\Models\Dagjeuit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    
    public function dagjeuits(){
        return $this->belongsToMany(Dagjeuit::class, 'categorie_dagjeuit');
    }
}
