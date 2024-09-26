<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use App\Helper\ResponsHelper;

class ProductCartController extends Controller
{

    function cartListPage()
    {
        return view('pages.cart-list');

    }


    function addToCart(Request $request){
        $user_id = $request->header('id');
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $color = $request->input('color');
        $size = $request->input('size');

        $unitPrice = 0;

        $product= Product::where('id', $product_id)->first();

        if($product->discount === 1){
            $unitPrice = $product->discount_price;
        }else{
            $unitPrice = $product->price;
        }

        $totalPrice = $unitPrice * $quantity;

        $data= ProductCart::updateOrCreate([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'color' => $color,
            'size' => $size,
            'price' => $totalPrice
        ]);

        return ResponsHelper::out('success', $data, 200);
    }



    function deleteCart(Request $request){
        $user_id = $request->header('id');
        $product_id = $request->product_id;
        $data = ProductCart::where('user_id', $user_id)->where('product_id', $product_id)->delete();
        return ResponsHelper::out('success', $data, 200);
    }


    function cartList(Request $request){
        $user_id = $request->header('id');
        $data = ProductCart::where('user_id', $user_id)->with('product')->get();
        return ResponsHelper::out('success', $data, 200);
    }
}
