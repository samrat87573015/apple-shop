<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ResponsHelper;
use App\Models\ProductReview;
use App\Models\CustomerProfile;

class ProductReviewController extends Controller
{
    function createReview(Request $request){
        $user_id = $request->header('id');

        $profile = CustomerProfile::where('user_id', $user_id)->first();

        //return $profile;

        if($profile){
            $request->merge(['user_id' => $user_id]);
            $data = ProductReview::updateOrCreate(
                ['user_id' => $user_id],
                $request->input()
            );
            return ResponsHelper::out('success', $data, 200);
        }else{
            return ResponsHelper::out('fail', 'please Complete profile', 200);
        }

    }

    // function readReview(Request $request){

    // }
}
