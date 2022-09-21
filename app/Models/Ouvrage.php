<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'auteur',
        'date_publication',
        'prix',
        'statut',
        'fournisseurId',
    ];

    public function abonne()
    {
        return $this->BelongsTo(Fournisseur::class, 'fournisseurId');
    }
    
}
