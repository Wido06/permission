<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VilleModel;


class VilleController extends Controller
{
    public function getVilles($pays_id)
    {
        $villes = VilleModel::where('pays_id', $pays_id)->get();
        return response()->json($villes);
    }
}
