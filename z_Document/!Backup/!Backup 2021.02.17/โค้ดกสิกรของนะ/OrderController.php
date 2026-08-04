<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderPayment;
use App\Models\Order2Promotion;
use App\Models\OrderGift;
use App\Models\Frontend\AddressShipping;
use App\Models\Frontend\AddressBilling;

####### Include
use Auth;
use DB;
use Session;

class OrderController extends FrontendController
{
    public function create(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->back();
        }

        $cart = Session::get('cart');

        #region gen orderno
        $year = date("y");
        $month = date('m');
        $number = '000001';
        $lastorder = Order::orderBy('id','desc')->first();
        $inv_prefix = 'PPR'.$year.$month;

        if(is_null($lastorder)) {
            $order_no_gen = $inv_prefix.$number;
        } else {
            $id_last_cha = substr($lastorder->no, 0, 7);
            $id_last_auto = substr($lastorder->no, 7, 6);

            $id_new_gen = intval($id_last_auto) + 1;
            $ordernoauto = str_pad($id_new_gen, 6, '0', STR_PAD_LEFT);

            $order_no_gen = $inv_prefix.$ordernoauto;
        }
        #endregion

        $reference_order = $order_no_gen;

        $shipping = '';
        $firstname = '';
        $lastname = '';
        $tel = '';
        $email = '';

        if ($request->usertype == "guest") {
            $firstname = $request->firstname;
            $lastname = $request->lastname;
            $tel = $request->tel;
            $email = $request->email;
            $shipping = $request->address1.', '.$request->address2.', '.$request->subdistrict.', '.$request->district.', '.$request->city.', '.$request->country.', '.$request->postcode.', '.$request->tel;
        } else {
            $firstname = Auth::user()->firstname;
            $lastname = Auth::user()->lastname;
            $tel = Auth::user()->tel;
            $email = Auth::user()->email;
            #region get shipping and billing
            if (is_null($request->shipping_id)) {
                return redirect()->back();
            } else {
                $shipping = AddressShipping::find($request->shipping_id)->address;
            }
            //$billing = AddressBilling::find($request->billing_id)->firstOrFail();
            #endregion
        }

        $order = new Order();
        $order->locale_id = $request->locale_id;
        $order->customer_id = Auth::check() == true ? Auth::user()->id : null;
        $order->firstname = $firstname;
        $order->lastname = $lastname;
        $order->tel = $tel;
        $order->email = $email;
        $order->no = $order_no_gen;
        $order->amount = $cart->total;
        $order->payment_method = $request->payment;
        $order->promotion_code = $cart->promocode != null ? $cart->promocode['coupon_id'] : null;
        $order->shipping_method = $cart->shipping > 0 ? 1 : 2;
        $order->shipping_price = $cart->promotion['shipping'];
        $order->shipping_address = $shipping;
        $order->is_wrapping = $cart->wrapping;
        $order->wrapping_price = $cart->promotion['wrapping'];;
        $order->date = Now();
        $order->status = 1;
        $order->save();
        \Session::forget('customer');

        $list = [];

        foreach ($cart->items as $item) {
            $list[] = [
                'customer_id' => Auth::check() == true ? Auth::user()->id : null,
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'serial' => $item['serial'],
                'category_id' => $item['category_id'],
                'category_name' => $item['category_name'],
                'collection_id' => $item['collection_id'],
                'collection_name' => $item['collection_name'],
                'product_size_id' => $item['size_id'],
                'size' => $item['size'],
                'unit' => $item['unit'],
                'price_normal' => $item['price'],
                'price_sale' => $item['price'] == $item['price_original'] ? null : $item['price'],
                'price_original' => $item['price_original'],
                'quantity' => $item['qty'],
                'amount' => $item['price'] * $item['qty'],
                'isReview' => 'N',
                'url_review' => explode("shop/", $item['url'])[1],
                'created_at' => Now()
            ];
        }

        OrderItem::insert($list);

        $promolist = [];

        foreach ($cart->promotion['promotion'] as $key => $promotion) {
            $promolist[] = [
                'order_id' => $order->id,
                'category' => $promotion['cat'],
                'promotion_id' => $key,
                'gift_id' => $promotion['gift'],
                'discount' => $promotion['discount'],
                'created_at' => Now()
            ];
        }

        // save promotion
        Order2Promotion::insert($promolist);

        // save gift
        if ($cart->gift != null && count($cart->gift) > 0) {
            $giftlist = [];

            foreach ($cart->gift as $key => $gift) {
                $giftlist[] = [
                    'order_id' => $order->id,
                    'gift_id' => $gift['id'],
                    'qty' => $gift['qty'],
                    'created_at' => Now()
                ];
            }

            OrderGift::insert($giftlist);
        }

        $secretkey = "";
        $additional_data = [];

