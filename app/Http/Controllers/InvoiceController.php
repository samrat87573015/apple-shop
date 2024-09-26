<?php

namespace App\Http\Controllers;

use App\Helper\ResponsHelper;
use App\Helper\SSLCommerz;
use App\Models\CustomerProfile;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\ProductCart;

class InvoiceController extends Controller
{



    function createInvoice(Request $request)
    {
        DB::beginTransaction();

        try{
            $user_id = $request->header('id');
            $user_email = $request->header('email');

            $transaction_id = uniqid();

            $profile = CustomerProfile::where('user_id', $user_id)->first();

            $cus_details = "Name: $profile->cus_name, Address: $profile->cus_address, City: $profile->cus_city, Phone: $profile->cus_phone";
            $ship_details = "Name: $profile->ship_name, Address: $profile->ship_address, City: $profile->ship_city, Phone: $profile->ship_phone";

            $total = 0;

            $cartList = ProductCart::where('user_id', $user_id)->get();

            foreach ($cartList as $cart) {
                $total =$total+$cart->price;
            }
            $vat = floor($total*5/100);
            $payable = floor($total+$vat);

            $invoice = Invoice::create([
                'total' => $total,
                'vat' => $vat,
                'payable' => $payable,
                'cus_details' => $cus_details,
                'ship_details' => $ship_details,
                'transaction_id' => $transaction_id,
                'user_id' => $user_id,

            ]);

            $invoice_id = $invoice->id;

            foreach ($cartList as $cart) {
                InvoiceProduct::create([
                    'invoice_id' => $invoice_id,
                    'product_id' => $cart->product_id,
                    'user_id' => $user_id,
                    'quantity' => $cart->quantity,
                    'sale_price' => $cart->price
                ]);
            }

            $paymentMethod = SSLCommerz::intrigetionPayment($profile, $payable, $transaction_id, $user_email);

            DB::commit();

            return ResponsHelper::out('success', ['payment_method' => $paymentMethod, 'payable' => $payable, 'vat' => $vat, 'total' => $total, 'transaction_id' => $transaction_id], 200);




        }catch (Exception $e) {
            DB::rollBack();
            return ResponsHelper::out('fail', $e->getMessage(), 200);
        }



    }


    function invoiceList(Request $request){
        $user_id = $request->header('id');
        $data = Invoice::where('user_id', $user_id)->get();

        return ResponsHelper::out('success', $data, 200);
    }


    function invoiceProductList(Request $request){
        $user_id = $request->header('id');
        $invoice_id = $request->invoice_id;

        $data= InvoiceProduct::where(['user_id'=> $user_id, 'invoice_id'=> $invoice_id])->with('product')->get();

        return ResponsHelper::out('success', $data, 200);
    }


    function paymentSuccess(Request $request)
    {
      SSLCommerz::initPaymentSuccess($request->query('tran_id'));
      return redirect('/profile');
    }


    function paymentFail(Request $request)
    {
        SSLCommerz::initPaymentFail($request->query('tran_id'));
        return redirect('/profile');
    }

    function paymentCancel(Request $request)
    {
        SSLCommerz::initPaymentCancel($request->query('tran_id'));
        return redirect('/profile');
    }

    function paymentIpn(Request $request)
    {
       SSLCommerz::initPaymentIpn($request->input('tran_id'), $request->input('status'), $request->input('val_id'));
        return redirect('/profile');
    }



}
