<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // READ CATEGORY
    public function showCategory()
    {
        $category = category::all();
        return view('adminCategory.readCategory')->with(['category' => $category]);
    }

    // CREATE
    public function createCategory()
    {
        return view('adminCategory.create');
    }

    public function createNewCategoryProcess(Request $rqst) {       
        $c_name = $rqst->input('txtC_name');
        $c_desc       = $rqst->input('txtC_desc');
        category::create([
           
            'C_name'      => $c_name,
            'C_desc'    => $c_desc,
        ]);
        return redirect()->action('CategoryController@showCategory');
    }

    public function updateCategory($c_id)
    {
        $rs = category::where('C_id', $c_id)->first();
        return view('adminCategory.update', ['rs' => $rs]);
    }

    public function updateCategoryProcess(Request $rqst, $c_id)
    {
        $c_name   = $rqst->input('txtName');
        $c_desc  = $rqst->input('txtPrice');
        category::where('C_id', $c_id)
            ->update([
                'C_name'    => $c_name,
                'C_desc'   => $c_desc,
            ]);
        return redirect()->action('CategoryController@showCategory');
    }
}
