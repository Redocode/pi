<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'societe',
        'telephone',
        'fax',
        'email',
        'address'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
