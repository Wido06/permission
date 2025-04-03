<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    // Nom de la table associée (au cas où elle serait différente de la convention plurielle)
    protected $table = 'cities';  // Assurez-vous que la table s'appelle bien 'cities'

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
        // Relation inverse, une ville appartient à un pays
        return $this->belongsTo(Country::class, 'country_id'); // On précise 'country_id' comme clé étrangère
    }

    /**
     * Récupère les entreprises associées à cette ville.
     */
    public function companies()
    {
        // Une ville peut avoir plusieurs entreprises
        return $this->hasMany(Company::class);
    }
}