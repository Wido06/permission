<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::where('role_id', 3)->count();
        $totalEmployees = User::where('role_id', 2)->count();

        return view('panel.dashboard', compact('totalUsers', 'totalEmployees'));
    }
}
