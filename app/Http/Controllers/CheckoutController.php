<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use LiqPay;

class CheckoutController extends Controller
{
    public function checkout()
    {

        return view('store.checkout');
    }
    public function checkoutPayment(Request $request)
    {
        // dd($request);
        $validation = $request->validate([
            'name' => 'required|min:3|max:25',
            'phone' => 'required|numeric',
            'address' => 'required',
            'result_url' => 'checkout-payment-complete',
        ]);



        $order = new Order();
        $order->totalSum = Session::get('totalSum');
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->status_id = 1;
        $order->save();

        Session::put('order_id' , $order->id );

        $liqpay = new LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
        $html = $liqpay->cnb_form(array(
        'action'         => 'pay',
        'amount'         =>  Session::get('totalSum'),
        'currency'       => 'UAH',
        'description'    => 'description text',
        'order_id'       =>  $order->id,
        'version'        => '3'
        ));


        foreach(Session::get('cart') as  $id => $product){
            $orderItem  = new OrderItem();
            $orderItem->order_id = $order->id;

            $orderItem->product_name = $product['name'];
            $orderItem->product_price = $product['price'];
            $orderItem->product_qty = $product['qty'];
            $orderItem->product_img = $product['img'];

            $orderItem->save();

        }
        Cart::clear();


        return view('store.checkout-payment', compact('html'));

    }
    public function checkoutPaymentComplete(Request $request)
    {
        $signature = base64_encode( sha1( env('LIQPAY_PRIVATE_KEY'). $request->data . env('LIQPAY_PRIVATE_KEY'), 1  ));
        // dd($signature,  $request->all());
        if($signature == $request->signature){

            $liqpay = new LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));

            $res = $liqpay->api("request", array(
                'action'        => 'status',
                'version'       => '3',
                'order_id'      => session('order_id'),
            ));


            return view('store.thank');
        }
        // dd($request->all());
    }
}
// FiHHEU030kNv5br9M4ACPQ4ghOE=
//  ejhChXdneJ8y3+orP5kDTohigTU=
// ejhChXdneJ8y3+orP5kDTohigTU=
