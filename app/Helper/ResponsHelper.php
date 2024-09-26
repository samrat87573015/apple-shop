<?php

namespace App\Helper;


class ResponsHelper
{

    public static function out($msg,$data,$code){
        return response()->json(['msg'=>$msg,'data'=>$data,'code'=>$code]);
    }
}