<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;


// class RoleModel extends Model
// {
//     Use HasFactory;

//     protected $table = 'role';
//     static public function getSingle($id)
//     {
//         return RoleModel::find($id);
//     }

//     static public function getRecord()
//     {
//         return RoleModel::get();
//     }
// }





namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;
    protected $table = 'role'; // Vérifie que le nom de la table est correct

    public static function getRecord()
    {
        return RoleModel::get(); // Récupère tous les rôles
    }

    public static function getSingle($id)
    {
        return self::find($id);
    }
}

