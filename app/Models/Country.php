<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Nom de la table associée (si différent de la convention plurielle)
    // protected $table = 'countries';

    // Clé primaire (si différente de 'id')
    // protected $primaryKey = 'id';

    // Indique si la clé primaire est auto-incrémentée
    // public $incrementing = true;

    // Type de la clé primaire
    // protected $keyType = 'int';

    // Colonnes modifiables en masse
    protected $fillable = ['name', 'iso2', 'iso3', 'phonecode', 'capital', 'currency', 'currency_symbol'];

    /**
     * Récupère les villes associées à ce pays.
     * Si un iso2 est passé en paramètre, retourne les villes correspondant à ce code de pays.
     */
    public function cities($iso2 = null)
    {
        // Si un iso2 est passé, on récupère les villes du pays correspondant
        if ($iso2) {
            return $this->hasMany(City::class)->where('country_code', $iso2);
        }

        // Sinon, on retourne toutes les villes associées à ce pays
        return $this->hasMany(City::class, 'country_id');
    }

    /**
     * Récupère le pays en fonction de son iso2.
     */
    public static function country($code)
    {
        return self::where('iso2', $code)->first();
    }

    /**
     * Récupère tous les pays triés par nom.
     */
    public static function countries()
    {
        return self::orderBy('name', 'asc')->get();
    }
}