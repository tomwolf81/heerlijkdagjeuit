<?php

namespace App\Models;

use App\Models\Dagjeuit;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = ['dagjeuit_id', 'url'];

    public function dagjeuit()
    {
        return $this->belongsTo(Dagjeuit::class);
    }
}
