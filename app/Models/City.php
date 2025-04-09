<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    // Nom de la table associée (au cas où elle serait différente de la convention plurielle)
    protected $table = 'cities';  // Vérifie que la table s'appelle bien 'cities'

    // Clé primaire (si différente de 'id')
    // protected $primaryKey = 'id';

    // Indique si la clé primaire est auto-incrémentée
    // public $incrementing = true;

    // Type de la clé primaire
    // protected $keyType = 'int';

    // Colonnes modifiables en masse
    protected $fillable = [
        'country_id', 'name', 'state_id', 'state_code', 
        'country_code', 'latitude', 'longitude'
    ];

    /**
     * Récupère le pays associé à cette ville.
     */
    public function country()
    {
        // Une ville appartient à un pays
        return $this->belongsTo(Country::class, 'country_id'); // 'country_id' est la clé étrangère dans la table 'cities'
    }

    /**
     * Récupère l'état (ou province) associé à cette ville.
     */
    public function state()
    {
        // Une ville appartient à un état
        return $this->belongsTo(State::class, 'state_id'); // 'state_id' est la clé étrangère dans la table 'cities'
    }

    /**
     * Récupère les entreprises associées à cette ville (si applicable).
     */
    
}
