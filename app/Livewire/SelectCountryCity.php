<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\City;

class SelectCountryCity extends Component
{
    public $country_code;
    public $countries = [];
    public $cities = [];
    public $city;

    public function mount()
    {
        $this->countries = Country::orderBy('name')->get();
        // $this->cities = City::all();
    }

    public function updatedCountryCode($value)
    {
        // Trouver le pays par son code ISO
        $country = Country::where('iso2', $value)->first();

        if ($country) {
            // Récupérer toutes les villes associées au pays sélectionné
            $this->cities = $country->cities()->get()->map(function ($city) {
                return $city->name;
            })->toArray();

            // Si aucune ville n'est sélectionnée, choisir la première ville par défaut
            if (empty($this->city) && !empty($this->cities)) {
                $this->city = $this->cities[0];
            }
        } else {
            // Réinitialiser si aucun pays n'est trouvé
            $this->cities = [];
            $this->city = null;
        }
    }

    public function render()
{
    return view('livewire.select-country-city', [
        'cities' => $this->cities,
    ]);
}

}
