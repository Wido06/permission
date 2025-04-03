<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CategoryModel extends Model
{
    use SoftDeletes;
    protected $table = 'category';

    protected $dates = ['deleted_at'];

    public static function getRecord()
    {
        return self::all(); // Retourne toutes les catégories
    }

    static public function getSingle($id)
    {
        return CategoryModel::find($id);
    }

    


}
