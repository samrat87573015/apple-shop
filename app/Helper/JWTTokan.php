<?php  


namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;



class JWTTokan
{
    public static function createTokan($email,$id)
    {
        $key = env('JWT_SECRET');

        $payload = [
            'iss' => "laravel-tokan",
            'iat' => time(),
            'exp' => time() + 60 *60 * 24 * 7,
            'email' => $email,
            'id' => $id
        ];

        return JWT::encode($payload, $key, 'HS256');

    }


    public static function decodeTokan($loginTokan){
        try{

            if($loginTokan==null){
                return "unauthorized";
            }else{

                $key = env('JWT_SECRET');

                $decoded = JWT::decode($loginTokan, new Key($key, 'HS256'));
                return $decoded;
            }
            
        }catch(\Exception $e){
            return "unauthorized";
        }
    }


}
