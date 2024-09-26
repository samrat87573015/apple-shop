<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ResponsHelper;
use App\Models\Brand;

class BrandController extends Controller
{
    function brandList(Request $request){
        $data = Brand::all();
        return ResponsHelper::out('success', $data, 200);
    }
}