        if ($request->locale_id == "en") {
            $secretkey = "";
            $additional_data = [
                'mid' => '',
                'tid' => '',
            ];
        } else {
            $secretkey = "";
            $additional_data = [
                'mid' => '',
                'tid' => '',
            ];
        }

        if ($request->payment == 1) {
            // K PAY
            $result = $this->kpay($request->all(), $order->id, $reference_order, $request->amount, $secretkey);
            //$result = $this->kpay($request->all(), $order->id, $reference_order, 1, $secretkey);

            $payment = new OrderPayment();
            $payment->locale_id = $order->locale_id;
            $payment->order_id = $order->id;
            $payment->status = $result->status;
            $payment->message = json_encode($result);
            $payment->created_at = Now();
            $payment->save();

            if ($result->status == 'success') {
                return redirect()->to($result->redirect_url);
            } else {
                Order::where('id', $order->id)->update([
                    'status' => 0,
                    'updated_at' => Now()
                ]);
                // OrderItem::where('order_id', $order->id)->delete();

                Session::forget('cart');

                return redirect()->back();
            }
        } else if ($request->payment == 2 || $request->payment == 3) {

            $url = "https://kpaymentgateway-services.kasikornbank.com/qr/v2/order";

            $source_type = $request->payment == 2 ? 'qr' : 'wechat';

			$total = $cart->total;

            $data = [
                'amount' => $total,
                'currency'=>  'THB',
                'description' => 'LIVE',
                'source_type' => $source_type,
                'reference_order' => $reference_order,
            ];

            $payload = json_encode($data);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_USERPWD, $secretkey);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'x-api-key: '.$secretkey
                )
            );

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($server_output);

            $payment = new OrderPayment();
            $payment->locale_id = $order->locale_id;
            $payment->order_id = $order->id;
            $payment->status = $result->status;
            $payment->message = json_encode($result);
            $payment->created_at = Now();
            $payment->save();

            $qr = $this->createqr($result->id, $reference_order, $total, $secretkey);

            $payment = new OrderPayment();
            $payment->locale_id = $order->locale_id;
            $payment->order_id = $order->id;
            $payment->status = $qr->status;
            $payment->message = json_encode($qr);
            $payment->created_at = Now();
            $payment->save();

            Session::put('orderid', $order->id);

            $data['amount'] = $total;
            $data['order_id'] = $qr->order_id;
            $data['source_type'] = $source_type;

            return view('frontend.payment-qrcode', $data);
        } else if ($request->payment == 4 || $request->payment == 5) {

            $url = "https://kpaymentgateway-services.kasikornbank.com/card/v2/charge";

            $source_type = $request->payment == 4 ? 'alipay' : 'unionpay';

            $data = [
                'amount' => $cart->total,
                'currency'=>  'THB',
                'description' => 'LIVE',
                'source_type' => $source_type,
                'reference_order' => $reference_order,
                'ref_1' => $order->id,
                'mode' => 'token',
                'token' => 'tokn_prod_'.$request->_token,
            ];

            if ($request->payment == 4) {
                $data += [
                    'additional_data' => $additional_data
                ];
            }

            $payload = json_encode($data);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_USERPWD, $secretkey);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'x-api-key: '.$secretkey
                )
            );

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($server_output);

            return redirect()->to($result->redirect_url);
        }
    }

    public function kpay($request, $orderid, $orderno, $amount, $secretkey)
    {
        $token = $request['token'];
        $mid = $request['mid'];
        $paymentMethods = $request['paymentMethods'];

        // $url = "https://dev-kpaymentgateway-services.kasikornbank.com/card/v2/charge";
        $url = "https://kpaymentgateway-services.kasikornbank.com/card/v2/charge";

        $ref_1 = $orderid;

        if ($request['locale_id'] == "en") {
            $additional_data = [
                'mid' => '',
                'tid' => '',
            ];
        } else {
            $additional_data = [
                'mid' => '',
                'tid' => '',
            ];
        }

        $data = [
            'amount' => $amount,
            'currency'=>  'THB',
            'description' => 'LIVE',
            'source_type' => $paymentMethods,
            'mode' => 'token',
            'token' => $token,
            'reference_order' => $orderno,
            'ref_1' => $ref_1,
            //'additional_data' => $additional_data
        ];

        $payload = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $secretkey);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'x-api-key: '.$secretkey
            )
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($server_output);

        return $result;
    }

    public function createqr($orderid, $orderno, $amount, $secretkey)
    {
        $url = "https://kpaymentgateway-services.kasikornbank.com/qr/v2/qr";

        $data = [
            'order_id' => $orderid,
            'amount' => $amount,
            'currency'=>  'THB',
            'description' => 'LIVE',
            'sof' => 'ThaiQR',
            'reference_order' => $orderno,
        ];

        $payload = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $secretkey);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'x-api-key: '.$secretkey
            )
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);

        return json_decode($server_output);
    }
}
