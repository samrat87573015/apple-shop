<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Helper\ResponsHelper;
use App\Helper\JWTTokan;

class UserController extends Controller
{

    function loginPage()
    {

        return view('pages.login');

    }

    function varifyOtpPage()
    {

        return view('pages.varify-otp');
    }


    function login(Request $request){

        try{
            $email = $request->email;
            $otp = rand(100000, 999999);

            $details = [
                'otp' => $otp
            ];

            Mail::to($email)->send(new OTPMail($details));
            User::updateOrCreate(['email' => $email], ['email' => $email, 'otp' => $otp]);

            Return ResponsHelper::out('success', '6 digit OTP has been sent to your email', 200);

        }catch(\Exception $e){
            return ResponsHelper::out('fail', 'Something went wrong', 200);
        }

    }


    function verifyOtp(Request $request){

        $email = $request->email;
        $otp = $request->otp;

        $user = User::where('email', $email)->where('otp', $otp)->first();

        if($user){
            User::where('email', $email)->update(['otp' => 0]);
            $LoginToken = JWTTokan::createTokan($email, $user->id);
            Return ResponsHelper::out('success', 'OTP verified successfully', 200)->cookie('LoginToken', $LoginToken, 60 *60 * 24 * 7);
        }else{
            Return ResponsHelper::out('fail', 'Invalid OTP', 200);
        }
    }


    function logout(Request $request){
        return redirect('/login')->cookie('LoginToken', '', -1);
    }


}
