<?php

namespace App\Helper;

use App\Models\Invoice;
use App\Models\SslcommerzAccount;
use Illuminate\Support\Facades\Http;
use Exception;

class SSLCommerz
{

    static function intrigetionPayment($profile, $payable, $transaction_id, $user_email)
    {

        try{
            $ssl = SslcommerzAccount::first();

            $res = Http::asForm()->post($ssl->init_url,[
                'store_id' => $ssl->store_id,
                'store_passwd' => $ssl->store_password,
                'currency' => $ssl->currency,
                'tran_id' => $transaction_id,
                'total_amount' => $payable,
                'success_url' => "$ssl->sussess_url?tran_id=$transaction_id",
                'fail_url' => "$ssl->fail_url?tran_id=$transaction_id",
                'ipn_url' => $ssl->ipn_url,
                'cancel_url' => "$ssl->cancel_url?tran_id=$transaction_id",
                'cus_name' => $profile->cus_name,
                'cus_email' => $user_email,
                'cus_add1' => $profile->cus_address,
                'cus_add2' => $profile->cus_address,
                'cus_city' => $profile->cus_city,
                'cus_state' => $profile->cus_state,
                'cus_postcode' => $profile->cus_postcode,
                'cus_country' => $profile->cus_country,
                'cus_phone' => $profile->cus_phone,
                'cus_fax' => $profile->cus_fax,
                'shipping_method' => 'YES',
                'ship_name' => $profile->ship_name,
                'ship_add1' => $profile->ship_address,
                'ship_add2' => $profile->ship_address,
                'ship_city' => $profile->ship_city,
                'ship_state' => $profile->ship_state,
                'ship_postcode' => $profile->ship_postcode,
                'ship_country' => $profile->ship_country,
                'ship_phone' => $profile->ship_phone,
                'ship_fax' => $profile->ship_fax,
                'product_name' => 'Product 1',
                'product_category' => 'Category 1',
                'product_profile' => 'general',
                'product_url' => 'url',
                'product_amount' => $payable,
            ]);

            return $res->json();
        }catch (Exception $e){
            return $ssl;
        }

    }



    static function initPaymentSuccess($transaction_id)
    {
        $data = Invoice::where(['transaction_id' => $transaction_id, 'val_id' => 0])->update(['payment_status' => 'success']);

        return ResponsHelper::out('success', $data, 200);
    }


    static function initPaymentFail($transaction_id){

        Invoice::where(['transaction_id' => $transaction_id, 'val_id' => 0])->update(['payment_status' => 'fail']);
        return 1;
    }

    static function initPaymentCancel($transaction_id){

        Invoice::where(['transaction_id' => $transaction_id, 'val_id' => 0])->update(['payment_status' => 'cancel']);
        return 1;
    }


    static function initPaymentIpn($transaction_id, $status, $val_id){

        Invoice::where(['transaction_id' => $transaction_id, 'val_id' => 0])->update(['payment_status' => $status, 'val_id' => $val_id]);
        return 1;
    }
}
