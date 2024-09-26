<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ResponsHelper;
use App\Models\CustomerProfile;

class CustomerProfileController extends Controller
{

    function customerProfilePage()
    {
        return view('pages.profile');

    }


    function createProfile(Request $request){
        $user_id = $request->header('id');
        $request->merge(['user_id' => $user_id]);
        $data = CustomerProfile::updateOrCreate(
            ['user_id' => $user_id],
            $request->input()
        );
        return ResponsHelper::out('success', $data, 200);
    }

    function readCustomerProfile(Request $request){
        $user_id = $request->header('id');
        $data = CustomerProfile::where('user_id', $user_id)->first();
        return ResponsHelper::out('success', $data, 200);
    }
}
