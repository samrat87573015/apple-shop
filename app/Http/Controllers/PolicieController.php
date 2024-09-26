<?php

namespace App\Http\Controllers;

use App\Models\Policie;
use Illuminate\Http\Request;
use App\Helper\ResponsHelper;

class PolicieController extends Controller
{

    function policiesPages()
    {

        return view('pages.policie');
    }


    function policieHandler(Request $request){
        $data = Policie::where('type', $request->type)->first();
        return ResponsHelper::out('success', $data, 200);
    }
}
