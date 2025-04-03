<?php

namespace App\Http\Controllers;
use App\Models\SubcategoryModel;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubcategoryModel::getRecord();
        return view('panel.subcategory.list',$data);
    }

    public function add()
    {
        return view('panel.subcategory.add');
    }

    public function  insert(Request $request)
    {
        // dd($request->all());
        $save = new SubcategoryModel();
        $save->name = $request->name;
        $save->description = $request->description;
        $save->save();

        return redirect('panel/subcategory')->with('toast_message', 'Category successfully added !');
    }

    public function edit($id)
    {
        $data['getRecord'] = SubcategoryModel::getSingle($id);
        return view('panel.subcategory.edit', $data);
    }

    public function  update($id, Request $request)
    {
        //  dd($request->all());
        $save = SubcategoryModel::getSingle($id);
        $save->name = $request->name;
        $save->description = $request->description;
        $save->save();
        return redirect('panel/subcategory')->with('toast_message', "subcategory successfully updated");
    }
public function delete($id)
{
    $save = SubcategoryModel::getSingle($id);
    $save->delete();
    return redirect('panel/subcategory')->with('toast_message', "Subcategory successfully deleted");
}


}
