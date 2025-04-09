<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;

class RoleController extends Controller
{
    public function list()
    {
        $data['getRecord'] = RoleModel::getRecord();
        return view('panel.role.list',$data);
    }


    public function add()
    {
        $getPermission = PermissionModel::getRecord();
        $data['getPermission'] = $getPermission;
        return view('panel.role.add', $data);
    }

    public function  insert(Request $request)
    {
        // dd($request->all());
        $save = new RoleModel;
        $save->name = $request->name;
        $save->save();

        PermissionRoleModel::InsertUpdateRecord($request->permission_id, $save->id);
        return redirect('panel/role')->with('success', "Role successfully created");
    }


    public function edit($id)
{
    $data['getRecord'] = RoleModel::getSingle($id);
    $data['getPermission'] = PermissionModel::getRecord();
    $data['getRolePermission'] = PermissionRoleModel::getRolePermission($id);

    return view('panel.role.edit', $data);
}


    public function  update($id, Request $request)
    {
        //  dd($request->all());
        $save = RoleModel::getSingle($id);
        $save->name = $request->name;
        $save->save();
        return redirect('panel/role')->with('success', "Role successfully updated");
    }

    public function delete($id)
    {
        $save = RoleModel::getSingle($id);
        $save->delete();
        return redirect('panel/role')->with('success', "Role successfully deleted");
    }


    public function store(Request $request)
    {
        // 🔐 Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'permission_id' => 'nullable|array',
            'permission_id.*' => 'integer|exists:permissions,id',
        ]);

<<<<<<< HEAD
    public function store(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json(['success' => false, 'toast_message' => 'Requête invalide'], 400);
        }

        dd($request->all());
    
        $validated = $request->validate([
            'name' => 'required|unique:role,name',
            'permission_id' => 'array', // optionnel, pour éviter les erreurs
            'permission_id.*' => 'exists:permission,id' // chaque ID doit exister
        ]);
    
        $role = RoleModel::create([
            'name' => $request->name
        ]);
    
        // Attacher les permissions AVANT le return
        if ($request->has('permission_id')) {
            $role->permissions()->sync($request->permission_id); // Nécessite une relation définie
        }
    
        return response()->json([
            'success' => true,
            'role' => $role
        ]);

        if ($request->has('permission_id')) {
            $role->permissions()->sync($request->permission_id);
        }
return redirect('panel/role')->with('success', "Role successfully created");
=======
        // 💾 Création du rôle
        $save = new RoleModel;
        $save->name = trim($request->name);
        $save->save();

        // 🔗 Association des permissions
        if ($request->has('permission_id')) {
            PermissionRoleModel::InsertUpdateRecord($request->permission_id, $save->id);
        }

        // ✅ Message de succès
        return redirect()->back()->with('toast_message', "Rôle créé avec succès.");
    }


>>>>>>> 4a8b71e514c1e388d111208f89f20fc364ae98a3

       
    }
    
    
}
<<<<<<< HEAD
        

    
=======



>>>>>>> 4a8b71e514c1e388d111208f89f20fc364ae98a3

