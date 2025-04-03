<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRoleModel extends Model
{
    use HasFactory;

    protected $table = 'permission_role';

    static public function InsertUpdateRecord($permission_ids, $role_id)
    {
        PermissionRoleModel::where('role_id', '=', $role_id)->delete();
        foreach($permission_ids as $permission_id)
        {
            $save = new PermissionRoleModel();
            $save->permission_id = $permission_id;
            $save->role_id = $role_id;
            $save->save();
        }
    }

    static public function  getRolePermission($role_id)
    {
        return PermissionRoleModel::where('role_id', '=', $role_id)->get();
    }
    public static function getPermission($slug, $role_id)
    {

        
        return PermissionRoleModel::select('permission_role.id')
            ->join('permission', 'permission.id', '=', 'permission_role.permission_id')
            ->where('permission_role.role_id', $role_id)
            ->where('permission.slug', $slug) // Mettre ce where() avant get()
            ->count(); // Directement au lieu de get()->count()
    }


}


