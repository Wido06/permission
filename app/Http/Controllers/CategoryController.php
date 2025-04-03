<?php

namespace App\Http\Controllers;

use COM;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = CategoryModel::getRecord();
        return view('panel.category.list',$data);
    }



    public function add()
    {
        return view('panel.category.add');
    }

    public function  insert(Request $request)
    {
        // dd($request->all());
        $save = new CategoryModel();
        $save->name = $request->name;
        $save->description = $request->description;
        $save->save();

        return redirect('panel/category')->with('toast_message', 'Category successfully added !');
    }

    public function edit($id)
    {
        $data['getRecord'] = CategoryModel::getSingle($id);
        return view('panel.category.edit', $data);
    }
    public function  update($id, Request $request)
    {
        //  dd($request->all());
        $save = CategoryModel::getSingle($id);
        $save->name = $request->name;
        $save->description = $request->description;
        $save->save();
        return redirect('panel/category')->with('toast_message', "Category successfully updated");
    }
public function delete($id)
{
    $save = CategoryModel::getSingle($id);
    $save->delete();
    return redirect('panel/category')->with('toast_message', "Category successfully deleted");
}


}


