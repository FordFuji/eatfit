<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use App\Models\Order;
use App\Models\OrderPayment;

####### Include
use Auth;
use DB;
use Session;
use Cookie;
use General;
use Socialite;

class EcomThankyouController extends FrontendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('orderid')) {
            $order = Order::with('item')->find(Session::get('orderid'));

            Session::forget('orderid');

            return view('frontend.thankyou')->with('order', $order);
        } else {
            return redirect()->intended(\Request::segment(1));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thankyou(Request $request)
    {
        $locale_id = \Request::segment(1);
        $chargeid = $request->objectId;

        $url = "https://kpaymentgateway-services.kasikornbank.com/card/v2/charge/".$chargeid;

        $secretkey = "";
        if ($locale_id == "en") {
            $secretkey = "";
        } else {
            $secretkey = "";
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'x-api-key: '.$secretkey
            )
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($output);

        Session::forget('cart');
        
        if ($result->status == "success") {
            $order = Order::findOrFail($result->ref_1);

            $payment = new OrderPayment();
            $payment->locale_id = $order->locale_id;
            $payment->order_id = $order->id;
            $payment->status = $result->status;
            $payment->message = json_encode($result);
            $payment->created_at = Now();
            $payment->save();

            // send email
            // $user = \App\Models\Customer::local()->where('customer_id', $order->customer_id)->firstOrFail();
            $sEmail = \App\Models\Email::local()->where('key', 'thank-purchase')->firstOrFail();
            $sData  = [ 'to' => $order->email, 'name' => $order->firstname.' '.$order->lastname, 'order_id' => $order->id];
            $sEmail->SendMail($sData);

            return view('frontend.thankyou')->with('order', $order);
        } else {
            // Order::where('id', $order->id)->delete();
            // OrderItem::where('order_id', $order->id)->delete();

            return redirect()->intended(\Request::segment(1));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//
    }

    public function logout()
    {
       // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        $order = Order::with('item')->find($id);

        return view('frontend.thankyou')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
