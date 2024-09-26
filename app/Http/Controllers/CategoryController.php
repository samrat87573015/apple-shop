<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ResponsHelper;
use App\Models\Category;

class CategoryController extends Controller
{

    function categoryByProducts(){
        return view('pages.categoryByProducts');
    }
    function categoryList(){
        $data = Category::all();
        return ResponsHelper::out('success', $data, 200);
    }
}
