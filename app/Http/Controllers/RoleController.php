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



}




