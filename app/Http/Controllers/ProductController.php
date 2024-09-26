<?php

namespace App\Http\Controllers;

use App\Models\ProductSlider;
use Illuminate\Http\Request;
use App\Helper\ResponsHelper;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductReview;

class ProductController extends Controller
{

    function productDetailsPage()
    {
        return view('pages.product-details');
    }


    function productByCategory(Request $request){
        $data = Product::where('category_id', $request->id)->with(['brand','category'])->get();
        return ResponsHelper::out('success', $data, 200);
    }


    function productByBrand(Request $request){
        $data = Product::where('brand_id', $request->id)->get();
        return ResponsHelper::out('success', $data, 200);
    }


    function productByRemark(Request $request){
        $data = Product::where('remark', $request->remark)->with('review')->get();
        return ResponsHelper::out('success', $data, 200);
    }

    function productDetails(Request $request){
        $data = ProductDetail::where('product_id', $request->id)->with(['product','product.brand','product.category',])->get();
        return ResponsHelper::out('success', $data, 200);
    }

    function productByReview(Request $request){
        $data = ProductReview::where('product_id', $request->product_id)
        ->with(['user.profile' => function($q){
            $q->select('user_id','id', 'cus_name');
        }])
        ->get();
        return ResponsHelper::out('success', $data, 200);
    }

    function productSliders()
    {
        $data= ProductSlider::all();
        return ResponsHelper::out('success', $data, 200);

    }
}
