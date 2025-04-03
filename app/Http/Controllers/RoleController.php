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



//     public function store(Request $request)
// {
//     if (!$request->ajax()) {
//         return response()->json(['success' => false, 'message' => 'Requête invalide'], 400);
//     }

//     $request->validate(['name' => 'required|unique:role,name']);

//     $role = RoleModel::create(['name' => $request->name]);

//     return response()->json([
//         'success' => true,
//         'role' => $role
//     ]);
// }

}
