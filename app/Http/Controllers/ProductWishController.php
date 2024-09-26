<?php

namespace App\Http\Controllers;

use App\Models\ProductWish;
use Illuminate\Http\Request;
use App\Helper\ResponsHelper;

class ProductWishController extends Controller
{

    function wishListPage()
    {
        return view('pages.wish-list');

    }

    function wishListCount(Request $request)
    {

        $user_id = $request->header('id');
        $data = ProductWish::where('user_id', $user_id)->count();
        return ResponsHelper::out('success', $data, 200);

    }


    function wishList(Request $request){

        $user_id = $request->header('id');
        $data = ProductWish::where('user_id', $user_id)->with('product')->get();
        return ResponsHelper::out('success', $data, 200);
    }



    function addToWishList(Request $request){
        try{
            $user_id = $request->header('id');
            $product_id = $request->product_id;

            $data = ProductWish::updateOrCreate(['user_id' => $user_id, 'product_id' => $product_id], ['user_id' => $user_id, 'product_id' => $product_id]);
            return ResponsHelper::out('success', $data, 200);
        }catch (\Exception $e){
            return ResponsHelper::out('fail', $e->getMessage(), 200);
        }
    }



    function removeFromWishList(Request $request){

        $user_id = $request->header('id');
        $product_id = $request->product_id;

        if(!ProductWish::where(['user_id' => $user_id, 'product_id' => $product_id])->exists()){
            return ResponsHelper::out('fail', 'product not found', 200);
        }else{
            $data = ProductWish::where(['user_id' => $user_id, 'product_id' => $product_id])->delete();
            return ResponsHelper::out('success', $data, 200);
        }

    }


}
