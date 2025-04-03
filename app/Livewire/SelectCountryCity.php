<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\City;


class SelectCountryCity extends Component
{

    public  $country_code, $city;
    public $countries = [];
    public $cities = [];

    public function render()
    {
        return view('livewire.select-country-city');
    }

    public function mount()
    {
        // Charger tous les pays
        $this->countries = Country::orderBy('name')->get();
    }

    public function updatedCountryCode($value)
    {
        // Récupérer les villes associées au pays sélectionné
        $country = Country::where('iso2', $value)->first();

        if ($country) {
            $this->cities = $country->cities()->pluck('name')->toArray();

            if (!$this->city && !empty($this->cities)) {
                $this->city = $this->cities[0];
            }
        } else {
            $this->cities = [];
            $this->city = null;
        }
    }
}
