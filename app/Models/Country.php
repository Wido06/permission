<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Nom de la table associée (au cas où elle serait différente de la convention plurielle)
    protected $table = 'countries';  // Assurez-vous que la table s'appelle bien 'countries'

    // Colonnes modifiables en masse
    protected $fillable = [
        'name', 'iso2', 'iso3', 'phonecode', 'capital',
        'currency', 'currency_symbol', 'tld', 'native',
        'region', 'subregion', 'latitude', 'longitude',
        'emoji', 'emojiU', 'flag', 'wikiDataId'
    ];

    /**
     * Récupère les villes associées à ce pays.
     */

   // App\Models\Country.php
            public function cities()
            {
                return $this->hasMany(City::class, 'country_id', 'id');
            }

}
