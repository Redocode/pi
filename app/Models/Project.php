<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'client_id',
        'numero_projet',
        'createur_id',
        'date_creation',
        'nom_projet',
        'description'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
