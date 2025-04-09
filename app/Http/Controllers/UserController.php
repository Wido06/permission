<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\RoleModel;
use App\Models\PermissionModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function add()
{
    $data['getRole'] = RoleModel :: getRecord();
    $data['getPermission'] = PermissionModel :: getRecord();
    return view('panel.user.add', $data); // Assure-toi que la vue "add.blade.php" existe bien dans "resources/views/panel/user/"
}

    // ✅ Liste des utilisateurs
    public function list()
    {
        $data['getRecord'] = User::all(); // Récupérer tous les utilisateurs
        return view('panel.user.list', $data);
    }

    // ✅ Insertion d'un utilisateur
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'string',
                Password::min(12)->letters()->mixedCase()->numbers()->symbols()->uncompromised(),
            ],
            'role_id' => 'required|integer',
            'country_id' => 'required|integer|exists:countries,id',
            'city_id' => 'required|integer|exists:cities,id',
            'sexe' => 'required|string|in:homme,femme',
            'file' => 'nullable|mimes:png,jpg,jpeg,pdf|max:2048'
        ]);

        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role_id = trim($request->role_id);
        $user->country_id = trim($request->country_id);
        $user->city_id = trim($request->city_id);
        $user->sexe = $request->sexe;

        // ✅ Gestion du fichier uploadé
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename, 'public'); // Stockage sécurisé
            $user->file_path = $path;
        }

        $user->save();

        return redirect('panel/user')->with('toast_message', 'Utilisateur créé avec succès.');
    }

    // ✅ Récupération pour modification
    public function edit($id)
    {
        $data['getRecord'] = User::findOrFail($id);
        return view('panel.user.edit', $data);
    }

    // ✅ Mise à jour d'un utilisateur
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:12',
            'role_id' => 'required|integer',
            'country_id' => 'required|integer|exists:countries,id',
            'city_id' => 'required|integer|exists:cities,id',
            'sexe' => 'required|string|in:homme,femme',
            'file' => 'nullable|mimes:png,jpg,jpeg,pdf|max:2048'
        ]);

        $user->name = trim($request->name);
        $user->role_id = trim($request->role_id);
        $user->country_id = trim($request->country_id);
        $user->city_id = trim($request->city_id);
        $user->sexe = $request->sexe;

        // ✅ Si un nouveau mot de passe est fourni, on le met à jour
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        // ✅ Gestion du fichier
        if ($request->hasFile('file')) {
            // Supprimer l'ancien fichier s'il existe
            if ($user->file_path && Storage::disk('public')->exists($user->file_path)) {
                Storage::disk('public')->delete($user->file_path);
            }

            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename, 'public');
            $user->file_path = $path;
        }

        $user->save();

        return redirect('panel/user')->with('toast_message', 'Utilisateur mis à jour avec succès.');
    }

    // ✅ Suppression d'un utilisateur
    public function delete($id)
    {
        $user = User::findOrFail($id);

        // ✅ Supprimer le fichier lié s'il existe
        if ($user->file_path && Storage::disk('public')->exists($user->file_path)) {
            Storage::disk('public')->delete($user->file_path);
        }

        $user->delete();

        return redirect('panel/user')->with('toast_message', "Utilisateur supprimé avec succès.");
    }
}
