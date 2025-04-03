<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubcategoryModel extends Model
{
    protected $table = 'subcategory';
    public static function getRecord()
    {
        return self::all(); // Retourne toutes les catégories
    }

    static public function getSingle($id)
    {
        return SubcategoryModel::find($id);
    }
}
