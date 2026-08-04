<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Mail;
use Config;
use Session;
use App\Blog;
use App\Wish;
use App\About;
use App\Banner;
use App\Review;
use App\Address;
use App\Contact;
use App\Products;
use App\Question;
use ShoppingCart;
use App\ReviewFile;
use App\PackagePrice;
use App\Tag_products;
use App\TypeQuestion;
use App\Gallery_products;
use App\Delivery_products;
use App\Menu_product_head;
use Illuminate\Http\Request;
use Illuminate\Support\Str ;
use App\Ingredients_products;
use App\Gallery_banner_menu_head;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Mews\Captcha;

class FrontendController extends Controller
{
    /* ตัว Test
    private $key = 'pkey_test_20742AxbGy9OFIa2UY1oj4WddMHXhNJV28BMo';
    private $secret = 'skey_test_20742fDfS8WbmJS0DXa9XOQt1DVVZzdLdbjOY';
    private $url = 'https://dev-kpaymentgateway-services.kasikornbank.com/';
    private $src = 'https://dev-kpaymentgateway.kasikornbank.com/ui/v2/kpayment.min.js';
    private $mcc_mid = '401498374873001';
    private $mcc_tid = '77777129';
    private $url_qr_code = 'https://dev-kpaymentgateway-services.kasikornbank.com/qr/v2/order';
    private $url_qr_code2 = 'https://dev-kpaymentgateway-services.kasikornbank.com/qr/v2/qr';
    ตัว Test */
    
    private $key;
    private $secret;    
    private $url;
    private $src;
    private $mcc_mid;
    private $mcc_tid;
    private $url_qr_code;
    private $url_qr_code2;

    public function __construct() {
        if($_SERVER['SERVER_NAME'] == 'www.eatfitshop.com' or $_SERVER['SERVER_NAME'] == 'eatfitshop.com') {
            $this->key = 'pkey_prod_8604agW3AuoKK43Kei9vh5e4P4S80uAar7m';
            $this->secret = 'skey_prod_8602DoHnzn3EdZnHQVoXCosL0raX9r0hDtY';    
            $this->url = 'https://kpaymentgateway-services.kasikornbank.com/';
            $this->src = 'https://kpaymentgateway.kasikornbank.com/ui/v2/kpayment.min.js';
            $this->mcc_mid = '401012036562001';
            $this->mcc_tid = '74457177';
            $this->url_qr_code = 'https://kpaymentgateway-services.kasikornbank.com/qr/v2/order';
            $this->url_qr_code2 = 'https://kpaymentgateway-services.kasikornbank.com/qr/v2/qr';
        } else {
            $this->key = 'pkey_test_20742AxbGy9OFIa2UY1oj4WddMHXhNJV28BMo';
            $this->secret = 'skey_test_20742fDfS8WbmJS0DXa9XOQt1DVVZzdLdbjOY';
            $this->url = 'https://dev-kpaymentgateway-services.kasikornbank.com/';
            $this->src = 'https://dev-kpaymentgateway.kasikornbank.com/ui/v2/kpayment.min.js';
            $this->mcc_mid = '401498374873001';
            $this->mcc_tid = '77777129';
            $this->url_qr_code = 'https://dev-kpaymentgateway-services.kasikornbank.com/qr/v2/order';
            $this->url_qr_code2 = 'https://dev-kpaymentgateway-services.kasikornbank.com/qr/v2/qr';
        }
    }

    public function request($uri, $fields)
    {   
        $header = array();
        $header[] = "Accept:*/*";
        $header[] = "Content-Type:application/json";
        $header[] = "x-api-key:".$this->secret; 

        $this->curl = curl_init($this->url.$uri);
        curl_setopt($this->curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36');
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($this->curl, CURLOPT_SSLVERSION,1);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_URL, $this->url.$uri);
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($fields));
        $sRow = curl_exec($this->curl);

        $sRow = json_decode($sRow);
        
        return $sRow;
    }

    public function createqr($object_id, $orderno, $amount, $secretkey)
    {
        $data = [
            'order_id' => $object_id,
            'amount' => $amount,
            'currency'=> 'THB',
            'description' => 'LIVE',
            'sof' => 'ThaiQR',
            'reference_order' => $orderno,
        ];

        $payload = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_qr_code2);
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

    public function insertOrderAndOrderDetail(Request $request) {
        // ถ้ามี Promocode ให้หักออก 1 เพราะมีจำกัดจำนวนครั้ง
        if(Session::get('promocode_name') != '') {
            $no = DB::table('lv_promocode')
                ->where('promocode_name', '=', Session::get('promocode_name'))
                ->first();

            if(!empty($no)) {
                $amount = $no->amount_limit;

                --$amount;

                $data = array(
                    'amount_limit' => $amount,
                    'promocode_datetime_update' => date('Y-m-d H:i:s'),
                    'promocode_ip_update' => $_SERVER['REMOTE_ADDR']
                );

                DB::table('lv_promocode')
                    ->where('promocode_name', '=', Session::get('promocode_name'))
                    ->update($data);
            }
        }
        // End  ถ้ามี Promocode ให้หักออก 1 เพราะมีจำกัดจำนวนครั้ง

        $sub_total = 0;
        foreach(ShoppingCart::all() as $r) {
            $price = $r->qty * $r->price;

            $sub_total += $price;
        }

        if(Session::get('promotion') == 'Promotion eatfit') {
            $promotion_complete = DB::table('lv_promotion_complete')
                ->where('promotion_complete_id', '=', '1')
                ->first();

            if(!empty($promotion_complete)) {
                $order_discount = $sub_total * $promotion_complete->promotion_complete_discount / 100;
                if($promotion_complete->promotion_complete_free_shipping == 'Yes') {
                    session(['order_detail_shipping' => 0]);
                }
            }
        } else {
            $order_discount = 0;
        }

        if(!empty(Session::get('discount_point_redeem'))) {
            $order_discount += Session::get('discount_point_redeem');
        }

        if(Session::get('promocode_frontend_discount') != 0 or Session::get('promocode_frontend_discount') != 0.00 or Session::get('promocode_frontend_discount') != '') {
            $order_discount += Session::get('promocode_frontend_discount');
        }

        foreach(ShoppingCart::all() as $r) {
            if($r->redeem_point_type == 'Free Shipping') {
                session(['order_detail_shipping' => 0]);
            }
        }

        $order_detail_total = $sub_total + $request->session()->get('order_detail_shipping') - $order_discount;

        $order_detail_point = $sub_total - $order_discount;

        // บวกเวลา เพิ่ม 1 ชั่วโมง
        /*$timestamp = strtotime(date('H:i')) + 60*60;

        $datetime_upload_slip = date('Y-m-d H:i:s', $timestamp);*/

        if(date('Y-m-d H:i:s') <= date('Y-m-d').' 12:00:00') {
            // ตัดเที่ยงวันนั้น
            $datetime_upload_slip = date('Y-m-d').' 12:00:00';
        } elseif(date('Y-m-d H:i:s') <= date('Y-m-d').' 20:00:00') {
            // ตัดตอน 2 ทุ่ม
            $datetime_upload_slip = date('Y-m-d').' 20:00:00';
        } elseif(date('Y-m-d H:i:s') > date('Y-m-d').' 20:00:00') {
            // ตัดตอน วันถัดไป ตอนเที่ยง
            $datetime_upload_slip = date('Y-m-d', strtotime("+1 days")).' 12:00:00';
        } 

        // end บวกเวลา เพิ่ม 1 ชั่วโมง

        $data_order_detail = array(
            'order_no' => $this->genOrderNo(),
            'member_id' => $request->session()->get('member_id'),
            'promocode_name' => $request->session()->get('promocode_name'),
            'order_detail_sub_total' => $sub_total,
            'order_detail_discount' => $order_discount,
            'order_detail_shipping' => $request->session()->get('order_detail_shipping'),
            'order_detail_total' => $order_detail_total,
            'order_detail_shipping_name' => $request->session()->get('order_detail_shipping_name'),
            'order_detail_shipping_family' => $request->session()->get('order_detail_shipping_family'),
            'order_detail_shipping_email' => $request->session()->get('order_detail_shipping_email'),
            'order_detail_shipping_phone_number' => $request->session()->get('order_detail_shipping_phone_number'),
            'order_detail_shipping_address' => $request->session()->get('order_detail_shipping_address'),
            'order_detail_shipping_province' => $request->session()->get('order_detail_shipping_province'),
            'order_detail_shipping_district' => $request->session()->get('order_detail_shipping_district'),
            'order_detail_shipping_sub_district' => $request->session()->get('order_detail_shipping_sub_district'),
            'order_detail_shipping_postcode' => $request->session()->get('order_detail_shipping_postcode'),
            'order_detail_billing_name' => $request->session()->get('order_detail_billing_name'),
            'order_detail_billing_family' => $request->session()->get('order_detail_billing_family'),
            'order_detail_billing_email' => $request->session()->get('order_detail_billing_email'),
            'order_detail_billing_phone_number' => $request->session()->get('order_detail_billing_phone_number'),
            'order_detail_billing_address' => $request->session()->get('order_detail_billing_address'),
            'order_detail_billing_province' => $request->session()->get('order_detail_billing_province'),
            'order_detail_billing_district' => $request->session()->get('order_detail_billing_district'),
            'order_detail_billing_sub_district' => $request->session()->get('order_detail_billing_sub_district'),
            'order_detail_billing_postcode' => $request->session()->get('order_detail_billing_postcode'),
            'order_detail_shipping_date' => $request->session()->get('order_detail_shipping_date'),
            'order_detail_shipping_time' => $request->session()->get('order_detail_shipping_time'),
            'order_detail_point' => floor($order_detail_point / 100),
            'order_detail_payment_method' => $request->session()->get('order_detail_payment_method'),
            'order_detail_status' => 'Waiting for Payment',
            'order_detail_datetime_create' => date('Y-m-d H:i:s'),
            'order_detail_ip_create' => $_SERVER['REMOTE_ADDR'],
            'order_detail_datetime_update' => date('Y-m-d H:i:s'),
            'order_detail_ip_update' => $_SERVER['REMOTE_ADDR']
        );

        if($request->session()->get('order_detail_payment_method') == 'ATM / Internet Banking') {
            $data_order_detail['order_detail_datetime_upload_slip'] = $datetime_upload_slip;
        }

        if($request->session()->get('order_detail_shipping_date2') != '' or $request->session()->get('order_detail_shipping_date2') != '0000-00-00' and $request->session()->get('order_detail_shipping_time2') != '') {
            $data_order_detail['order_detail_shipping_date2'] = $request->session()->get('order_detail_shipping_date2');
            $data_order_detail['order_detail_shipping_time2'] = $request->session()->get('order_detail_shipping_time2');
        } else {
            $data_order_detail['order_detail_shipping_date2'] = '0000-00-00';
            $data_order_detail['order_detail_shipping_time2'] = '';
        }

        if($request->session()->get('order_detail_shipping_date3') != '' or $request->session()->get('order_detail_shipping_date3') != '0000-00-00' and $request->session()->get('order_detail_shipping_time3') != '') {
            $data_order_detail['order_detail_shipping_date3'] = $request->session()->get('order_detail_shipping_date3');
            $data_order_detail['order_detail_shipping_time3'] = $request->session()->get('order_detail_shipping_time3');
        } else {
            $data_order_detail['order_detail_shipping_date3'] = '0000-00-00';
            $data_order_detail['order_detail_shipping_time3'] = '';
        }

        if($request->session()->get('order_detail_birth_day') != '--') {
            $data_order_detail['order_detail_birth_day'] = $request->session()->get('order_detail_birth_day');
        }

        // promotion 500 บาท ลด 20% ฟรีค่าขนส่ง
        if(Session::get('promotion') == 'Buy 500, get 20% off with free delivery') {
            $data_order_detail['order_detail_promotion_500_get_20_percent_and_free_delivery'] = 'Yes';
        } else {
            $data_order_detail['order_detail_promotion_500_get_20_percent_and_free_delivery'] = 'No';
        }

        // promotion 
        if(Session::get('promotion') == 'Promotion eatfit') {
            $data_order_detail['order_detail_promotion'] = 'Yes';
        } else {
            $data_order_detail['order_detail_promotion'] = 'No';
        }

        // นับจำนวน 3 คนแรก
        $promotion = DB::table('lv_order_detail')
            ->where('order_detail_promotion_15000_before_3_person', '=', 'Yes')
            ->get();

        $count = 0;
        if(!empty($promotion)) {
            $count = count($promotion);
        } 

        if(Session::get('promotion') == 'Buy 15,000 The first 3 people get apple watch' and $count < 3) {
            $data_order_detail['order_detail_promotion_15000_before_3_person'] = 'Yes';
        } else {
            $data_order_detail['order_detail_promotion_15000_before_3_person'] = 'No';
        }

        DB::table('lv_order_detail')->insert($data_order_detail);

        // insert lv_order
        $order_detail = DB::table('lv_order_detail')
            ->orderBy('order_detail_id', 'desc')
            ->first();

        if(!empty($order_detail)) {
            foreach(ShoppingCart::all() as $r) {
                if($r->id == -1) {
                    $data_order = array(
                        'order_detail_id' => $order_detail->order_detail_id,
                        'products_id' => $r->id,
                        'product_redeem' => 'false',
                        'order_name' => $r->name,
                        'order_qty' => $r->qty,
                        'order_price' => $r->price,
                        'order_image' => $r->image,
                        'order_calories' => $r->calories,
                        'order_products_id_1_day' => $r->package1,
                        'order_products_id_2_day' => $r->package2,
                        'order_products_id_3_day' => $r->package3,
                        'order_products_id_4_day' => $r->package4,
                        'order_products_id_5_day' => $r->package5,
                        'order_products_id_6_day' => $r->package6,
                        'order_products_id_7_day' => $r->package7,
                        'order_products_id_8_day' => $r->package8,
                        'order_products_id_9_day' => $r->package9,
                        'order_products_id_10_day' => $r->package10,
                        'order_products_id_11_day' => $r->package11,
                        'order_products_id_12_day' => $r->package12,
                        'order_products_id_13_day' => $r->package13,
                        'order_products_id_14_day' => $r->package14,
                        'order_products_id_15_day' => $r->package15,
                        'order_products_id_16_day' => $r->package16,
                        'order_products_id_17_day' => $r->package17,
                        'order_products_id_18_day' => $r->package18,
                        'order_products_id_19_day' => $r->package19,
                        'order_products_id_20_day' => $r->package20,
                        'order_products_id_21_day' => $r->package21,
                        'order_products_id_22_day' => $r->package22,
                        'order_products_id_23_day' => $r->package23,
                        'order_products_id_24_day' => $r->package24,
                        'order_products_id_25_day' => $r->package25,
                        'order_products_id_26_day' => $r->package26,
                        'order_products_id_27_day' => $r->package27,
                        'order_products_id_28_day' => $r->package28,
                        'order_products_id_29_day' => $r->package29,
                        'order_products_id_30_day' => $r->package30,
                        'order_products_id_31_day' => $r->package31,
                        'order_products_id_32_day' => $r->package32,
                        'order_products_id_33_day' => $r->package33,
                        'order_products_id_34_day' => $r->package34,
                        'order_products_id_35_day' => $r->package35,
                        'order_products_id_36_day' => $r->package36,
                        'order_products_id_37_day' => $r->package37,
                        'order_products_id_38_day' => $r->package38,
                        'order_products_id_39_day' => $r->package39,
                        'order_products_id_40_day' => $r->package40,
                        'order_products_id_41_day' => $r->package41,
                        'order_products_id_42_day' => $r->package42,
                        'order_products_id_43_day' => $r->package43,
                        'order_products_id_44_day' => $r->package44,
                        'order_products_id_45_day' => $r->package45,
                        'order_products_id_46_day' => $r->package46,
                        'order_products_id_47_day' => $r->package47,
                        'order_products_id_48_day' => $r->package48,
                        'order_products_id_49_day' => $r->package49,
                        'order_products_id_50_day' => $r->package50,
                        'order_products_id_51_day' => $r->package51,
                        'order_products_id_52_day' => $r->package52,
                        'order_products_id_53_day' => $r->package53,
                        'order_products_id_54_day' => $r->package54,
                        'order_products_id_55_day' => $r->package55,
                        'order_products_id_56_day' => $r->package56,
                        'order_products_id_57_day' => $r->package57,
                        'order_products_id_58_day' => $r->package58,
                        'order_products_id_59_day' => $r->package59,
                        'order_products_id_60_day' => $r->package60,
                        'order_products_id_61_day' => $r->package61,
                        'order_products_id_62_day' => $r->package62,
                        'order_products_id_63_day' => $r->package63,
                        'order_products_id_64_day' => $r->package64,
                        'order_products_id_65_day' => $r->package65,
                        'order_products_id_66_day' => $r->package66,
                        'order_products_id_67_day' => $r->package67,
                        'order_products_id_68_day' => $r->package68,
                        'order_products_id_69_day' => $r->package69,
                        'order_products_id_70_day' => $r->package70,
                        'order_products_id_71_day' => $r->package71,
                        'order_products_id_72_day' => $r->package72,
                        'order_products_id_73_day' => $r->package73,
                        'order_products_id_74_day' => $r->package74,
                        'order_products_id_75_day' => $r->package75,
                        'order_products_id_76_day' => $r->package76,
                        'order_products_id_77_day' => $r->package77,
                        'order_products_id_78_day' => $r->package78,
                        'order_products_id_79_day' => $r->package79,
                        'order_products_id_80_day' => $r->package80,
                        'order_products_id_81_day' => $r->package81,
                        'order_products_id_82_day' => $r->package82,
                        'order_products_id_83_day' => $r->package83,
                        'order_products_id_84_day' => $r->package84,
                        'order_products_id_85_day' => $r->package85,
                        'order_products_id_86_day' => $r->package86,
                        'order_products_id_87_day' => $r->package87,
                        'order_products_id_88_day' => $r->package88,
                        'order_products_id_89_day' => $r->package89,
                        'order_products_id_90_day' => $r->package90,
                        'order_products_id_91_day' => $r->package91,
                        'order_products_id_92_day' => $r->package92,
                        'order_products_id_93_day' => $r->package93,
                        'order_products_id_94_day' => $r->package94,
                        'order_products_id_95_day' => $r->package95,
                        'order_products_id_96_day' => $r->package96,
                        'order_products_id_97_day' => $r->package97,
                        'order_products_id_98_day' => $r->package98,
                        'order_products_id_99_day' => $r->package99,
                        'order_products_id_100_day' => $r->package100
                    );
                } else {
                    $data_order = array(
                        'order_detail_id' => $order_detail->order_detail_id,
                        'products_id' => $r->id,
                        'point_redeem_discount' => $r->redeem_point_discount.' '.$r->redeem_point_discount_type,
                        'point_redeem_type' => $r->redeem_point_type,
                        'point_redeem' => $r->redeem_point,
                        'product_redeem' => 'true',
                        'order_name' => $r->name,
                        'order_qty' => $r->qty,
                        'order_price' => $r->price,
                        'order_image' => $r->image,
                        'order_calories' => $r->calories,
                        'order_products_id_1_day' => 'false',
                        'order_products_id_2_day' => 'false',
                        'order_products_id_3_day' => 'false',
                        'order_products_id_4_day' => 'false',
                        'order_products_id_5_day' => 'false',
                        'order_products_id_6_day' => 'false',
                        'order_products_id_7_day' => 'false',
                        'order_products_id_8_day' => 'false',
                        'order_products_id_9_day' => 'false',
                        'order_products_id_10_day' => 'false',
                        'order_products_id_11_day' => 'false',
                        'order_products_id_12_day' => 'false',
                        'order_products_id_13_day' => 'false',
                        'order_products_id_14_day' => 'false',
                        'order_products_id_15_day' => 'false',
                        'order_products_id_16_day' => 'false',
                        'order_products_id_17_day' => 'false',
                        'order_products_id_18_day' => 'false',
                        'order_products_id_19_day' => 'false',
                        'order_products_id_20_day' => 'false',
                        'order_products_id_21_day' => 'false',
                        'order_products_id_22_day' => 'false',
                        'order_products_id_23_day' => 'false',
                        'order_products_id_24_day' => 'false',
                        'order_products_id_25_day' => 'false',
                        'order_products_id_26_day' => 'false',
                        'order_products_id_27_day' => 'false',
                        'order_products_id_28_day' => 'false',
                        'order_products_id_29_day' => 'false',
                        'order_products_id_30_day' => 'false',
                        'order_products_id_31_day' => 'false',
                        'order_products_id_32_day' => 'false',
                        'order_products_id_33_day' => 'false',
                        'order_products_id_34_day' => 'false',
                        'order_products_id_35_day' => 'false',
                        'order_products_id_36_day' => 'false',
                        'order_products_id_37_day' => 'false',
                        'order_products_id_38_day' => 'false',
                        'order_products_id_39_day' => 'false',
                        'order_products_id_40_day' => 'false',
                        'order_products_id_41_day' => 'false',
                        'order_products_id_42_day' => 'false',
                        'order_products_id_43_day' => 'false',
                        'order_products_id_44_day' => 'false',
                        'order_products_id_45_day' => 'false',
                        'order_products_id_46_day' => 'false',
                        'order_products_id_47_day' => 'false',
                        'order_products_id_48_day' => 'false',
                        'order_products_id_49_day' => 'false',
                        'order_products_id_50_day' => 'false',
                        'order_products_id_51_day' => 'false',
                        'order_products_id_52_day' => 'false',
                        'order_products_id_53_day' => 'false',
                        'order_products_id_54_day' => 'false',
                        'order_products_id_55_day' => 'false',
                        'order_products_id_56_day' => 'false',
                        'order_products_id_57_day' => 'false',
                        'order_products_id_58_day' => 'false',
                        'order_products_id_59_day' => 'false',
                        'order_products_id_60_day' => 'false',
                        'order_products_id_61_day' => 'false',
                        'order_products_id_62_day' => 'false',
                        'order_products_id_63_day' => 'false',
                        'order_products_id_64_day' => 'false',
                        'order_products_id_65_day' => 'false',
                        'order_products_id_66_day' => 'false',
                        'order_products_id_67_day' => 'false',
                        'order_products_id_68_day' => 'false',
                        'order_products_id_69_day' => 'false',
                        'order_products_id_70_day' => 'false',
                        'order_products_id_71_day' => 'false',
                        'order_products_id_72_day' => 'false',
                        'order_products_id_73_day' => 'false',
                        'order_products_id_74_day' => 'false',
                        'order_products_id_75_day' => 'false',
                        'order_products_id_76_day' => 'false',
                        'order_products_id_77_day' => 'false',
                        'order_products_id_78_day' => 'false',
                        'order_products_id_79_day' => 'false',
                        'order_products_id_80_day' => 'false',
                        'order_products_id_81_day' => 'false',
                        'order_products_id_82_day' => 'false',
                        'order_products_id_83_day' => 'false',
                        'order_products_id_84_day' => 'false',
                        'order_products_id_85_day' => 'false',
                        'order_products_id_86_day' => 'false',
                        'order_products_id_87_day' => 'false',
                        'order_products_id_88_day' => 'false',
                        'order_products_id_89_day' => 'false',
                        'order_products_id_90_day' => 'false',
                        'order_products_id_91_day' => 'false',
                        'order_products_id_92_day' => 'false',
                        'order_products_id_93_day' => 'false',
                        'order_products_id_94_day' => 'false',
                        'order_products_id_95_day' => 'false',
                        'order_products_id_96_day' => 'false',
                        'order_products_id_97_day' => 'false',
                        'order_products_id_98_day' => 'false',
                        'order_products_id_99_day' => 'false',
                        'order_products_id_100_day' => 'false'
                    );
                }

                DB::table('lv_order')->insert($data_order);
            }
        }

        // เอาที่อยู่ที่กรอกมาใส่ใน Table lv_member
        $check_member = DB::table('tb_address')
            ->where('address_regis', '=', $request->session()->get('member_id'))
            ->first();

        if(empty($check_member)) {
            $data_member = array(
                'address_regis' => $request->session()->get('member_id'),
                'address_no' => $request->session()->get('order_detail_shipping_address'),
                'address_province' => $request->session()->get('order_detail_shipping_province'),
                'address_distric' => $request->session()->get('order_detail_shipping_district'),
                'address_sub_distric' => $request->session()->get('order_detail_shipping_sub_district'),
                'address_postcode' => $request->session()->get('order_detail_shipping_postcode'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'address_shipping' => '1'
            );

            DB::table('tb_address')
                ->insert($data_member);

            $data_member = array(
                'member_phone_number' => $request->session()->get('order_detail_billing_phone_number'),
                'member_address' => $request->session()->get('order_detail_shipping_address'),
                'member_province' => $request->session()->get('order_detail_shipping_province'),
                'member_district' => $request->session()->get('order_detail_shipping_district'),
                'member_sub_district' => $request->session()->get('order_detail_shipping_sub_district'),
                'member_postcode' => $request->session()->get('order_detail_shipping_postcode'),
                'member_datetime_create' => date('Y-m-d H:i:s'),
                'member_ip_create' => date('Y-m-d H:i:s'),
                'member_datetime_update' => date('Y-m-d H:i:s'),
                'member_ip_update' => date('Y-m-d H:i:s')
            );

            DB::table('lv_member')
                ->where('member_id', '=', $request->session()->get('member_id'))
                ->update($data_member);
        }

        // End เอาที่อยู่ที่กรอกมาใส่ใน Table lv_member

        ShoppingCart::destroy();
        $request->session()->forget('promotion');
        $request->session()->forget('order_detail_shipping_date_txt');
        $request->session()->forget('promocode_name');
        $request->session()->forget('promocode_discount');
        $request->session()->forget('promocode_type');
        $request->session()->forget('giftset_id');
        $request->session()->forget('promocode_free_shipping');
        $request->session()->forget('promocode_frontend_discount');

        return $order_detail->order_detail_id;
    }

    public function ajaxLoginFacebook(Request $request) {
        $checkMember = DB::table('lv_member')
            ->where('member_email', '=', $request->input('email'))
            ->first();

        if(!empty($checkMember)) {
            // update
            $data = array(
                'member_datetime_update' => date('Y-m-d H:i:s'),
                'member_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            DB::table('lv_member')
                ->where('member_id', '=', $checkMember->member_id)
                ->update($data);

            session(['member_id' => $checkMember->member_id]);
        } else {
            // insert
            $name = explode(' ', $request->input('name'));

            $data = array(
                'member_name' => $name[0],
                'member_family' => $name[1],
                'member_email' => $request->input('email')
            );

            DB::table('lv_member')
                ->insert($data);

            $member = DB::table('lv_member')
                ->orderBy('member_id', 'desc')
                ->first();

            if(!empty($member)) {
                session(['member_id' => $member->member_id]);
            }
        }

        echo 'true';
    }

    public function responseMCC(Request $request) {
        //$this->insertOrderAndOrderDetail($request);
        // Credit Card
        
        $mid = $_POST['mid'];
        $token = $_POST["token"];

        $sData =  array(
            "token" => $token,
            "amount"=> $_POST['amount'],
            "currency" => "THB",
            "description" => $_POST['product'],
            "source_type" => "card",
            "mode" => "token",
            "reference_order" => $_POST['order_no'].'-'.md5(rand())
        );
        
        $sData['additional_data'] = ['mid' => $mid, 'tid' => $this->mcc_tid];
            
        //call charge API with Token
        $response = $this->request('card/v2/charge', $sData);
        
        $data = array(
            'member_id' => $request->session()->get('member_id'),
            'charge_test_mcc' => json_encode($response)
        );

        DB::table('lv_charge')
            ->insert($data);

        //dd($response);

        if(!empty($response->status) and $response->status == "success" and $response->transaction_state == "Pre-Authorized") {

            return redirect($response->redirect_url);
        }
    }

    public function responseQRCode(Request $request) {
        //$this->insertOrderAndOrderDetail($request);

        $data = array(
            'order_detail_status' => 'Order Processing',
            'order_detail_datetime_update' => date('Y-m-d H:i:s'),
            'order_detail_ip_update' => $_SERVER['REMOTE_ADDR']
        );

        DB::table('lv_order_detail')
            ->where('order_no', '=', $_POST['order_no'])
            ->update($data);

        $order_detail_id = DB::table('lv_order_detail')
            ->where('order_no', '=', $_POST['order_no'])
            ->first();

        $order_point = DB::table('lv_order_detail')
            ->where('lv_order_detail.order_no', '=', $_POST['order_no'])
            ->join('lv_order', 'lv_order_detail.order_detail_id', '=', 'lv_order.order_detail_id')
            ->where('lv_order.point_redeem', '<>', '')
            ->first();

        if(!empty($order_point)) {
            $point_ = $order_point->point_redeem;
        } else {
            $point_ = 0;
        }

        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();

        if(!empty($member)) {
            $member_point = $member->member_point + $order_detail_id->order_detail_point - $point_;

            $data = array(
                'member_point' => $member_point,
                'member_datetime_update' => date('Y-m-d H:i:s'),
                'member_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            DB::table('lv_member')
                ->where('member_id', '=', $request->session()->get('member_id'))
                ->update($data);
        }

        $this->SendMailCredit($order_detail_id->order_detail_id);

        return redirect('thankyou/'.$order_detail_id->order_detail_id);
    }

    public function responseUnionPay(Request $request) {
        //$this->insertOrderAndOrderDetail($request);

        $mid = $_POST['mid'];
        $token = $_POST["token"];

        $sData =  array(
            "token" => $token,
            "amount"=> $_POST['amount'],
            "currency" => "THB",
            "description" => $_POST['product'],
            "source_type" => "unionpay",
            "mode" => "redirect",
            "reference_order" => $_POST['order_no'].'-'.md5(rand()),
        );
        
        $sData['additional_data'] = ['mid' => $mid, 'tid' => $this->mcc_tid];
            
        //call charge API with Token
        $response = $this->request('card/v2/charge', $sData);
        
        $data = array(
            'charge_union_pay' => json_encode($response),
            'member_id' => $request->session()->get('member_id')
        );

        DB::table('lv_charge')
            ->insert($data);

        //dd($response);

        if($response->status == "success" and $response->transaction_state == "Initialize") {
            return redirect($response->redirect_url);
        }
    }

    public function unionpay_url() {

        if($_POST['status'] == true) {
            $data = array(
                'charge_tpn' => $_POST['objectId']
            );

            DB::table('lv_charge')
                ->insert($data);

            $check_tpn = DB::select('select * from `lv_charge` where `charge_union_pay` like "%'.$_POST['objectId'].'%" limit 1');

            if($check_tpn[0]) {
                //dd($check_tpn);
                $item_charge = $check_tpn[0];

                $charge_item = json_decode($item_charge->charge_union_pay, true);

                if(!empty($charge_item)) {
                    //echo $charge_item['reference_order'];
                    $order_no_ = explode('-', $charge_item['reference_order']);

                    $data = array(
                        'order_detail_status' => 'Order Processing',
                        'order_detail_datetime_update' => date('Y-m-d H:i:s'),
                        'order_detail_ip_update' => $_SERVER['REMOTE_ADDR']
                    );

                    DB::table('lv_order_detail')
                        ->where('order_no', '=', $order_no_[0])
                        ->update($data);

                    $order_detail = DB::table('lv_order_detail')
                        ->where('order_no', '=', $order_no_[0])
                        ->first();

                    if(!empty($order_detail)) {
                        $member = DB::table('lv_member')
                            ->where('member_id', '=', $item_charge->member_id)
                            ->first();

                        if(!empty($member)) {
                            $order = DB::table('lv_order_detail')
                                ->where('lv_order_detail.order_no', '=', $order_no_[0])
                                ->join('lv_order', 'lv_order_detail.order_detail_id', '=', 'lv_order.order_detail_id')
                                ->where('point_redeem', '<>', '')
                                ->first();

                            if(!empty($order)) {
                                $point_ = $order->point_redeem;
                            } else {
                                $point_ = 0;
                            }

                            $member_point = $member->member_point + $order_detail->order_detail_point - $point_;

                            $data = array(
                                'member_point' => $member_point,
                                'member_datetime_update' => date('Y-m-d H:i:s'),
                                'member_ip_update' => $_SERVER['REMOTE_ADDR']
                            );

                            DB::table('lv_member')
                                ->where('member_id', '=', $item_charge->member_id)
                                ->update($data);
                        }

                        $this->SendMailCredit($order_detail->order_detail_id);

                        return redirect('thankyou/'.$order_detail->order_detail_id);
                    }
                }
            }
        }
    }
    // End ตัดบัตรเครดิต

    public function get2Lang() {
        if(!Session::has('lang')) {
            session(['lang' => 'en']);
        }
        
        if(!empty($_GET['lang']) and $_GET['lang'] == 'th') {
            session(['lang' => 'th']);
        } elseif(!empty($_GET['lang']) and $_GET['lang'] == 'en') {
            session(['lang' => 'en']);
        }

        $current_url = url()->current();

        if($current_url != url('register')) {
            session(['current_url' => $current_url]);
        }

        //dd(ShoppingCart::all());
    }

    public function index(Request $request, $member_id = '')
    {
        $this->get2Lang();

        //dd(Session::all());

        if($member_id != '') {
            $request->session()->put('member_id', $member_id);

            return redirect('index');
        }
        
        $data = array(
            'order_detail_status' => 'Order Canceled',
            'order_detail_datetime_update' => date('Y-m-d H:i:s'),
            'order_detail_ip_update' => $_SERVER['REMOTE_ADDR']
        );

        $checkUploadSlip = DB::table('lv_order_detail')
            ->where('order_detail_payment_method', '=', 'ATM / Internet Banking')
            ->where('order_detail_datetime_upload_slip', '<', date('Y-m-d H:i:s'))
            ->where('order_detail_status', '=', 'Waiting for Payment')
            ->update($data);

        $promotion_text = DB::table('lv_promotion_text')
            ->orderBy('promotion_text_id', 'asc')
            ->get();

        //testSession();
        $review = Review::
        // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
        // leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
        where('review_show','=', '1')
        ->orderBy('review_id','DESC')
        ->get();
        //dd(Session::get('order_detail_shipping_date'));
        
        $about_model = About::first();
        $banner_model = Banner::where('banner_show', '1')->get();

        $blog_last = Blog::orderBy('blog_id','DESC')->first();
        $blog_last_two = Blog::where('blog_id','!=',$blog_last->blog_id)->orderBy('blog_id','DESC')->first();
        $blog_last_three = Blog::where('blog_id','!=',$blog_last->blog_id)
                                ->where('blog_id','!=',$blog_last_two->blog_id)
                                ->orderBy('blog_id','DESC')->first();

        $bestSeller = Products::where('products_bestsellers', '=', 'Yes')
        ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
            ->orderBy('products_id', 'desc')
            ->get();

        $pickYourPlan = DB::table('menu_product_head')
            ->orderBy('menu_product_head_id', 'asc')
            ->get();

        $package_price = new PackagePrice();

        $package_price = $package_price::where('package_price_id', '=', 1)
            ->first();

        if(!empty($package_price)) {
            $package_price_3_day = $package_price->package_price_3_day;
            $package_price_5_day = $package_price->package_price_5_day;
            $package_price_7_day = $package_price->package_price_7_day;
        }

        $promotions = DB::table('products')
        ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
            ->where('price_full', '!=', 'price_sale')
            ->get();

        $menu_product_head = DB::table('menu_product_head')
            ->orderBy('menu_product_head_id', 'asc')
            ->get();

        $banner_promotion = DB::table('lv_banner_promotion')
            ->where('banner_promotion_id', '=', 1)
            ->first();
        
        $data = array(
            'about' => $about_model,
            'banner' => $banner_model,
            'blog_last' => $blog_last,
            'blog_last_two' => $blog_last_two,
            'blog_last_three' => $blog_last_three,
            'bestSeller' => $bestSeller,
            'package_price' => $package_price,
            'package_price_3_day' => $package_price_3_day,
            'package_price_5_day' => $package_price_5_day,
            'package_price_7_day' => $package_price_7_day,
            'pickYourPlan' => $pickYourPlan,
            'promotions' => $promotions,
            'menu_product_head' => $menu_product_head,
            'banner_promotion' => $banner_promotion,
            'review' => $review,
            'package_price' => $package_price,
            'promotion_text' => $promotion_text
        );

        $data['instagram'] = DB::table('lv_instagram')
            ->limit(8)
            ->orderBy('instagram_id', 'desc')
            ->get();

        $data['video_youtube'] = DB::table('lv_video_youtube')
            ->where('video_youtube_id', '=', '1')
            ->first();
        
        $data['review_admin'] = DB::table('lv_review_admin')
            ->orderBy('review_admin_id', 'desc')
            ->get();

        return view('frontend.index',$data);
    }

    public function privacy_policy() {
        $this->get2Lang();

        echo 'Privacy Policy';
    }

    public function remove() {
        //$this->get2Lang();
        
        echo 'Remove';
    }

    public function notify_url() {
        $change_status = DB::table('lv_charge')
            ->where('charge_test_mcc', 'like', '%"'.$_POST['objectId'].'"%')
            ->first();

        $member_id = $change_status->member_id;

        $order_no = json_decode($change_status->charge_test_mcc, true);

        if(!empty($order_no)) {
            //echo $order_no['reference_order'];
            $order_no_ = explode('-', $order_no['reference_order']);

            $data = array(
                'order_detail_status' => 'Order Processing',
                'order_detail_datetime_update' => date('Y-m-d H:i:s'),
                'order_detail_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            DB::table('lv_order_detail')
                ->where('order_no', '=', $order_no_[0])
                ->update($data);

            $order_detail_id = DB::table('lv_order_detail')
                ->where('order_no', '=', $order_no_[0])
                ->first();

            $order = DB::table('lv_order_detail')
                ->where('lv_order_detail.order_no', '=', $order_no_[0])
                ->join('lv_order', 'lv_order_detail.order_detail_id', '=', 'lv_order.order_detail_id')
                ->get();

            $member_point = 0;

            $member_point += $order_detail_id->order_detail_point;

            if(!empty($order)) {
                foreach($order as $r) {
                    if($r->point_redeem != null and $r->point_redeem != '') {
                        $member_point -= $r->point_redeem;
                    }
    
                    /*if($r->product_redeem == 'Redeem Point' or $r->product_redeem == true) {
                        $point = DB::table('lv_point_redeem')
                            ->where('product_id', '=', $r->products_id)
                            ->first();

                        if(!empty($point)) {
                            $point_redeem_point = $point->point_redeem_point;

                            $member = DB::table('lv_member')
                                ->where('member_id', '=', $member_id)
                                ->first();

                            if(!empty($member)) {
                                $member_point -= $point_redeem_point;

                                $data = array(
                                    'member_point' => $member_point,
                                    'member_datetime_update' => date('Y-m-d H:i:s'),
                                    'member_ip_update' => $_SERVER['REMOTE_ADDR']
                                );

                                DB::table('lv_member')
                                    ->where('member_id', '=', $member_id)
                                    ->update($data);
                            }
                        }
                    }*/
                }

                $member = DB::table('lv_member')
                    ->where('member_id', '=', $member_id)
                    ->first();

                if(!empty($member)) {

                    $data = array(
                        'member_point' => $member_point,
                        'member_datetime_update' => date('Y-m-d H:i:s'),
                        'member_ip_update' => $_SERVER['REMOTE_ADDR']
                    );

                    DB::table('lv_member')
                        ->where('member_id', '=', $member_id)
                        ->update($data);
                }

                $this->SendMailCredit($order_detail_id->order_detail_id);
            }

            return redirect('thankyou/'.$order_detail_id->order_detail_id);
        }
    }

    public function unionpay_notify_url() {
        
    }
    
    public function product(Request $request, $id)
    {
        $this->get2Lang();

        $about_model = About::first();
        $menu_sub = Menu_product_head::whereNotIn('menu_product_head_id', [$id])->get();
        $menu_icon = Menu_product_head::where('menu_product_head_id', $id)->first();
        $gallery = Gallery_banner_menu_head::where('menu_product_head_pk', $id)->get();
        $products = Products::where('menu_head_pk', $id)->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
                    // ->where()
                    ->get();

        // Ford
        $product_id = array();
        if(!empty($products)) {
            foreach($products as $r) {
                $product_id[$r->products_id] = $r->products_id; 
            }
        }

        $products = Products::whereIn('products.products_id', $product_id)
                    // ->where()
                    ->get();
        // End Ford

        $menus = DB::table('menu_product_head')
            ->where('menu_product_head_id', '=', $id)
            ->first();

        $data = array(
            'about' => $about_model,
            'menu_sub' => $menu_sub,
            'menu_icon' => $menu_icon,
            'gallery' => $gallery,
            'products' => $products,
            'menus' => $menus,
        );
        // return $menu_sub;

        return view('frontend.products', $data);
    }

    public function product_page(Request $request, $id, $id_products)
    {
        $this->get2Lang();

        //dd(Session::all());

        $products = Products::where('products_id', $id_products)->first();

        if($products->price != '') {
            $products_price = $products->price;
        } elseif($products->price_full != '' and $products->price_sale != '') {
            $products_price = $products->price_sale;
        }

        $tag = Tag_products::where('products_pk', $id_products)->get();
        $gallery = Gallery_products::where('products_pk', $id_products)->get();
        $ingredients = Ingredients_products::where('products_pk', $id_products)->orderBy('ingredient_sort', 'asc')->get();
        $delivery = Delivery_products::where('products_pk', $id_products)->get();

        $id_menu_show_also = Menu_product_head::where('menu_product_head_id', $id)->first();
        $products_also = Products::where('menu_head_pk', $id_menu_show_also->menu_product_head_id)->whereNotIn('products_id',[$id_products])->get();

        $review = Review::
        // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
        leftJoin('products', 'tb_review.review_menu', '=', 'products.products_id')
        ->where('review_menu', $id_products)
        ->where('review_show','=', '1')
        ->orderBy('review_id','DESC')
        ->get();
        $reviewcount = Review::
        // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
        leftJoin('products', 'tb_review.review_menu', '=', 'products.products_id')
        ->where('review_menu', $id_products)
        ->where('review_show','=', '1')
        ->orderBy('review_id','DESC')
        ->count();
        // dd($reviewcount,$review);
        $about_model = About::first();
        $data = array(
            'about' => $about_model,
            'id_menu_show_also' => $id_menu_show_also,
            'products' => $products,
            'tag' => $tag,
            'gallery' => $gallery,
            'ingredients' => $ingredients,
            'delivery' => $delivery,
            'products_also' => $products_also,
            'products_id' => $id_products,
            'review' => $review,
            'reviewcount' => $reviewcount,
            'id' => $id,
            'page_google_tag' => 'google_tag',
            'product_price' => $products_price
        );

        $data['review_admin'] = DB::table('lv_review_admin')
            ->where('products_id', '=', $id_products)
            ->get();

        //dd($data['review_admin']);

        $data['id_products'] = $id_products;

        return view('frontend.product_page', $data);
    }
    public function review_all()
    {
        $this->get2Lang();
        $about_model = About::first();
        
        // $blog = Blog::where('ourproject_type', 'Projects')->paginate(12);
        $review = Review::
                    // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                    leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                    ->orderBy('review_id','DESC')
                    ->where('review_show','=', '1')
                    ->get();
                    // $reviewfile = Review::
                    // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                    // ->leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                    // // ->where('review_file_main', $review->review_id)
                    // ->orderBy('review_id','DESC')
                    // ->get();
        // dd($review);
        $data = array(
            'about' => $about_model,
            'review' => $review,
            // 'reviewfile' => $reviewfile,
        );

        $data['reviewAdmin'] = DB::table('lv_review_admin')
            ->join('products', 'lv_review_admin.products_id', '=', 'products.products_id')
            ->orderBy('lv_review_admin.review_admin_id', 'desc')
            ->get();

        return view('frontend.review_all',$data);
    }
    public function blog()
    {
        $this->get2Lang();

        $about_model = About::first();
        $blog_last = Blog::orderBy('blog_id','DESC')->first();
        $blog_last_two = Blog::where('blog_id','!=',$blog_last->blog_id)->orderBy('blog_id','DESC')->first();
        // $blog = Blog::where('ourproject_type', 'Projects')->paginate(12);
        $blog = Blog::where('blog_id','!=',$blog_last->blog_id)
                    ->where('blog_id','!=',$blog_last_two->blog_id)
                    ->orderBy('blog_id','DESC')
                    ->get();
        // dd($ourproject_model);
        $data = array(
            'about' => $about_model,
            'blog_last' => $blog_last,
            'blog_last_two' => $blog_last_two,
            'blog' => $blog,
        );
        return view('frontend.blog',$data);
    }
    public function blog_detail($id)
    {
        $this->get2Lang();

        $detail = Blog::where('blog_id', $id)->first();
        $Recent = Blog::where('blog_id','!=',$detail->blog_id)
                    ->orderBy('blog_id','DESC')
                    ->get();
        $about_model = About::first();
        $data = array(
            'about' => $about_model,
            'detail' => $detail,
            'Recent' => $Recent,
        );
        return view('frontend.blog-detail',$data);
    }
    public function best_seller()
    {
        $this->get2Lang();

        $best_seller = Products::where('products_bestsellers', '=', 'Yes')
            ->paginate(9);

        $about_model = About::first();

        $data = array(
            'about' => $about_model,
            'best_seller' => $best_seller
        );
        return view('frontend.best_seller',$data);
    }
    public function contact()
    {
        $this->get2Lang();

        $about_model = About::first();
        $data = array(
            'about' => $about_model,
        );

        return view('frontend.contact',$data);
    }

    public function pickyourplan($day) {
        $this->get2Lang();
        
        $productDay1 = DB::table('lv_package')
            ->where('package_id', '=', 1)
            ->first();

        $productDay2 = DB::table('lv_package')
            ->where('package_id', '=', 2)
            ->first();

        $productDay3 = DB::table('lv_package')
            ->where('package_id', '=', 3)
            ->first();

        $productDay4 = DB::table('lv_package')
            ->where('package_id', '=', 4)
            ->first();

        $productDay5 = DB::table('lv_package')
            ->where('package_id', '=', 5)
            ->first();

        $productDay6 = DB::table('lv_package')
            ->where('package_id', '=', 6)
            ->first();

        $productDay7 = DB::table('lv_package')
            ->where('package_id', '=', 7)
            ->first();

        if(!empty($productDay1)) {
            $product_id1_1 = DB::table('products')
                ->where('products_id', '=', $productDay1->product_id1)
                ->first();

            $product_id1_2 = DB::table('products')
                ->where('products_id', '=', $productDay1->product_id2)
                ->first();

            $product_id1_3 = DB::table('products')
                ->where('products_id', '=', $productDay1->product_id3)
                ->first();
        }

        if(!empty($productDay2)) {
            $product_id2_1 = DB::table('products')
                ->where('products_id', '=', $productDay2->product_id1)
                ->first();

            $product_id2_2 = DB::table('products')
                ->where('products_id', '=', $productDay2->product_id2)
                ->first();

            $product_id2_3 = DB::table('products')
                ->where('products_id', '=', $productDay2->product_id3)
                ->first();
        }

        if(!empty($productDay3)) {
            $product_id3_1 = DB::table('products')
                ->where('products_id', '=', $productDay3->product_id1)
                ->first();

            $product_id3_2 = DB::table('products')
                ->where('products_id', '=', $productDay3->product_id2)
                ->first();

            $product_id3_3 = DB::table('products')
                ->where('products_id', '=', $productDay3->product_id3)
                ->first();
        }

        if(!empty($productDay4)) {
            $product_id4_1 = DB::table('products')
                ->where('products_id', '=', $productDay4->product_id1)
                ->first();

            $product_id4_2 = DB::table('products')
                ->where('products_id', '=', $productDay4->product_id2)
                ->first();

            $product_id4_3 = DB::table('products')
                ->where('products_id', '=', $productDay4->product_id3)
                ->first();
        }

        if(!empty($productDay5)) {
            $product_id5_1 = DB::table('products')
                ->where('products_id', '=', $productDay5->product_id1)
                ->first();

            $product_id5_2 = DB::table('products')
                ->where('products_id', '=', $productDay5->product_id2)
                ->first();

            $product_id5_3 = DB::table('products')
                ->where('products_id', '=', $productDay5->product_id3)
                ->first();
        }

        if(!empty($productDay6)) {
            $product_id6_1 = DB::table('products')
                ->where('products_id', '=', $productDay6->product_id1)
                ->first();

            $product_id6_2 = DB::table('products')
                ->where('products_id', '=', $productDay6->product_id2)
                ->first();

            $product_id6_3 = DB::table('products')
                ->where('products_id', '=', $productDay6->product_id3)
                ->first();
        }

        if(!empty($productDay7)) {
            $product_id7_1 = DB::table('products')
                ->where('products_id', '=', $productDay7->product_id1)
                ->first();

            $product_id7_2 = DB::table('products')
                ->where('products_id', '=', $productDay7->product_id2)
                ->first();

            $product_id7_3 = DB::table('products')
                ->where('products_id', '=', $productDay7->product_id3)
                ->first();
        }

        $package_price = new PackagePrice();

        $package_price = $package_price::where('package_price_id', '=', 1)
            ->first();

        if(!empty($package_price)) {
            if($day == 3) {
                $package_price_result = $package_price->package_price_3_day;
                $days_text = '7 Days ';
            } elseif($day == 5) {
                $package_price_result = $package_price->package_price_5_day;
                $days_text = '14 Days ';
            } elseif($day == 7) {
                $package_price_result = $package_price->package_price_7_day;
                $days_text = '1 Month ';
            }
            
        }

        $data = array(
            'day_id' => $day,
            'day' => $days_text,
            'product_id1_1' => $product_id1_1,
            'product_id1_2' => $product_id1_2,
            'product_id1_3' => $product_id1_3,
            'product_id2_1' => $product_id2_1,
            'product_id2_2' => $product_id2_2,
            'product_id2_3' => $product_id2_3,
            'product_id3_1' => $product_id3_1,
            'product_id3_2' => $product_id3_2,
            'product_id3_3' => $product_id3_3,
            'product_id4_1' => $product_id4_1,
            'product_id4_2' => $product_id4_2,
            'product_id4_3' => $product_id4_3,
            'product_id5_1' => $product_id5_1,
            'product_id5_2' => $product_id5_2,
            'product_id5_3' => $product_id5_3,
            'product_id6_1' => $product_id6_1,
            'product_id6_2' => $product_id6_2,
            'product_id6_3' => $product_id6_3,
            'product_id7_1' => $product_id7_1,
            'product_id7_2' => $product_id7_2,
            'product_id7_3' => $product_id7_3,
            'package_price_result' => $package_price_result,
            'package_price' => $package_price
        );

        $data['pick_your_plan'] = DB::table('lv_package')
            ->get();

        return view('frontend.pickyourplan', $data);
    }

    public function sendcontact(Request $request)
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
?>
            <script>alert('Incorrect Captcha');window.location.href="<?php echo url('contact');?>";</script>
<?php
        } else {
            //dd($request);
            $contact = new Contact();
            $contact->contact_form_email = $request->contact_form_email;
            $contact->contact_form_name = $request->contact_form_name;
            $contact->contact_form_phone = $request->contact_form_phone;
            $contact->contact_form_subject = $request->contact_form_subject;
            $contact->contact_form_massage = $request->contact_form_massage;
            //ข้างหน้าชื่อของคอลัม
            //ข้างหลังชื่อของ name input ในฟอร์ม
            $contact->save();

            $data = array(
                'contact' => $contact,
                
            );
            $send = $contact->contact_form_email;
            $sendname = $contact->contact_form_name;
            // Mail::send('backend.mail.sendmail', $data, function ($message) use ($send,$sendname) {
            //     $message->from('eatfitbygourmet.contact@gmail.com', 'eatfit by gourmet primo mail');
            //     $message->to($send, $sendname)->subject('eatfit by gourmet primo mail');
            //     // $message->attach(url2($data['withdraw']->file));
            // });
            if($_SERVER['SERVER_NAME'] == 'localhost') {
                Mail::send('backend.mail.sendmail', $data, function ($message) use ($sendname) {
                    $message->from('eatfitbygourmet.contact@gmail.com', 'eatfit by gourmet primo mail');
                    $message->to('sitiporn@orange-thailand.com')->subject('eatfit by gourmet primo mail');
                    // $message->attach(url2($data['withdraw']->file));
                });
            } else {
                Mail::send('backend.mail.sendmail', $data, function ($message) use ($sendname) {
                    $message->from('eatfitbygourmet.contact@gmail.com', 'eatfit by gourmet primo mail');
                    $message->to('sales@gourmetprimo.com')->subject('eatfit by gourmet primo mail');
                    // $message->attach(url2($data['withdraw']->file));
                });
            }

            return redirect('contact');
        }
        
            

        /*Mail::send('backend.mail.sendmail', $data, function ($message) use ($sendname) {
            $message->from('eatfitbygourmet.contact@gmail.com', 'eatfit by gourmet primo mail');
            $message->to('saran17tk@gmail.com')->subject('eatfit by gourmet primo mail');
            // $message->attach(url2($data['withdraw']->file));
        });

        Mail::send('backend.mail.sendmail', $data, function ($message) use ($sendname) {
            $message->from('eatfitbygourmet.contact@gmail.com', 'eatfit by gourmet primo mail');
            $message->to('lalita@orange-thailand.com')->subject('eatfit by gourmet primo mail');
            // $message->attach(url2($data['withdraw']->file));
        });*/
        // Session::flash('status', 'บันทึกข้อมูลเรียบร้อย!');
        
    }
    public function register(Request $request)
    {
        if($request->session()->get('member_id') != '') {
            return redirect('cart');
        }

        $this->get2Lang();

        $error1 = '';
        $error2 = '';

        if(!empty($_GET['lang']) and $_GET['lang'] == 'Incorrect Confirm Password') {
            $error1 = 'Incorrect Confirm Password';
        }

        if(!empty($_GET['lang']) and $_GET['lang'] == 'Email is Already') {
            $error2 = 'Email is Already';
        }

        $province = DB::table('lv_province')
            ->orderBy('province_name_en', 'ASC')
            ->get();

        $data = array(
            'province' => $province,
            'error1' => $error1,
            'error2' => $error2
        );
        
        return view('frontend.register',$data);
    }
    public function forgotpassword()
    {
        $this->get2Lang();

        $about_model = About::first();
        $data = array(
            'about' => $about_model,
        );
        return view('frontend.forgotpassword',$data);
    }
    public function sendforgotpassword(Request $request)
    {

        $pass = Str::random(12);
        $mail =  DB::table('lv_member')->where('member_email', $request->forgotpassword)->first();
        if ($mail != '') {
            $forgot = DB::table('lv_member')->where('member_email', $request->forgotpassword)->update(['member_password' =>  $pass]);
        } else {
            return redirect('/forgotpassword');
        }
        
       
        // $forgot =  DB::table('lv_member')->where('member_email', $request->forgotpassword)->first();
        // // $forgot->member_password = Hash::make($pass);
        // $forgot->member_password = $pass;
        // $forgot->save();


        $rgister = DB::table('lv_member')
        ->where('member_email', $request->forgotpassword)
        ->first();
        $data = array(
            'rgister' => $rgister,
            'pass' => $pass
        );

        $sendname = $rgister->member_email;

        Mail::send('backend.mail.mailrepassuser', $data, function ($message) use ($sendname) {
            $message->from('eatfitbygourmet.contact@gmail.com', 'eatfit by gourmet primo mail');
            $message->to($sendname)->subject('eatfit by gourmet primo mail');
            // $message->attach(url2($data['withdraw']->file));
        });
        // dd($forgot,$pass );
        // Mail::send('backend.mail.mailrepassuser', $data, function ($message) use ($sendname) {
        //     $message->from('eatfitbygourmet.contact@gmail.com', 'eatfit by gourmet primo mail');
        //     $message->to('customerrelation@gourmetprimo.com')->subject('eatfit by gourmet primo mail');
        //     // $message->attach(url2($data['withdraw']->file));
        // });
        // Session::flash('status', 'บันทึกข้อมูลเรียบร้อย!');
        return redirect('/');
    }
    public function faqs()
    {
        $this->get2Lang();
        
        $typequestion = TypeQuestion::orderBy('updated_at','ASC')->get();
        $Last = TypeQuestion::orderBy('updated_at','ASC')->first();
        // $question = Question::orderBy('updated_at','DESC')->get();
        $questionTYPE = TypeQuestion::leftJoin('tb_question', 'tb_type_question.type_question_id', '=', 'tb_question.question_type')->get();
        $about_model = About::first();
        $id = $Last->type_question_id;
        //$TTYYPP = TypeQuestion::where('type_question_id', '=', $id)->first();
        $TTYYPP = TypeQuestion::orderBy('updated_at','ASC')->get();
        $question = Question::where('question_type', '=', $id)->where('question_show', '=', '1')->orderBy('updated_at','ASC')->get();
        $data = array(
            'about' => $about_model,
            'question' => $question,
            'typequestion' => $typequestion,
            'questionTYPE' => $questionTYPE,
            'id' => $id,
            'TTYYPP' => $TTYYPP,
        );

        return view('frontend.faqs',$data);
    }
    public function faqsAW($id)
    {
        $this->get2Lang();
        $id = $id;
        $typequestion = TypeQuestion::orderBy('updated_at','ASC')->get();
        $TTYYPP = TypeQuestion::where('type_question_id', '=', $id)->first();
        $question = Question::where('question_type', '=', $id)->where('question_show', '=', '1')->orderBy('updated_at','ASC')->get();
        $questionTYPE = TypeQuestion::leftJoin('tb_question', 'tb_type_question.type_question_id', '=', 'tb_question.question_type')->get();
        $about_model = About::first();
        $data = array(
            'about' => $about_model,
            'question' => $question,
            'typequestion' => $typequestion,
            'questionTYPE' => $questionTYPE,
            'id' => $id,
            'TTYYPP' => $TTYYPP,
        );

        return view('frontend.faqs',$data);
    }
    public function BMI()
    {
        $this->get2Lang();

        $BMI = '0';
        $Categories = 'Categories';
        $about_model = About::first();
        $FOOD = '';
        $data = array(
            'BMI' => $BMI,
            'about' => $about_model,
            'Categories' => $Categories,
            'FOOD' => $FOOD,
        );
        return view('frontend.BMI',$data);
    }
    public function BMIresult(Request $request)
    {
        //$this->get2Lang();
        
        // dd($request);
        $BMI = $request->Weight / (($request->Height / 100)*($request->Height / 100));

        if($BMI < 18.5){
            $Categories = 'Underweight';
            if ($request->Gender == 'Male') {
                $FOOD = Products::where('calories_products', '<', '2000')
                ->where('calories_products', '<=', '2200')
                ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
                ->groupBy('products.products_id')
                ->get();
            } else {
                $FOOD = Products::where('calories_products', '<', '1500')
                ->where('calories_products', '<=', '1700')
                ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
                ->groupBy('products.products_id')
                ->get();
            }
        }elseif($BMI >= 18.5 && $BMI < 25){
            $Categories = 'Normal weight';
            if ($request->Gender == 'Male') {
                $FOOD = Products::where('calories_products', '<', '2000')
                ->where('calories_products', '<=', '2200')
                ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
                ->groupBy('products.products_id')
                ->get();
            } else {
                $FOOD = Products::where('calories_products', '<', '1500')
                ->where('calories_products', '<=', '1700')
                ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
                ->groupBy('products.products_id')
                ->get();
            }
        }elseif($BMI >= 25 && $BMI < 30){
            $Categories = 'Overweight';
            if ($request->Gender == 'Male') {
                $FOOD = Products::where('calories_products', '<', '1500')
                ->where('calories_products', '<=', '1700')
                ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
                ->groupBy('products.products_id')
                ->get();
            } else {
                $FOOD = Products::where('calories_products', '<', '1200')
                ->where('calories_products', '<=', '1300')
                ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
                ->groupBy('products.products_id')
                ->get();
            }
        }elseif($BMI >=30 ){
            $Categories = 'Obesity';
            if ($request->Gender == 'Male') {
                $FOOD = Products::where('calories_products', '<', '1500')
                ->where('calories_products', '<=', '1700')
                ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
                ->groupBy('products.products_id')
                ->get();
            } else {
                $FOOD = Products::where('calories_products', '<', '1200')
                ->where('calories_products', '<=', '1300')
                ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
                ->groupBy('products.products_id')
                ->get();
            }
        }else{
            $Categories = 'Categories';
            $FOOD = '';
        }
        
        // dd($Categories,$FOOD);
        $about_model = About::first();
        $data = array(
            'about' => $about_model,
            'BMI' => $BMI,
            'Categories' => $Categories,
            'FOOD' => $FOOD,
        );
        return view('frontend.BMI',$data);
    }

    public function bestSeller() {
        $this->get2Lang();
        
        return view('frontend.best_seller');
    }

    public function cart(Request $request) {
        /*if($request->session()->get('member_id') == '') {
            return redirect('register');
        }*/
        
        //dd(Session::all());
        
        $this->get2Lang();

        $data['promotion_by_product'] = DB::table('lv_promotion_by_product')
            ->where('promotion_by_product_id', '=', '1')
            ->first();
        
        return view('frontend.cart', $data);
    }

    public function cartLogin(Request $request) {
        if($request->session()->get('member_id') != '') {
            return redirect('cart');
        }

        return view('frontend.cart_login');
    }

    public function ajaxCheckMemberSession(Request $request) {
        if($request->session()->get('member_id') != '') {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function cartShipping(Request $request) {
        if($request->session()->get('member_id') == '') {
            return redirect('register');
        }

        //dd(Session::all());

        if(empty(ShoppingCart::all())) {
            return redirect('cart');
        }

        $this->get2Lang();

        $promotion_complete = DB::table('lv_promotion_complete')
            ->where('promotion_complete_id', '=', '1')
            ->first();
        
        $member_shipping_address = DB::table('tb_address')
            ->where('tb_address.address_regis', '=', $request->session()->get('member_id'))
            ->first();

        if(!empty($member_shipping_address)) {
            $shipping_address = DB::table('lv_member')
                ->join('tb_address', 'lv_member.member_id', '=', 'tb_address.address_regis')
                ->orderBy('tb_address.address_id', 'desc')
                ->where('tb_address.address_regis', '=', $request->session()->get('member_id'))
                ->first();
        } else {
            $member_address = DB::table('lv_member')
                ->where('lv_member.member_id', '=', $request->session()->get('member_id'))
                ->first();
        }

        $send2time = false;
        foreach(ShoppingCart::all() as $r) {
            if($r->name == 'Package 5 Days') {
                $send2time = true;
            }
        }

        $send3time = false;
        foreach(ShoppingCart::all() as $r) {
            if($r->name == 'Package 7 Days') {
                $send3time = true;
            }
        }

        $promotion_complete = DB::table('lv_promotion_complete')
            ->where('promotion_complete_id', '=', '1')
            ->first();
        
        $province = DB::table('lv_province')
            ->orderBy('province_id', 'asc')
            ->get();

        $data = array(
            'province' => $province,
            'send2time' => $send2time,
            'send3time' => $send3time,
            'promotion_complete' => $promotion_complete
        );

        if(!empty($shipping_address)) {
            $data['shipping_address'] = $shipping_address;
        }

        if(!empty($member_address)) {
            $data['member_address'] = $member_address;
        }

        return view('frontend.cart-shipping', $data);
    }

    public function ajaxShipping(Request $request) {
        if($request->input('order_detail_shipping_date') == 'tomorrow') {
            $request->session()->forget('order_detail_shipping_date_txt');
            $request->session()->put('order_detail_shipping_date_txt', 'tomorrow');

            $request->session()->forget('order_detail_shipping_date');
            $request->session()->put('order_detail_shipping_date', date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d')))));

            $request->session()->forget('order_detail_shipping_date2');
            $request->session()->forget('order_detail_shipping_time2');
        } else {
            $request->session()->forget('order_detail_shipping_date_txt');
            $request->session()->put('order_detail_shipping_date_txt', 'other');

            $request->session()->forget('order_detail_shipping_date');
            $request->session()->put('order_detail_shipping_date', getDatepicker2DateDatabase($request->input('order_detail_shipping_date')));

            if(!empty($request->input('order_detail_shipping_date2'))) {
                $request->session()->forget('order_detail_shipping_date2');
                $request->session()->put('order_detail_shipping_date2', getDatepicker2DateDatabase($request->input('order_detail_shipping_date2'))); 

                $request->session()->forget('order_detail_shipping_time2');
                $request->session()->put('order_detail_shipping_time2', $request->input('order_detail_shipping_time2'));
                
                $request->session()->forget('order_detail_shipping_date_other_txt2');
                $request->session()->put('order_detail_shipping_date_other_txt2', $request->input('order_detail_shipping_date2')); 
            } else {
                $request->session()->forget('order_detail_shipping_date2');
                $request->session()->forget('order_detail_shipping_time2');
                $request->session()->forget('order_detail_shipping_date_other_txt2');
            }

            if(!empty($request->input('order_detail_shipping_date3'))) {
                $request->session()->forget('order_detail_shipping_date3');
                $request->session()->put('order_detail_shipping_date3', getDatepicker2DateDatabase($request->input('order_detail_shipping_date3'))); 

                $request->session()->forget('order_detail_shipping_time3');
                $request->session()->put('order_detail_shipping_time3', $request->input('order_detail_shipping_time3'));
                
                $request->session()->forget('order_detail_shipping_date_other_txt3');
                $request->session()->put('order_detail_shipping_date_other_txt3', $request->input('order_detail_shipping_date3')); 
            } else {
                $request->session()->forget('order_detail_shipping_date3');
                $request->session()->forget('order_detail_shipping_time3');
                $request->session()->forget('order_detail_shipping_date_other_txt3');
            }

            $request->session()->forget('order_detail_shipping_date_other_txt');
            $request->session()->put('order_detail_shipping_date_other_txt', $request->input('order_detail_shipping_date'));
            
        }

        if($request->input('type_shipping_address') == 'sameaddship') {
            $request->session()->forget('type_shipping_address');
            $request->session()->put('type_shipping_address', true);

            $member_shipping_address = DB::table('tb_address')
                ->where('tb_address.address_regis', '=', $request->session()->get('member_id'))
                ->first();

            if(!empty($member_shipping_address)) {
                $shipping_address = DB::table('lv_member')
                    ->join('tb_address', 'lv_member.member_id', '=', 'tb_address.address_regis')
                    ->orderBy('tb_address.address_id', 'desc')
                    ->where('tb_address.address_regis', '=', $request->session()->get('member_id'))
                    ->first();
                $request->session()->forget('order_detail_shipping_name');
                $request->session()->put('order_detail_shipping_name', $shipping_address->member_name);

                $request->session()->forget('order_detail_shipping_family');
                $request->session()->put('order_detail_shipping_family', $shipping_address->member_family);

                $request->session()->forget('order_detail_birth_day');
                $request->session()->put('order_detail_birth_day', $shipping_address->member_birth_day);

                $request->session()->forget('order_detail_shipping_email');
                $request->session()->put('order_detail_shipping_email', $shipping_address->member_email);

                $request->session()->forget('order_detail_shipping_phone_number');
                $request->session()->put('order_detail_shipping_phone_number', $shipping_address->member_phone_number);

                $request->session()->forget('order_detail_shipping_address');
                $request->session()->put('order_detail_shipping_address', $shipping_address->address_no);

                $request->session()->forget('order_detail_shipping_province');
                $request->session()->put('order_detail_shipping_province', $shipping_address->address_province);

                $request->session()->forget('order_detail_shipping_district');
                $request->session()->put('order_detail_shipping_district', $shipping_address->address_distric);

                $request->session()->forget('order_detail_shipping_sub_district');
                $request->session()->put('order_detail_shipping_sub_district', $shipping_address->address_sub_distric);

                $request->session()->forget('order_detail_shipping_postcode');
                $request->session()->put('order_detail_shipping_postcode', $shipping_address->address_postcode);
                //$request->session()->put('order_detail_shipping_date', $request->input('order_detail_shipping_date'));

                $request->session()->forget('order_detail_shipping_time');
                $request->session()->put('order_detail_shipping_time', $request->input('order_detail_shipping_time'));   
            } else {
                $member_address = DB::table('lv_member')
                    ->where('lv_member.member_id', '=', $request->session()->get('member_id'))
                    ->first();

                $request->session()->forget('order_detail_shipping_name');
                $request->session()->put('order_detail_shipping_name', $member_address->member_name);

                $request->session()->forget('order_detail_shipping_family');
                $request->session()->put('order_detail_shipping_family', $member_address->member_family);

                $request->session()->forget('order_detail_birth_day');
                $request->session()->put('order_detail_birth_day', $member_address->member_birth_day);

                $request->session()->forget('order_detail_shipping_email');
                $request->session()->put('order_detail_shipping_email', $member_address->member_email);

                $request->session()->forget('order_detail_shipping_phone_number');
                $request->session()->put('order_detail_shipping_phone_number', $member_address->member_phone_number);

                $request->session()->forget('order_detail_shipping_address');
                $request->session()->put('order_detail_shipping_address', $member_address->member_address);

                $request->session()->forget('order_detail_shipping_province');
                $request->session()->put('order_detail_shipping_province', $member_address->member_province);

                $request->session()->forget('order_detail_shipping_district');
                $request->session()->put('order_detail_shipping_district', $member_address->member_district);

                $request->session()->forget('order_detail_shipping_sub_district');
                $request->session()->put('order_detail_shipping_sub_district', $member_address->member_sub_district);

                $request->session()->forget('order_detail_shipping_postcode');
                $request->session()->put('order_detail_shipping_postcode', $member_address->member_postcode);
                //$request->session()->put('order_detail_shipping_date', $request->input('order_detail_shipping_date'));

                $request->session()->forget('order_detail_shipping_time');
                $request->session()->put('order_detail_shipping_time', $request->input('order_detail_shipping_time')); 
            }
        } elseif($request->input('type_shipping_address') == 'newaddship') {
            $request->session()->forget('type_shipping_address');
            $request->session()->put('type_shipping_address', false);

            $request->session()->forget('order_detail_shipping_name');
            $request->session()->put('order_detail_shipping_name', $request->input('order_detail_shipping_name'));

            $request->session()->forget('order_detail_shipping_family');
            $request->session()->put('order_detail_shipping_family', $request->input('order_detail_shipping_family'));

            $request->session()->forget('order_detail_birth_day');
            $request->session()->put('order_detail_birth_day', $request->input('birth_year').'-'.$request->input('birth_month').'-'.$request->input('birth_day'));

            $request->session()->forget('order_detail_shipping_email');
            $request->session()->put('order_detail_shipping_email', $request->input('order_detail_shipping_email'));

            $request->session()->forget('order_detail_shipping_phone_number');
            $request->session()->put('order_detail_shipping_phone_number', $request->input('order_detail_shipping_phone_number'));

            $request->session()->forget('order_detail_shipping_address');
            $request->session()->put('order_detail_shipping_address', $request->input('order_detail_shipping_address'));

            $request->session()->forget('order_detail_shipping_province');
            $request->session()->put('order_detail_shipping_province', $request->input('order_detail_shipping_province'));

            $request->session()->forget('order_detail_shipping_district');
            $request->session()->put('order_detail_shipping_district', $request->input('order_detail_shipping_district'));

            $request->session()->forget('order_detail_shipping_sub_district');
            $request->session()->put('order_detail_shipping_sub_district', $request->input('order_detail_shipping_sub_district'));

            $request->session()->forget('order_detail_shipping_postcode');
            $request->session()->put('order_detail_shipping_postcode', $request->input('order_detail_shipping_postcode'));
            //$request->session()->put('order_detail_shipping_date', $request->input('order_detail_shipping_date'));

            $request->session()->forget('order_detail_shipping_time');
            $request->session()->put('order_detail_shipping_time', $request->input('order_detail_shipping_time'));   
        }

        if($request->input('billing_address') == 'same') {
            $request->session()->forget('order_detail_billing_name');
            $request->session()->put('order_detail_billing_name', $request->session()->get('order_detail_shipping_name'));

            $request->session()->forget('order_detail_billing_family');
            $request->session()->put('order_detail_billing_family', $request->session()->get('order_detail_shipping_family'));

            $request->session()->forget('order_detail_billing_email');
            $request->session()->put('order_detail_billing_email', $request->session()->get('order_detail_shipping_email'));
            
            $request->session()->forget('order_detail_billing_phone_number');
            $request->session()->put('order_detail_billing_phone_number', $request->session()->get('order_detail_shipping_phone_number'));

            $request->session()->forget('order_detail_billing_address');
            $request->session()->put('order_detail_billing_address', $request->session()->get('order_detail_shipping_address'));

            $request->session()->forget('order_detail_billing_province');
            $request->session()->put('order_detail_billing_province', $request->session()->get('order_detail_shipping_province'));

            $request->session()->forget('order_detail_billing_district');
            $request->session()->put('order_detail_billing_district', $request->session()->get('order_detail_shipping_district'));

            $request->session()->forget('order_detail_billing_sub_district');
            $request->session()->put('order_detail_billing_sub_district', $request->session()->get('order_detail_shipping_sub_district'));

            $request->session()->forget('order_detail_billing_postcode');
            $request->session()->put('order_detail_billing_postcode', $request->session()->get('order_detail_shipping_postcode'));
        } elseif($request->input('billing_address') == 'unsame') {
            $request->session()->forget('order_detail_billing_name');
            $request->session()->put('order_detail_billing_name', $request->input('order_detail_billing_name'));

            $request->session()->forget('order_detail_billing_family');
            $request->session()->put('order_detail_billing_family', $request->input('order_detail_billing_family'));

            $request->session()->forget('order_detail_billing_email');
            $request->session()->put('order_detail_billing_email', $request->input('order_detail_billing_email'));

            $request->session()->forget('order_detail_billing_phone_number');
            $request->session()->put('order_detail_billing_phone_number', $request->input('order_detail_billing_phone_number'));

            $request->session()->forget('order_detail_billing_address');
            $request->session()->put('order_detail_billing_address', $request->input('order_detail_billing_address'));

            $request->session()->forget('order_detail_billing_province');
            $request->session()->put('order_detail_billing_province', $request->input('order_detail_billing_province'));

            $request->session()->forget('order_detail_billing_district');
            $request->session()->put('order_detail_billing_district', $request->input('order_detail_billing_district'));

            $request->session()->forget('order_detail_billing_sub_district');
            $request->session()->put('order_detail_billing_sub_district', $request->input('order_detail_billing_sub_district'));

            $request->session()->forget('order_detail_billing_postcode');
            $request->session()->put('order_detail_billing_postcode', $request->input('order_detail_billing_postcode'));
        }

        $request->session()->forget('billing_address');
        $request->session()->put('billing_address', $request->input('billing_address'));

        //$request->session()->forget('order_detail_birth_day');
        //$request->session()->put('order_detail_birth_day', $request->session()->get('order_detail_birth_day');

        $shipping_price = DB::table('lv_tumbol')
            ->join('lv_amphur', 'lv_tumbol.amphur_id', '=', 'lv_amphur.amphur_id')
            ->join('lv_province', 'lv_amphur.province_id', '=', 'lv_province.province_id')
            ->whereRaw('(lv_province.province_name_th = "'.$request->session()->get('order_detail_shipping_province').'" or lv_province.province_name_en = "'.$request->session()->get('order_detail_shipping_province').'") and (lv_amphur.amphur_name_th = "'.$request->session()->get('order_detail_shipping_district').'" or lv_amphur.amphur_name_en = "'.$request->session()->get('order_detail_shipping_district').'") and (lv_tumbol.tumbol_name_th = "'.$request->session()->get('order_detail_shipping_sub_district').'" or lv_tumbol.tumbol_name_en = "'.$request->session()->get('order_detail_shipping_sub_district').'")')
            ->first();

        $free_shipping = false;
        foreach(ShoppingCart::all() as $r) {
            if($r->redeem_point_type == 'Free Shipping') {
                $free_shipping = true;
            }
        }

        //dd($shipping_price);
        

        if(Session::get('promotion') == 'Promotion eatfit' or $free_shipping == true or Session::get('promotion_by_product_free_shipping') == true) {
            $request->session()->forget('order_detail_shipping');
            $request->session()->put('order_detail_shipping', '0');
        } else {
            if(!empty($shipping_price)) {
                $row_shipping = DB::table('lv_tumbol')
                    ->where('tumbol_name_en', '=', $shipping_price->tumbol_name_en)
                    ->first();

                $request->session()->forget('order_detail_shipping');
                $request->session()->put('order_detail_shipping', $shipping_price->tumbol_shipping);

                //dd(Session::get('order_detail_shipping'));
            }
        }
    }

    public function cartPayment(Request $request, $type = '') {
        if($request->session()->get('member_id') == '') {
            return redirect('register');
        }

        if(empty(ShoppingCart::all())) {
            return redirect('cart');
        }

        $this->get2Lang();

        //dd(Session::all());
        
        $data = array(
            'type' => $type
        );

        return view('frontend.cart-payment', $data);
    }

    public function ajaxPaymentMethod(Request $request) {
        session(['order_detail_payment_method' => $request->order_detail_payment_method]);
    }

    public function cartSummary(Request $request) {
        if($request->session()->get('member_id') == '') {
            return redirect('register');
        }

        if(empty(ShoppingCart::all())) {
            return redirect('cart');
        }

        $this->get2Lang();
        //dd(Session::all());

        $sub_total = 0;
        foreach(ShoppingCart::all() as $r) {
            if($r->redeem_point != 'Redeem Point') {
                $price = $r->qty * $r->price;

                $sub_total += $price;
            }
        }

        if(Session::get('promotion') == 'Promotion eatfit') {
            $promotion_complete = DB::table('lv_promotion_complete')
                ->where('promotion_complete_id', '=', '1')
                ->first();
            if(!empty($promotion_complete)) {
                $order_discount = $sub_total * $promotion_complete->promotion_complete_discount / 100;
                if($promotion_complete->promotion_complete_free_shipping == 'Yes') {
                    session(['order_detail_shipping' => '0']);
                }
            }
        } else {
            $order_discount = 0;
        }
      
        if(!empty(Session::get('discount_point_redeem'))) {
            $order_discount += Session::get('discount_point_redeem');
        }
      
        $order_detail_total = $sub_total + Session::get('order_detail_shipping') - $order_discount;

        $data = array(
            'src' => $this->src,
            'key' => $this->key,
            'mcc_mid' => $this->mcc_mid,
        );

        $reference_order = md5(rand());
        $data2 = [
            'amount' => number_format($order_detail_total, 2, '.', ''), //จำนวนเงินที่ชำระ
            'currency'=>  'THB',
            'description' => 'Order eatfit',
            'source_type' => 'qr',
            'reference_order' => $reference_order, //รหัสใบสั่งซื้อ
        ];

        $payload = json_encode($data2);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_qr_code);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secret);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'x-api-key: '.$this->secret
            )
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
 
        $result = json_decode($server_output);
 
        //dd($result);

        $qr = $this->createqr($result->id, $reference_order, number_format($order_detail_total, 2, '.', ''), $this->secret); //เรียกใช้ฟังก์ชั่น createqr

        //dd($qr);

        $data['order_id'] = $qr->order_id;

        $data['order_no'] = $this->genOrderNo();

        return view('frontend.cart-summary', $data);
    }

    public function ajaxCalories(Request $request) {
        //dd($request->package_);

        $calories = 0;
        foreach($request->package_ as $package) {
            //echo $package;

            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', $package)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        echo number_format($calories, 0, '.', ',');
    }

    public function ajaxInsertCartPackage(Request $request) {
        $package_price = DB::table('lv_package_price')
            ->where('package_price_id', '=', 1)
            ->first();
        
        if(!empty($package_price)) {
            if($request->input('day') == 3) {
                $product_name = 'Package 3 Days';
                $price = $package_price->package_price_3_day;
                $image = $package_price->package_price3_image;
            } elseif($request->input('day') == 5) {
                $product_name = 'Package 5 Days';
                $price = $package_price->package_price_5_day;
                $image = $package_price->package_price5_image;
            } elseif($request->input('day') == 7) {
                $product_name = 'Package 7 Days';
                $price = $package_price->package_price_7_day;
                $image = $package_price->package_price7_image;
            }
        }

        $calories = 0;

        if($request->input('package1') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 1)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package2') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 2)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package3') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 3)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package4') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 4)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package5') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 5)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package6') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 6)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package7') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 7)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package8') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 8)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package9') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 9)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package10') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 10)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package11') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 11)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package12') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 12)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package13') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 13)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package14') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 14)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package15') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 15)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package16') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 16)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package17') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 17)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package18') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 18)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package19') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 19)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package20') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 20)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package21') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 21)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package22') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 22)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package23') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 23)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package24') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 24)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package25') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 25)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package26') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 26)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package27') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 27)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package28') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 28)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package29') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 29)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package30') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 30)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package31') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 31)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package32') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 32)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package33') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 33)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package34') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 34)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package35') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 35)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package36') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 36)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package37') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 37)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package38') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 38)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package39') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 39)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package40') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 40)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package41') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 41)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package42') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 42)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package43') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 43)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package44') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 44)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package45') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 45)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package46') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 46)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package47') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 47)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package48') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 48)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package49') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 49)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package50') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 50)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package51') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 51)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package52') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 52)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package53') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 53)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package54') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 54)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package55') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 55)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package56') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 56)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package57') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 57)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package58') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 58)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package59') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 59)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package60') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 60)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package61') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 61)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package62') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 62)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package63') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 63)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package64') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 64)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package65') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 65)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package66') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 66)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package67') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 67)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package68') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 68)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package69') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 69)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package70') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 70)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package71') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 71)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package72') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 72)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package73') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 73)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package74') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 74)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package75') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 75)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package76') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 76)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package77') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 77)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package78') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 78)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package79') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 79)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package80') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 80)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package81') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 81)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package82') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 82)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package83') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 83)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package84') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 84)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package85') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 85)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package86') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 86)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package87') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 87)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package88') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 88)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package89') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 89)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package90') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 90)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package91') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 91)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package92') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 92)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package93') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 93)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package94') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 94)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package95') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 95)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package96') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 96)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package97') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 97)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package98') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 98)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package99') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 99)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        if($request->input('package100') == 'true') {
            $data_cal = DB::table('lv_package')
                ->where('package_id', '=', 100)
                ->first();
            
            if(!empty($data_cal)) {
                $cal1 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id1)
                    ->first();

                $cal2 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id2)
                    ->first();

                $cal3 = DB::table('products')
                    ->where('products_id', '=', $data_cal->product_id3)
                    ->first();
                
                if(!empty($cal1)) {
                    $calories += $cal1->calories_products;
                }

                if(!empty($cal2)) {
                    $calories += $cal2->calories_products;
                }

                if(!empty($cal3)) {
                    $calories += $cal3->calories_products;
                }
            }
        }

        ShoppingCart::add(-1, $product_name, 1, $price, ['image' => $image, 'calories' => $calories, 'package1' => $request->input('package1'), 'package2' => $request->input('package2'), 'package3' => $request->input('package3'), 'package4' => $request->input('package4'), 'package5' => $request->input('package5'), 'package6' => $request->input('package6'), 'package7' => $request->input('package7'), 'package8' => $request->input('package8'), 'package9' => $request->input('package9'), 'package10' => $request->input('package10'), 'package11' => $request->input('package11'), 'package12' => $request->input('package12'), 'package13' => $request->input('package13'), 'package14' => $request->input('package14'), 'package15' => $request->input('package15'), 'package16' => $request->input('package16'), 'package17' => $request->input('package17'), 'package18' => $request->input('package18'), 'package19' => $request->input('package19'), 'package20' => $request->input('package20'), 'package21' => $request->input('package21'), 'package22' => $request->input('package22'), 'package23' => $request->input('package23'), 'package24' => $request->input('package24'), 'package25' => $request->input('package25'), 'package26' => $request->input('package26'), 'package27' => $request->input('package27'), 'package28' => $request->input('package28'), 'package29' => $request->input('package29'), 'package30' => $request->input('package30'), 'package31' => $request->input('package31'), 'package32' => $request->input('package32'), 'package33' => $request->input('package33'), 'package34' => $request->input('package34'), 'package35' => $request->input('package35'), 'package36' => $request->input('package36'), 'package37' => $request->input('package37'), 'package38' => $request->input('package38'), 'package39' => $request->input('package39'), 'package40' => $request->input('package40'), 'package41' => $request->input('package41'), 'package42' => $request->input('package42'), 'package43' => $request->input('package43'), 'package44' => $request->input('package44'), 'package45' => $request->input('package45'), 'package46' => $request->input('package46'), 'package47' => $request->input('package47'), 'package48' => $request->input('package48'), 'package49' => $request->input('package49'), 'package50' => $request->input('package50'), 'package51' => $request->input('package51'), 'package52' => $request->input('package52'), 'package53' => $request->input('package53'), 'package54' => $request->input('package54'), 'package55' => $request->input('package55'), 'package56' => $request->input('package56'), 'package57' => $request->input('package57'), 'package58' => $request->input('package58'), 'package59' => $request->input('package59'), 'package60' => $request->input('package60'), 'package61' => $request->input('package61'), 'package62' => $request->input('package62'), 'package63' => $request->input('package63'), 'package64' => $request->input('package64'), 'package65' => $request->input('package65'), 'package66' => $request->input('package66'), 'package67' => $request->input('package67'), 'package68' => $request->input('package68'), 'package69' => $request->input('package69'), 'package70' => $request->input('package70'), 'package71' => $request->input('package71'), 'package72' => $request->input('package72'), 'package73' => $request->input('package73'), 'package74' => $request->input('package74'), 'package75' => $request->input('package75'), 'package76' => $request->input('package76'), 'package77' => $request->input('package77'), 'package78' => $request->input('package78'), 'package79' => $request->input('package79'), 'package80' => $request->input('package80'), 'package81' => $request->input('package81'), 'package82' => $request->input('package82'), 'package83' => $request->input('package83'), 'package84' => $request->input('package84'), 'package85' => $request->input('package85'), 'package86' => $request->input('package86'), 'package87' => $request->input('package87'), 'package88' => $request->input('package88'), 'package89' => $request->input('package89'), 'package90' => $request->input('package90'), 'package91' => $request->input('package91'), 'package92' => $request->input('package92'), 'package93' => $request->input('package93'), 'package94' => $request->input('package94'), 'package95' => $request->input('package95'), 'package96' => $request->input('package96'), 'package97' => $request->input('package97'), 'package98' => $request->input('package98'), 'package99' => $request->input('package99'), 'package100' => $request->input('package100')]);

        $this->ajaxCart($request);
    }
    
    // Address
    public function ajaxChangeProvince(Request $request) {
        if($request->session()->get('lang') == 'th') {
            $district = DB::table('lv_province')
                ->where('lv_province.province_name_th', '=', $request->input('province_name'))
                ->join('lv_amphur', 'lv_amphur.province_id', '=', 'lv_province.province_id')
                ->orderBy('amphur_name_th','ASC')
                ->get();
        } elseif($request->session()->get('lang') == 'en') {
            $district = DB::table('lv_province')
                ->where('lv_province.province_name_en', '=', $request->input('province_name'))
                ->join('lv_amphur', 'lv_amphur.province_id', '=', 'lv_province.province_id')
                ->orderBy('amphur_name_en','ASC')
                ->get();
        }
                ?>
                    <option value=""><?php if($request->session()->get('lang') == 'th') echo 'เขต/อำเภอ'; else echo 'District';?></option>
                <?php
        
        if(!empty($district)) {
            foreach($district as $r) {
                if($request->session()->get('lang') == 'th') {
                ?>
                    <option value="<?php echo $r->amphur_name_th;?>"><?php echo $r->amphur_name_th;?></option>
                <?php
                } elseif($request->session()->get('lang') == 'en') {
                    ?>
                    <option value="<?php echo $r->amphur_name_en;?>"><?php echo $r->amphur_name_en;?></option>
                <?php               
                }
            }
        }
    }
    
    public function ajaxChangeAmphur(Request $request) {
        if($request->session()->get('lang') == 'th') {
            $sub_district = DB::table('lv_amphur')
                ->where('lv_amphur.amphur_name_th', '=', $request->input('amphur_name'))
                ->join('lv_tumbol', 'lv_tumbol.amphur_id', '=', 'lv_amphur.amphur_id')
                ->orderBy('tumbol_name_th','ASC')
                ->get();
        } elseif($request->session()->get('lang') == 'en') {
            $sub_district = DB::table('lv_amphur')
                ->where('lv_amphur.amphur_name_en', '=', $request->input('amphur_name'))
                ->join('lv_tumbol', 'lv_tumbol.amphur_id', '=', 'lv_amphur.amphur_id')
                ->orderBy('tumbol_name_en','ASC')
                ->get();
        }

                    ?>
                    <option value=""><?php if($request->session()->get('lang') == 'th') echo 'แขวง/ตำบล'; else echo 'Sub-District';?></option>
                    <?php
        
        if(!empty($sub_district)) {
            foreach($sub_district as $r) {
                if($request->session()->get('lang') == 'th') {
                    ?>
                    <option value="<?php echo $r->tumbol_name_th;?>"><?php echo $r->tumbol_name_th;?></option>
                    <?php
                } elseif($request->session()->get('lang') == 'en') {
                    ?>
                    <option value="<?php echo $r->tumbol_name_en;?>"><?php echo $r->tumbol_name_en;?></option>
                    <?php               
                }
            }
        }
    }
    // End Address

    public function ajaxSearchOrderNo(Request $request) {
        $order_detail = DB::table('lv_order_detail')
            ->orderBy('order_detail_id', 'desc')
            ->where('order_no', 'like', $request->input('order_no').'%')
            ->get();
        
        $i = 0;
        if(!empty($order_detail)) {
            foreach($order_detail as $r) {
                $i++;
?>
                <tr>
                    <td><?php echo $r->member_id;?></td>
                    <td><?php echo $r->order_no;?></td>
                    <td><?php echo number_format($r->order_detail_total, 2, '.', ',');?></td>
                    <td><?php echo $r->promocode_name;?></td>
                    <td><?php echo $r->order_detail_shipping_name.' '.$r->order_detail_shipping_family;?></td>
                    <td><?php echo $r->order_detail_shipping_email;?></td>
                    <td><?php echo $r->order_detail_shipping_phone_number;?></td>
                    <td><?php echo $r->order_detail_status;?></td>
                    <td><?php echo $r->order_detail_datetime_create;?></td>
                    <td><?php echo $r->order_detail_ip_create;?></td>
                    <td><?php echo $r->order_detail_datetime_update;?></td>
                    <td><?php echo $r->order_detail_ip_update;?></td>
                    <td><a href="<?php echo url('backend/order/form/'.$r->order_detail_id);?>">View & Change Status</a></td>
                </tr>
<?php
            }
        }
        
        if($i == 0) {
?>
                <tr>
                    <td colspan="12" align="center">Not Found Data</td>
                </tr>
<?php
        }
    }

    public function saveUpdateCartShipping(Request $request) {
        
    }

    public function genOrderNo() {
        $order = DB::table('lv_order_detail')
            ->orderBy('order_detail_id', 'desc')
            ->first();

        if(!empty($order)) {
            $order_no = $order->order_no;

            $order_no++;

            return $order_no;
        } else {
            return 1;
        }
    }

    public function ajaxCheckout(Request $request) {
        $order_detail_id = $this->insertOrderAndOrderDetail($request);

        $this->SendMailThankyou($order_detail_id);

        echo $order_detail_id;
    }

    public function thankyou($order_detail_id) {
        $this->get2Lang();
        
        $order_detail = DB::table('lv_order_detail')
            ->where('order_detail_id', '=', $order_detail_id)
            ->first();

        $order = DB::table('lv_order') 
            ->where('order_detail_id', '=', $order_detail_id)
            ->orderBy('order_id', 'asc')
            ->get();

        $data = array(
            'order_detail_id' => $order_detail_id,
            'order_detail' => $order_detail,
            'order' => $order
        );

        return view('frontend.thankyou', $data);
    }

    public function registerSaveUpdate(Request $request) {
        $check_email = DB::table('lv_member')
            ->where('member_email', '=', $request->input('member_email'))
            ->first();

        $url_error = url("register");
        
        if(!empty($check_email)) {
            return redirect('register?lang=Email is Already');
        }

        if($request->input('member_password') != $request->input('confirm_password')) {

            return redirect('register?lang=Incorrect Confirm Password');
        }

        $data = array(
            'member_name' => $request->input('member_name'),
            'member_family' => $request->input('member_family'),
            'member_birth_day' => $request->input('birth_year').'-'.$request->input('birth_month').'-'.$request->input('birth_day'),
            'member_email' => $request->input('member_email'),
            'member_phone_number' => $request->input('member_phone_number'),
            'member_password' => $request->input('member_password'),
            'member_address' => $request->input('member_address'),
            'member_province' => $request->input('member_province'),
            'member_district' => $request->input('member_district'),
            'member_sub_district' => $request->input('member_sub_district'),
            'member_postcode' => $request->input('member_postcode'),
            'member_datetime_create' => date('Y-m-d H:i:s'),
            'member_ip_create' => $_SERVER['REMOTE_ADDR'],
            'member_datetime_update' => date('Y-m-d H:i:s'),
            'member_ip_update' => $_SERVER['REMOTE_ADDR']
        );

        DB::table('lv_member')
            ->insert($data);

        $login = DB::table('lv_member')
            ->orderBy('member_id', 'desc')
            ->first();
        $adddress = new Address();
            $adddress->address_regis = $login->member_id;
            $adddress->address_shipping = '1';
            $adddress->address_no = $request->member_address;
            $adddress->address_province = $request->member_province;
            $adddress->address_distric = $request->member_district;
            $adddress->address_sub_distric = $request->member_sub_district;
            $adddress->address_postcode = $request->member_postcode;
            $adddress->save();
        if(!empty($login)) {
            session(['member_id' => $login->member_id]);

            //return redirect('member_shippingaddress');
            
            if($request->session()->get('current_url') == url('cart')) {
                return redirect(url('cart'));
            } else {
                return redirect(url('index'));
            }
            //return redirect($request->session()->get('current_url'));
        }
    }

    public function myprofile(Request $request) {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }

        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();
            $wishcount = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
            ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
            ->where('wish_member', '=', $request->session()->get('member_id'))
            ->count();
        $data = array(
            'member' => $member,
            'wishcount' => $wishcount
        );
        
        return view('frontend.myprofile', $data); 
    }

    public function saveUpdateProfile(Request $request) {
        $data = array(
            'member_name' => $request->input('member_name'),
            'member_family' => $request->input('member_family'),
            'member_birth_day' => $request->input('birth_year').'-'.$request->input('birth_month').'-'.$request->input('birth_day'),
            'member_gender' => $request->input('member_gender'),
            'member_email' => $request->input('member_email'),
            'member_phone_number' => $request->input('member_phone_number'),
            'member_datetime_update' => date('Y-m-d H:i:s'),
            'member_ip_update' => $_SERVER['REMOTE_ADDR']
        );

        DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->update($data);

        return redirect('myprofile');
    }

    public function member_shippingaddress(Request $request) {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }
        $wishcount = DB::table('lv_member')
        ->where('member_id', '=', $request->session()->get('member_id'))
        ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
        ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
        ->where('wish_member', '=', $request->session()->get('member_id'))
        ->count();
        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();

        $address = DB::table('tb_address')
        ->where('address_regis', '=', $request->session()->get('member_id'))
        ->orderBy('address_shipping','DESC')
        ->get();
        $data = array(
            'member' => $member,
            'address' => $address,
            'wishcount' => $wishcount
        );
        
        return view('frontend.member_shippingaddress', $data); 
    }
    public function member_newaddress(Request $request) {
        if($request->session()->get('member_id') == '') {
            return redirect('index');
        }
        $wishcount = DB::table('lv_member')
        ->where('member_id', '=', $request->session()->get('member_id'))
        ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
        ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
        ->where('wish_member', '=', $request->session()->get('member_id'))
        ->count();
        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();

        $address = DB::table('tb_address')
        ->where('address_regis', '=', $request->session()->get('member_id'))
        ->get();

        $province = DB::table('lv_province')
            ->orderBy('province_id', 'asc')
            ->get();

        $data = array(
            'member' => $member,
            'province' => $province,
            'address' => $address,
            'wishcount' => $wishcount
        );
        
        return view('frontend.member_newaddress', $data); 
    }
    public function member_newaddressEdit(Request $request,$id) {
        if($request->session()->get('member_id') == '') {
            return redirect('index');
        }
        $wishcount = DB::table('lv_member')
        ->where('member_id', '=', $request->session()->get('member_id'))
        ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
        ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
        ->where('wish_member', '=', $request->session()->get('member_id'))
        ->count();
        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();

        $address = DB::table('tb_address')
        ->where('address_id', '=', $id)
        ->first();

        $province = DB::table('lv_province')
            ->orderBy('province_id', 'asc')
            ->get();

        $data = array(
            'member' => $member,
            'province' => $province,
            'address' => $address,
            'wishcount' => $wishcount
        );
        
        return view('frontend.member_newaddressEdit', $data); 
    }
    public function AddressSaveUpdate(Request $request) {
        if ($request->idadd == '') {
            $adddress = new Address();
            $adddress->address_regis = $request->session()->get('member_id');
            $adddress->address_shipping = '1';
            $adddress->address_no = $request->member_address;
            $adddress->address_province = $request->member_province;
            $adddress->address_distric = $request->member_district;
            $adddress->address_sub_distric = $request->member_sub_district;
            $adddress->address_postcode = $request->member_postcode;
            $adddress->save();
        } else {
            
            $adddress = Address::find($request->idadd);
            $adddress->address_regis = $request->session()->get('member_id');
            // $adddress->address_shipping = '1';
            $adddress->address_no = $request->member_address;
            $adddress->address_province = $request->member_province;
            $adddress->address_distric = $request->member_district;
            $adddress->address_sub_distric = $request->member_sub_district;
            $adddress->address_postcode = $request->member_postcode;
            $adddress->save();
        }
        
        return redirect('member_shippingaddress');
    }
    public function delADD($id)
    {
        // dd($id);
        Address::where('address_id',$id)->delete();
        return back();
    }
    public function showADD(Request $request)
    {
        // dd($request);
        DB::table('tb_address')
        ->where('address_id', $request->id)
        ->update([
            'address_shipping' => $request->one
        ]);
    }

    // cart
    public function ajaxCart(Request $request) {
        $this->promotion_beginner();

        // [0] Order Qty -> class="order_qty"
        $i = 0;
        $sub_total = 0;
        $qty = 0;
        foreach(ShoppingCart::all() as $r_inc) {
            $price = $r_inc->qty * $r_inc->price;
            $qty += $r_inc->qty;
            $sub_total += $price;

            $i++;
        }

        echo $qty;

        echo '!@#$%^&*())_+';
        // [1] Order Sub Total -> class="order_sub_total"
        $sub_total = 0;
        foreach(ShoppingCart::all() as $r_inc) {
            $sub_total += ($r_inc->qty * $r_inc->price);
        }

        echo number_format($sub_total, 2, '.', ',');

        echo '!@#$%^&*())_+';

        // [2] Order Shipping -> class="order_shipping"
       
        $promotion_complete = DB::table('lv_promotion_complete')
            ->where('promotion_complete_id', '=', '1')
            ->where('promotion_complete_from_price', '<=', $sub_total)
            ->where('promotion_complete_begin_date', '<=', date('Y-m-d'))
            ->where('promotion_complete_end_date', '>=', date('Y-m-d'))
            ->first();

        //dd($promotion_complete, Session::get('promocode_free_shipping'));

        if(!empty($promotion_complete) and $promotion_complete->promotion_complete_free_shipping == 'Yes') {
            $shipping = 0;
        } elseif(Session::get('promocode_free_shipping') == 'Yes') {
            $shipping = 0;
        } elseif(Session::get('order_detail_shipping') != 0) {
            $shipping = Session::get('order_detail_shipping');
        } else {
            $shipping = 0;
        }
        
        echo number_format($shipping, 2, '.', ',');

        echo '!@#$%^&*())_+';
        // [3] Order Discount -> class="order_discount"
        $discount = 0;
        if(empty($promotion_complete)) {
            if(Session::get('promotion') == 'Promotion eatfit') {
                if(!empty($promotion_complete) and $promotion_complete->promotion_complete_discount != '0') {
                    $discount = $sub_total * $promotion_complete->promotion_complete_discount / 100;
                }
            } elseif(Session::get('promocode_discount') != '') {
                if(Session::get('promocode_type') == 'Baht') {
                    $discount = Session::get('promocode_discount');
                } elseif(Session::get('promocode_type') == '%') {
                    $discount = $sub_total * Session::get('promocode_discount') / 100;
                }
            } else {
                $discount = 0;
            }
        } else {
            if(!empty($promotion_complete) and $promotion_complete->promotion_complete_discount != '0') {
                $discount = $sub_total * $promotion_complete->promotion_complete_discount / 100;
            }
        }

        foreach(ShoppingCart::all() as $r_inc) {
            $promotion_by_product_ = DB::table('lv_promotion_by_product')
                ->where('promotion_by_product_id', '=', '1')
                ->first();

            if(!empty($promotion_by_product_)) {
                $exp = explode(', ', $promotion_by_product_->products_id);

                if(!empty($exp)) {
                    foreach($exp as $product_id_) {
                        if($product_id_ == $r_inc->id) {
                            $promotion_by_product = DB::table('lv_promotion_by_product')
                                ->where('promotion_by_product_id', 1)
                                ->first();
                        }
                    }
                }
            }

            if($r_inc->name == 'Package 3 Days') {
                $promotion_by_product = DB::table('lv_promotion_by_product')
                    ->where('promotion_by_product_id', 1)
                    ->where('products_package_3', '=', 'Yes')
                    ->first();
            }

            if($r_inc->name == 'Package 5 Days') {
                $promotion_by_product = DB::table('lv_promotion_by_product')
                    ->where('promotion_by_product_id', 1)
                    ->where('products_package_5', '=', 'Yes')
                    ->first();
            }

            if($r_inc->name == 'Package 7 Days') {
                $promotion_by_product = DB::table('lv_promotion_by_product')
                    ->where('promotion_by_product_id', 1)
                    ->where('products_package_7', '=', 'Yes')
                    ->first();
            }
        }

        if(!empty($promotion_by_product)) {
            $discount += $sub_total * $promotion_by_product->promotion_by_product_percent / 100;
        }

        if(!empty(Session::get('discount_point_redeem'))) {
            $discount += Session::get('discount_point_redeem');
        }

        if(!empty($discount)) {
            Session::put('promocode_frontend_discount', $discount);
        } else {
            Session()->forget(['promocode_frontend_discount']);
        }

        echo number_format($discount, 2, '.', ',');

        echo '!@#$%^&*())_+';
        // [4] Order Total -> class="order_total"
        $total = $sub_total + $shipping - $discount;

        echo number_format($total, 2, '.', ',');

        echo '!@#$%^&*())_+';
        // [5] Cart Basket -> class="cart_basket"
        $all_calories = 0;
        foreach(ShoppingCart::all() as $r_inc) {
            $all_calories += $r_inc->calories * $r_inc->qty;
?>
            <div class="row box_cartshowlist">
                <div class="col-3 photo_cart">
                    <a href="<?php echo url('/product-page/'.$r_inc->id);?>">
                        <img src="<?php echo asset($r_inc->image);?>"
                            alt="">
                    </a>
                </div>
                <div class="col-7 nopad">
                    <div class="desc_cartshow">
                        <div class="cartshow_pname"><?php echo $r_inc->name;?></div>
                        <div><?php if(Session::get('lang') == 'th') echo 'พลังงาน'; else echo 'Calories';?> <?php echo $r_inc->calories;?></div>                      
                        <div class="cartshow_price"><?php echo $r_inc->qty.' x '.number_format($r_inc->price, 2, '.', ',');?> <?php if(Session::get('lang') == 'th') echo 'บาท'; else echo 'THB';?></div>
                    </div>
                </div>
                <div class="col-2">
                    <button class="cart_del" onclick="deleteCartInc('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-times-circle"></i></button>
                </div>
            </div>
<?php
        }

        if(Session::get('giftset_id') != 0) {
            $giftset = DB::table('lv_giftset')->where('giftset_id', '=', Session::get('giftset_id'))->first();
?>
            <div class="row box_cartshowlist">
                <div class="col-3 photo_cart">
                    <a href="#">
                        <img src="<?php echo asset($giftset->giftset_image);?>"
                            alt="">
                    </a>
                </div>
                <div class="col-7 nopad">
                    <div class="desc_cartshow">
                        <div class="cartshow_pname"><?php echo $giftset->giftset_name;?></div>
                        <div><?php //if(Session::get('lang') == 'th') echo 'พลังงาน'; else echo 'Calories';?> <?php //echo $r_inc->calories;?></div>                      
                        <div class="cartshow_price"><?php echo '1 x 0.00'//echo $r_inc->qty.' x '.number_format($r_inc->price, 2, '.', ',');?> <?php if(Session::get('lang') == 'th') echo 'บาท'; else echo 'THB';?></div>
                    </div>
                </div>
                <div class="col-2">
                    <!-- <button class="cart_del" onclick="deleteCartInc('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-times-circle"></i></button> -->
                </div>
            </div>
<?php
        }

        echo '!@#$%^&*())_+';
        // [6] View Cart -> class="view_cart"

        $sub_total = 0;
        $all_calories = 0;

        foreach(ShoppingCart::all() as $r_inc) {
            $price = $r_inc->qty * $r_inc->price;
            $sub_total += $price;
        
            $calories = $r_inc->qty * $r_inc->calories;
            $all_calories += $calories; 
?>
                                 <div class="cart_itemproduct">
                                     <div class="row">
                                         <div class="col-12 col-lg-5">
                                             <div class="row">
                                                 <div class="col-3 col-sm-2 col-lg-3 cart_mbnopad">
                                                     <a href="product-page.php"><img src="<?php echo asset($r_inc->image);?>" class="img-fluid" alt=""></a>
                                                 </div>
                                                 <div class="col-9 col-sm-10 col-lg-9">
                                                     <div class="cart_pname"><?php echo $r_inc->name;?></div>
                                                     <div><?php if(Session::get('lang') == 'th') echo 'พลังงาน'; else echo 'Calories';?> <?php echo $calories;?></div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-9 offset-3 col-sm-3 offset-sm-2 col-lg-2 offset-lg-0 mb_textleft text-center">
                                            <div class="cart_price"><?php echo number_format($r_inc->price, 2, '.', ',');?> <?php if(Session::get('lang') == 'th') echo 'บาท'; else echo 'THB';?></div>
                                         </div>
                                         <div class="col-9 offset-3 col-sm-3 offset-sm-0 col-md-3 col-lg-2 mb_textleft2 text-center">
<?php
            if($r_inc->redeem_point != '') {
                echo '1';                        
            } else {
?>
                                             <div class="box_quantity">
                                                    <span class="minus" onclick="minus_('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-minus"></i></span>
                                                    <input class="quantity-input" id="qty_<?php echo $r_inc->__raw_id;?>" type="text" name="quantity" value="<?php echo $r_inc->qty;?>">
                                                    <span class="plus" onclick="plus_('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-plus"></i></span>
                                            </div>
<?php
            }
?>
                                         </div>
                                         <div class="col-9 offset-3 col-sm-3 offset-sm-0 col-md-3 col-lg-2 mb_textleft2 text-center">
                                            <div class="cart_price"><?php echo number_format($price, 2, '.', ',');?>  <?php if(Session::get('lang') == 'th') echo 'บาท'; else echo 'THB';?></div>
                                         </div>
                                         <div class="col-9 offset-3 col-sm-1 offset-sm-0 text-right">
                                             <button class="cart_del" onclick="deleteCartInc('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-times-circle"></i> <span>Delete</span></button>
                                         </div>
                                     </div>
                                 </div>
<?php
        }

        if(Session::get('giftset_id') != 0) {
            $giftset = DB::table('lv_giftset')->where('giftset_id', '=', Session::get('giftset_id'))->first();
?>
            <div class="cart_itemproduct">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <div class="row">
                            <div class="col-3 col-sm-2 col-lg-3 cart_mbnopad">
                                <a href="product-page.php"><img src="<?php echo asset($giftset->giftset_image);?>" class="img-fluid" alt=""></a>
                            </div>
                            <div class="col-9 col-sm-10 col-lg-9">
                                <div class="cart_pname"><?php echo $giftset->giftset_name;?></div>
                                <div><?php //if(Session::get('lang') == 'th') echo 'พลังงาน'; else echo 'Calories';?> <?php //echo $calories;?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 offset-3 col-sm-3 offset-sm-2 col-lg-2 offset-lg-0 mb_textleft text-center">
                    <div class="cart_price"><?php echo 0;//echo number_format($r_inc->price, 2, '.', ',');?> <?php if(Session::get('lang') == 'th') echo 'บาท'; else echo 'THB';?></div>
                    </div>
                    <div class="col-9 offset-3 col-sm-3 offset-sm-0 col-md-3 col-lg-2 mb_textleft2 text-center">
<?php
            echo '1';
?>
                    </div>
                    <div class="col-9 offset-3 col-sm-3 offset-sm-0 col-md-3 col-lg-2 mb_textleft2 text-center">
                    <div class="cart_price"><?php echo 0;//echo number_format($price, 2, '.', ',');?>  <?php if(Session::get('lang') == 'th') echo 'บาท'; else echo 'THB';?></div>
                    </div>
                    <div class="col-9 offset-3 col-sm-1 offset-sm-0 text-right">
                        <!-- <button class="cart_del" onclick="deleteCartInc('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-times-circle"></i> <span>Delete</span></button> -->
                    </div>
                </div>
            </div>
<?php
        }

        echo '!@#$%^&*())_+';
        // [7] All Calories -> class="order_calories"

        echo number_format($all_calories, 0, '.', ',');

        echo '!@#$%^&*())_+';
        // [8] Promotion -> class="promotion_2_type_before"
        
        if(!empty(Session::get('promotion'))) {
            echo Session::get('promotion');
        } else {
            echo '-';
        }

        echo '!@#$%^&*())_+';
        // [9] Point -> class="cart_point"

        echo floor($sub_total / 100);

        echo '!@#$%^&*())_+';
        // [10] Check ว่า ใช้ Redeem Point ไปแล้วรึยัง

        echo '!@#$%^&*())_+';
        // [11] Promocode -> class="promocode_name"

        echo Session::get('promocode_name');

        echo '!@#$%^&*())_+';
        // [12] Promotion By Product -> class="promotion_by_product
        
        if(empty($promotion_complete)) {
            $promotion_by_product = DB::table('lv_promotion_by_product')
                ->where('promotion_by_product_id', '=', '1')
                ->first();

            if(!empty($promotion_by_product) and $promotion_by_product->promotion_by_product_amount <= $sub_total) {
                $exp_ = explode(', ', $promotion_by_product->products_id);

                $exp = array();
                if(!empty($exp_)) {
                    foreach($exp_ as $a) {
                        if($a != '') {
                            $exp[] = $a;
                        }
                    }
                }

                $product = DB::table('products')
                    ->whereIn('products_id', $exp)
                    ->get();
?>
                         <div class="cart_boxpromotion">
                            <div class="bg_topicpromotion_cart">
                                <div><?php if(Session::get('lang') == 'th') echo 'โปรโมชัน'; else echo 'promotion';?></div>
                                <p><?php if(Session::get('lang') == 'th') echo $promotion_by_product->promotion_by_product_text_th; else echo $promotion_by_product->promotion_by_product_text_en;?></p>
                            </div>
                            <div class="owl-recentproduct owl-carousel owl-theme">
<?php
                if(!empty($product)) {
                    foreach($product as $p) {
                        $discount_price = ceil($p->price - ($p->price * $promotion_by_product->promotion_by_product_percent / 100));
?>
                                <div>
                                    <div class="item_products">
                                        <div class="box_addwishlist"><button onclick="setWish('<?php echo $p->products_id;?>');"><img src="<?php echo asset('/files/frontend/images/icon_wishlist.svg');?>" class="svg" alt="" style="color: #f39193;"></button></div>
                                        <a href="<?php echo url('product_page/'.$p->menu_head_pk.'/'.$p->products_id);?>">
                                            <div class="product_photosquare">
                                                <figure><img src="<?php echo asset($p->img_products);?>" alt=""></figure>
                                            </div>
                                            <div class="item_productname"><?php if(Session::get('lang') == 'th') echo $p->name_products_thai; else echo $p->name_products_eng;?></div>
                                        </a>
                                        <div class="item_productprice">Price : <?php if($p->price != $discount_price) { ?><span>฿<?php echo $p->price;?></span><?php } ?> <div>฿ <?php echo $discount_price;?></div></div>
                                        <div class="wrap_addcart">
                                            <a href="" class="btn_default btn_green btn_addcart" id="<?php echo $p->products_id;?>_promotion_by_product"><img src="<?php echo asset('/files/frontend/images/icon_cart.svg');?>" alt=""> Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
<?php
                    }
                }
?>
                            </div>
                         </div>
<?php
            }
        }
    }

    public function promotion_beginner() {
        $discount = 0;
        $check_free_shipping = false;
        $sub_total = 0;
        $redeem_point_discount = '';
        $redeem_point_discount_type = '';
        foreach(ShoppingCart::all() as $r) {
            $sub_total += $r->price * $r->qty;

            if($r->redeem_point_type == 'Free Shipping') {
                $check_free_shipping = true;
            }

            if($r->redeem_point_discount != '' and $r->redeem_point_discount_type != '') {
                $redeem_point_discount = $r->redeem_point_discount;
                $redeem_point_discount_type = $r->redeem_point_discount_type;
            }
        }

        if($redeem_point_discount != '' and $redeem_point_discount_type != '') {
            if($redeem_point_discount_type == '%') {
                $discount = $sub_total * $redeem_point_discount / 100;
            } elseif($redeem_point_discount_type == 'Baht') {
                $discount = $redeem_point_discount;
            }
            
            session(['discount_point_redeem' => $discount]);
        } else {
            Session::forget('discount_point_redeem');
        }

        if($check_free_shipping == true) {
            session(['order_detail_shipping' => '0']);
        }

        $promotion_complete = DB::table('lv_promotion_complete')
            ->where('promotion_complete_id', '=', '1')
            ->where('promotion_complete_begin_date', '<=', date('Y-m-d'))
            ->where('promotion_complete_end_date', '>=', date('Y-m-d'))
            ->first();

        if(!empty($promotion_complete)) {
            if($sub_total >= $promotion_complete->promotion_complete_from_price) {
                Session::forget('promotion');
                session(['promotion' => 'Promotion eatfit']);

                if($promotion_complete->promotion_complete_free_shipping == 'Yes') {
                    session(['order_detail_shipping' => 0]);
                }
            } else {
                Session::forget('promotion');
            }

            echo $promotion_complete->promotion_complete_free_shipping;
        }

        //dd(Session::get('order_detail_shipping'));

        // Promotion Day
        $promotion_day = DB::table('lv_promotion_day')
            ->where('promotion_day_id', '=', 1)
            ->first();

        if(!empty($promotion_day)) {
            if($promotion_day->promotion_day_begin <= date('Y-m-d') and $promotion_day->promotion_day_end >= date('Y-m-d')) {
                if(strlen($promotion_day->promotion_day_day) == 1) {
                    $promotion_day_ = '0'.$promotion_day->promotion_day_day;
                } else {
                    $promotion_day_ = $promotion_day->promotion_day_day;
                }

                if($promotion_day_ == date('d')) {
                    if($promotion_day->promotion_day_percent != 0) {
                        $discount_day = $sub_total * $promotion_day->promotion_day_percent / 100;

                        $discount += $discount_day;
                    }

                    if($promotion_day->promotion_day_baht != 0) {
                        $discount_day = $promotion_day->promotion_day_baht;

                        $discount += $discount_day;
                    }

                    session(['discount_point_redeem' => $discount]);
                } else {
                    Session::forget('discount_point_redeem');
                }
            }
        }
    }

    public function ajaxInsertCart(Request $request) {
        if($request->input('promotion_by_product') == true) {
            $row = Products::where('products_id', '=', $request->input('products_id'))
                ->first();

            $row_promotion = DB::table('lv_promotion_by_product')
                ->where('promotion_by_product_id', '=', '1')
                ->where('products_id', 'like', '%'.$request->input('products_id').', %')
                ->first();

            //dd($row);

            if(!empty($row)) {
                if(!empty($row_promotion)) {
                    $price = number_format(ceil($row->price - ($row->price * $row_promotion->promotion_by_product_percent / 100)), 0, '.', ',');
                } else {
                    $price = number_format(ceil($row->price), 0, '.', ',');
                }

                if($request->session()->get('lang') == 'th') {
                    $product_name = $row->name_products_thai;
                } elseif($request->session()->get('lang') == 'en') {
                    $product_name = $row->name_products_eng;
                }

                $img = $row->img_products;

                $row = ShoppingCart::add($row->products_id, $product_name, $request->input('qty'), $price, ['image' => $img, 'calories' => $row->calories_products]); 

                if(!empty($row_promotion) and $row_promotion->promotion_by_product_free_shipping == 'Yes') {
                    $request->session()->put('promotion_by_product_free_shipping', true);
                } else {
                    $request->session()->forget('promotion_by_product_free_shipping');
                }
            }
        } else {
            $row = Products::where('products_id', '=', $request->input('products_id'))
                ->first();

            if(!empty($row)) {
                if($row->price_full != '' and $row->price_sale != '') {
                    $price = number_format($row->price_sale, 0, '.', ',');
                } else {
                    $price = number_format($row->price, 0, '.', ',');
                }

                if($request->session()->get('lang') == 'th') {
                    $product_name = $row->name_products_thai;
                } elseif($request->session()->get('lang') == 'en') {
                    $product_name = $row->name_products_eng;
                }

                $img = $row->img_products;

                $row = ShoppingCart::add($row->products_id, $product_name, $request->input('qty'), $price, ['image' => $img, 'calories' => $row->calories_products]); 
            }
        }

        $this->ajaxCart($request);
    }

    public function ajaxInsertProductRedeemCart(Request $request) {
        $check_redeem = false;
        if(!empty(ShoppingCart::all())) {
            foreach(ShoppingCart::all() as $r) {
                if($r->redeem_point != '') {
                    $check_redeem = true;
                }
            }
        }

        if($check_redeem == false) {

            $row = Products::where('products_id', '=', $request->input('products_id'))
                ->first();

            $row_redeem_point = DB::table('lv_point_redeem_new')
                ->where('point_redeem_new_id', '=', $request->input('redeem_point_new_id'))
                ->first();

            if(!empty($row) and !empty($row_redeem_point)) {
                if($row->price_full != '' and $row->price_sale != '') {
                    $price = number_format(0, 0, '.', ',');
                } else {
                    $price = number_format(0, 0, '.', ',');
                }

                if($request->session()->get('lang') == 'th') {
                    $product_name = $row->name_products_thai;
                } elseif($request->session()->get('lang') == 'en') {
                    $product_name = $row->name_products_eng;
                }

                $img = $row->img_products;

                $qty = 1;

                $row_product = ShoppingCart::add($row->products_id, $product_name, $qty, $price, ['image' => $img, 'calories' => $row->calories_products, 'redeem_point' => $row_redeem_point->point_redeem_new_point, 'redeem_point_type' => 'Product']); 
            }

            $this->ajaxCart($request);
        } else {
            echo 'true';
        }
    }

    public function ajaxInsertFreeShippingCart(Request $request) {
        $check_redeem = false;
        if(!empty(ShoppingCart::all())) {
            foreach(ShoppingCart::all() as $r) {
                if($r->redeem_point != '') {
                    $check_redeem = true;
                }
            }
        }

        if($check_redeem == false) {
            $row = DB::table('lv_point_redeem_new')
                ->where('point_redeem_new_id', '=', $request->input('point_redeem_new_id'))
                ->first();

            if(!empty($row)) {
                $price = number_format(0, 0, '.', ',');

                if($request->session()->get('lang') == 'th') {
                    $product_name = 'ค่าขนส่งฟรี';
                } elseif($request->session()->get('lang') == 'en') {
                    $product_name = 'Free Shipping';
                }

                $img = $row->point_redeem_new_image;

                $qty = 1;

                $row_free_shipping = ShoppingCart::add(-999, $product_name, $qty, $price, ['image' => $img, 'calories' => 0, 'redeem_point' => $row->point_redeem_new_point, 'redeem_point_type' => 'Free Shipping']); 
            }

            $this->ajaxCart($request);
        } else {
            echo 'true';
        }
    }

    public function ajaxInsertDiscountCart(Request $request) {
        $check_redeem = false;
        if(!empty(ShoppingCart::all())) {
            foreach(ShoppingCart::all() as $r) {
                if($r->redeem_point != '') {
                    $check_redeem = true;
                }
            }
        }

        if($check_redeem == false) {
            $row = DB::table('lv_point_redeem_new')
                ->where('point_redeem_new_id', '=', $request->input('point_redeem_new_id'))
                ->first();

            if(!empty($row)) {

                if($request->session()->get('lang') == 'th') {
                    $product_name = 'ส่วนลด '.$row->point_redeem_new_discount.' '.$row->point_redeem_new_discount_type;
                } elseif($request->session()->get('lang') == 'en') {
                    $product_name = 'Discount '.$row->point_redeem_new_discount.' '.$row->point_redeem_new_discount_type;
                }

                $img = $row->point_redeem_new_image;

                $qty = 1;

                $price = 0;

                $row_discount = ShoppingCart::add(-999, $product_name, $qty, $price, ['image' => $img, 'calories' => 0, 'redeem_point' => $row->point_redeem_new_point, 'redeem_point_type' => 'Discount', 'redeem_point_discount' => $row->point_redeem_new_discount, 'redeem_point_discount_type' => $row->point_redeem_new_discount_type]); 
            }

            $this->ajaxCart($request);
        } else {
            echo 'true';
        }
    }

    public function ajaxUpdateCart(Request $request) {
        ShoppingCart::update($request->input('raw_id'), $request->input('qty'));

        $this->ajaxCart($request);
    }

    public function ajaxDeleteCart(Request $request) {
        ShoppingCart::remove($request->input('raw_id'));

        $this->ajaxCart($request);
    }
    // end cart

    public function testGithubDesktop() {
        echo 'Test';
    }

    public function testSession() {
        dd(Session::all());
    }

    public function backendOrder(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $order_detail = DB::table('lv_order_detail')
            ->orderBy('order_detail_id', 'desc')
            ->get();

        $data = array(
            'order_detail' => $order_detail
        );

        return view('backend.order_new.list', $data);
    }

    public function backendOrderForm($order_detail_id) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $order_detail = DB::table('lv_order_detail')
            ->where('order_detail_id', '=', $order_detail_id)
            ->first();

        $order = DB::table('lv_order')
            ->where('order_detail_id', '=', $order_detail_id)
            ->orderBy('order_id', 'asc')
            ->get();

        $data = array(
            'order_detail' => $order_detail,
            'order' => $order,
            'order_detail_id' => $order_detail_id
        );

        return view('backend.order_new.form', $data);
    }

    public function backendPayment() {
        $payment = DB::table('lv_payment')
            ->orderBy('lv_payment.payment_datetime_create', 'desc')
            ->join('lv_order_detail', 'lv_payment.order_detail_id', '=', 'lv_order_detail.order_detail_id')
            ->get();

        $data = array(
            'payment' => $payment
        );

        return view('backend.payment.list', $data);
    }

    public function ajaxSearchOrderNoPayment(Request $request) {
        $payment = DB::table('lv_payment')
            ->orderBy('lv_payment.payment_datetime_create', 'desc')
            ->join('lv_order_detail', 'lv_payment.order_detail_id', '=', 'lv_order_detail.order_detail_id')
            ->where('lv_order_detail.order_no', '=', $request->input('order_no'))
            ->get();

        $i = 0;
        if(!empty($payment)) {
            foreach($payment as $r) {
                $i++;
?>
                <tr>
                    <td><?php echo $r->order_no;?></td>
                    <td><?php echo $r->payment_phone_number;?></td>
                    <td><?php echo $r->payment_amount;?></td>
                    <td><?php echo $r->payment_date;?></td>
                    <td><?php echo $r->payment_time;?></td>
                    <td><?php echo $r->payment_message;?></td>
                    <td><a href="<?php echo url('local/storage/app/pick_your_plan/'.$r->payment_slip);?>" target="_blank"><img src="<?php echo asset('local/storage/app/pick_your_plan/'.$r->payment_slip);?>" width="150"></a></td>
                    <td><?php echo $r->payment_datetime_create;?></td>
                    <td><?php echo $r->payment_ip_create;?></td>
                </tr>
<?php
            }
        }

        if($i == 0)
?>
            <tr>
                <td colspan="9" align="center">Not Found Data</td>
            </tr>
<?php
    }

    public function logout(Request $request) {
        $request->session()->forget('member_id');

        return redirect(url('index'));
    }

    public function backendOrderSaveUpdate(Request $request) {
        $data = array(
            'order_detail_status' => $request->input('order_detail_status'),
            'order_detail_datetime_update' => date('Y-m-d H:i:s'),
            'order_detail_ip_update' => $_SERVER['REMOTE_ADDR']
        );

        $result = DB::table('lv_order_detail')
            ->where('order_detail_id', '=', $request->input('order_detail_id'))
            ->first();

        $begin = $result->order_detail_status;

        $end = $request->input('order_detail_status');

        $member = DB::table('lv_member')
            ->where('member_id', '=', $result->member_id)
            ->first();

        $current_point = $member->member_point;

        // point ที่ใช้ไป
        $order_point = DB::table('lv_order')
            ->where('order_detail_id', '=', $request->input('order_detail_id'))
            //->where('point_redeem', '<>', '')
            ->first();

        if(!empty($order_point)) {
            $point_ = $order_point->point_redeem;
        } else {
            $point_ = 0;
        }

        //echo $point_;
        // End point ที่ใช้ไป

        // เรื่มต้น ถ้าเป็น '', 'Waiting for Payment', 'Order Canceled' แล้วไป 'Order Processing', 'Shipped', 'Delivered' ให้บวกแต้มเพิ่ม
        if(($begin == '' or $begin == 'Waiting for Payment' or $begin == 'Order Canceled') and ($end == 'Order Processing' or $end == 'Shipped' or $end == 'Delivered')) {
            $all_point = $current_point + $result->order_detail_point - $point_;

            $data_point = array(
                'member_point' => $all_point,
                'member_datetime_update' => date('Y-m-d H:i:s'),
                'member_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            DB::table('lv_member')
                ->where('member_id', '=', $result->member_id)
                ->update($data_point);
        }

        if(($begin == '' or $begin == 'Waiting for Payment') and ($end == 'Order Processing')) {
            // ตัด Point
            $order = DB::table('lv_order_detail')
            ->where('lv_order_detail.order_detail_id', '=', $result->order_detail_id)
            ->join('lv_order', 'lv_order_detail.order_detail_id', '=', 'lv_order.order_detail_id')
            ->get();
            // End ตัด Point

            // ส่งเมล์
            $order_detail = DB::table('lv_order_detail')
                ->where('order_detail_id', '=', $request->input('order_detail_id'))
                ->first();

            $order = DB::table('lv_order') 
                ->where('order_detail_id', '=', $request->input('order_detail_id'))
                ->orderBy('order_id', 'asc')
                ->get();

            $sender = array('sales@gourmetprimo.com');
            $sender[] = 'ordering@gourmetprimo.com';
            $sender[] = $order_detail->order_detail_shipping_email;

            $subject = 'eatfit :: Change Payment Order No. '.$order_detail->order_no;

            $message = '
                    <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
                </head>
                
                <body>
                    <div style="width: 100%; max-width: 600px; margin: 0 auto;">
                    <div style="text-align: center; margin: 15px 0;"><img src="'.asset('files/frontend/images/logo_031.jpg').'" alt="" style="width: 150px;"></div>
                        <div style="background-color: #74bda2; color: #fff; text-align: center; padding: 15px;">
                            <div style="font-size: 24px;">ORDER CONFIRMATION</div>
                        </div>
                        <div>
                            <h3 style="margin: 40px 0 20px; font-size: 16px;">'.$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family.', Thank you for your order!</h3>
                            <div style="line-height: 26px; margin-bottom: 30px;">
                            We’ve received your order and will be processing it shortly. You can check your delivery status on our website by logging into your account and click the Order button.
                            </div>
                        
                            <div style="margin-top: 15px;">
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Order Number:</span> '.$order_detail->order_no.'</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Date:</span> '.date('d/m/Y').'</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Payment Method:</span> '.$order_detail->order_detail_payment_method.'</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Promotion Code:</span> -</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Discount:</span> '.number_format($order_detail->order_detail_discount, 2, ".", ",").' ';
            if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                $message .= '
                                </div>
                                    <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Shipping:</span> '.number_format($order_detail->order_detail_shipping, 0, ".", ",").' ';
                                    if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                        $message .= '</div>
                                
                                
                                <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">SHIPPING ADDRESS</div>
                                <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                    <div style="font-weight: bold;">'.$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family.' </div><br>
                                    '.$order_detail->order_detail_shipping_address
                                    .' '.$order_detail->order_detail_shipping_sub_district
                                    .' '.$order_detail->order_detail_shipping_district
                                    .' '.$order_detail->order_detail_shipping_province
                                    .' '.$order_detail->order_detail_shipping_postcode.'
                                </div>
                                
                                    <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">BILLING ADDRESS</div>
                                <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                    <div style="font-weight: bold;">'.$order_detail->order_detail_billing_name.' '.$order_detail->order_detail_billing_family.' </div><br>
                                    '.$order_detail->order_detail_billing_address.' '.$order_detail->order_detail_billing_sub_district.' '.$order_detail->order_detail_billing_district.' '.$order_detail->order_detail_billing_province.' '.$order_detail->order_detail_billing_postcode.'
                                </div>
                                
                                <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">SHIPPING DELIVERY</div>
                                <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                    <span style="font-weight: bold;">Date: </span> '.$order_detail->order_detail_shipping_date.' <br>
                                    <span style="font-weight: bold;">Time: </span> '.$order_detail->order_detail_shipping_time.' am<br>
                                </div>
                                
                                
                            <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">ORDER DETAILS</div>';
            $all_calories = 0;
            if(!empty($order)) {
                foreach($order as $r) {
                    $all_calories += $r->order_calories;
                    $message .= '    
                            <div style="border-bottom: 1px solid #ddd; padding: 20px 0 15px;">
                                <div style="width: 25%; display: inline-block; vertical-align: top;"><img src="'.asset($r->order_image).'" style="width: 100%;" alt=""></div>
                                <div style="width: 65%; display: inline-block; vertical-align: top; padding-left: 15px;">
                                    <div style="margin-bottom: 5px;"><span style="font-weight: bold;">'.$r->order_name.'</span> </div>
                                    <div style="margin-bottom: 5px;">Calories '.$r->order_calories.'</div>
                                    <div style="margin-bottom: 10px;">Quantity: '.$r->order_qty.'</div>
                                    <div style="font-weight: normal;">'.number_format($r->order_price, 2, ".", ",").' ';
                                    if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                        $message .= '</div>
                                </div>
                            </div>';
                }
            }

            $message .= '                
                            <div style="margin-top: 20px;">
                                <div style="width: 59%; display: inline-block;">TOTAL CALORIES</div>
                                <div style="width: 39%; display: inline-block; text-align: right;">'.number_format($all_calories, 0, ".", ",").'</div>
                            </div>
                            <div style="margin-top: 10px;">
                                <div style="width: 59%; display: inline-block; font-size: 20px; font-weight: bold;">TOTAL</div>
                                <div style="width: 39%; display: inline-block; text-align: right; font-size: 20px; font-weight: bold;">'.number_format($order_detail->order_detail_total, 0, ".", ",").' THB</div>
                            </div>
                            <div style="margin-top: 10px; font-size: 14px; color: #888;">
                                <div>VAT INCLUDED</div>
                            </div>
                            
                            
                
                        </div>
                        
                        
                        <a style="display: block; background-color: #91c019; color: #fff; text-align: center; text-decoration: none; padding: 10px 0; font-weight: bold; font-size: 15px; margin: 20px 0;" href="'.url('myorder_uploadslip/'.$request->input('order_detail_id')).'" target="_blank">eatfitshop.com</a>
                        
                        </div>
                    </div>   
                </body>
        
            ';

            sendMail($sender, $subject, $message);
        }

        // end ส่งเมล์
        // เรื่มต้น ถ้าเป็น 'Order Processing', 'Shipped', 'Delivered' แล้วไป '', 'Waiting for Payment', 'Order Canceled' ให้ลบแต้ม

        if(($begin == 'Order Processing' or $begin == 'Shipped' or $begin == 'Delivered') and ($end == '' or $end == 'Waiting for Payment' or $end == 'Order Canceled')) {
            $all_point = $current_point - ($result->order_detail_point + $point_);

            $data_point = array(
                'member_point' => $all_point,
                'member_datetime_update' => date('Y-m-d H:i:s'),
                'member_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            DB::table('lv_member')
                ->where('member_id', '=', $result->member_id)
                ->update($data_point);
        }

        // นอกนั้นไม่มีอะไร

        DB::table('lv_order_detail')
            ->where('order_detail_id', '=', $request->input('order_detail_id'))
            ->update($data);

        return redirect('backend/order/form/'.$request->input('order_detail_id'));
    }

    public function loginBackend() {

        return view('auth.login');
    }

    public function ajaxCheckLogin(Request $request) {
        if($request->session()->get('member_id') != '') {
            echo url('cart-shipping');
        } else {
            echo url('cart_login');
        }
    }

    public function saveUpdatelogin(Request $request) {
        $login = DB::table('users')
            ->where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->first();

        if(!empty($login)) {
            $request->session()->put('user_id', $login->id);

            echo $login->id;
        } else {
            echo 0;
        }
    }

    public function logoutBackend(Request $request) {
        $request->session()->forget('user_id');

        return redirect('backend/login');
    }

    public function checkLoginInc(Request $request) {
        $login = DB::table('lv_member')
            ->where('member_email', '=', $request->input('email_inc'))
            ->where('member_password', '=', $request->input('password_inc'))
            ->first();

        if(!empty($login)) {
            $request->session()->put('member_id', $login->member_id);

            $i = 0;
            foreach(ShoppingCart::all() as $r) {
                $i++;
            }

            if($i > 0) {
                echo $login->member_id.'-cart';
            } else {
                echo $login->member_id.'-index';
            }
        } else {
            echo '0';
        }
    }
    
    public function mypoint(Request $request)
    {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }

        //dd(ShoppingCart::all());

        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();
            $wishcount = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
            ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
            ->where('wish_member', '=', $request->session()->get('member_id'))
            ->count();

        $point_text = DB::table('lv_point_text')
            ->orderBy('point_text_id', 'asc')
            ->get();

        $pointRedeem = DB::table('lv_point_redeem_new')
            ->orderBy('lv_point_redeem_new.point_redeem_new_id', 'asc')
            ->get();

        $point = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();

        if(!empty($point)) {
            $point = $point->member_point;
        }

        $data = array(
            'member' => $member,
            'wishcount' => $wishcount,
            'point_text' => $point_text,
            'pointRedeem' => $pointRedeem,
            'point' => $point
        );

        return view('frontend.mypoint', $data);
    }
    
    public function mywishlist(Request $request)
    {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }

        $memberlist = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
            ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
            ->where('wish_member', '=', $request->session()->get('member_id'))
            ->groupBy('tb_wish.wish_menu')
            ->groupBy('tb_wish.wish_member')
            ->get();
            $member = DB::table('lv_member')
                ->where('member_id', '=', $request->session()->get('member_id'))
                ->first();
        $wishcount = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
            ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
            ->where('wish_member', '=', $request->session()->get('member_id'))
            ->groupBy('tb_wish.wish_menu')
            ->groupBy('tb_wish.wish_member')
            ->count();
            // dd($member);
        //     $bestSeller = Products::where('products_bestsellers', '=', 'Yes')
        // ->leftJoin('tb_wish', 'products.products_id', '=', 'tb_wish.wish_menu')
        //     ->orderBy('products_id', 'desc')
        //     ->get();
        $data = array(
            'member' => $member,
            'memberlist' => $memberlist,
            'wishcount' => $wishcount
        );

        return view('frontend.mywishlist', $data);
    }
    public function mywish(Request $request)
    {
        // dd($request);
        if($request->session()->get('member_id') == '') {

            return redirect('register');
        }
        // $member = DB::table('lv_member')
        //     ->where('member_id', '=', $request->session()->get('member_id'))
        //     ->first();
            
        
        // $menu = DB::table('lv_member')
        //     ->where('member_id', $request->id)
        //     ->first();
        if ($request->session()->get('member_id') != '') {
            # code...
        
        if ($request->one == '1') {
            $list = new Wish();
            $list->wish_member = $request->session()->get('member_id');
            $list->wish_menu = $request->id;
            $list->save();
        } 
        // else {
        //     DB::table('tb_wish')->where('wish_id',$id)->delete();
        // }
        if ($request->one == '0') {
            DB::table('tb_wish')->where('wish_menu',$request->id)->where('wish_member',$request->session()->get('member_id'))->delete();
        }
        }
        // $list = new Wish();
        // $list->wish_member = $request->session()->get('member_id');
        // $list->wish_menu = $request->id;
        // $list->save();

        // DB::table('tb_wish')->where('wish_id',$id)->delete();

        // dd($request);
        // DB::table('tb_wish')
        // ->where('wish_id', $request->id)
        // ->update([
        //     'address_shipping' => $request->one
        // ]);
    }
    public function myorder(Request $request)
    {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }

        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();

        $order_detail = DB::table('lv_order_detail')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->orderBy('order_detail_id', 'desc')
            ->get();

        $wishcount = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
            ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
            ->where('wish_member', '=', $request->session()->get('member_id'))
            ->count();
            
        $data = array(
            'member' => $member,
            'order_detail' => $order_detail,
            'wishcount' => $wishcount
        );

        return view('frontend.myorder', $data);
    }

    public function myorder_detail(Request $request, $order_detail_id) {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }
        
        $wishcount = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
            ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
            ->where('wish_member', '=', $request->session()->get('member_id'))
            ->count();

        $order_detail = DB::table('lv_order_detail')
            ->where('order_detail_id', '=', $order_detail_id)
            ->first();

        if(!empty($order_detail)) {
            $datetime_create = explode(' ', $order_detail->order_detail_datetime_create);

            $order = DB::table('lv_order')
                ->where('order_detail_id', '=', $order_detail_id)
                ->orderBy('order_id', 'asc')
                ->get();
        }

        $member = DB::table('lv_member')
            ->join('lv_order_detail', 'lv_member.member_id', '=', 'lv_order_detail.member_id')
            ->where('lv_order_detail.order_detail_id', '=', $order_detail_id)
            ->first();

        $data = array(
            'member' => $member,
            'wishcount' => $wishcount,
            'order_detail' => $order_detail,
            'datetime_create' => $datetime_create[0],
            'order' => $order,
            'order_detail' => $order_detail
        );

        return view('frontend.myorder-detail', $data);
    }

    public function myreviews(Request $request)
    {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }
        $wishcount = DB::table('lv_member')
        ->where('member_id', '=', $request->session()->get('member_id'))
        ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
        ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
        ->where('wish_member', '=', $request->session()->get('member_id'))
        ->count();
        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();
            $order_detail = DB::table('lv_order_detail')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->orderBy('order_detail_id', 'desc')
            ->get();
        $data = array(
            'member' => $member,
            'wishcount' => $wishcount,
            'order_detail' => $order_detail,
        );

        return view('frontend.myreviews', $data);
    }
    public function page_reviews(Request $request ,$id ,$order)
    {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }
        $wishcount = DB::table('lv_member')
        ->where('member_id', '=', $request->session()->get('member_id'))
        ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
        ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
        ->where('wish_member', '=', $request->session()->get('member_id'))
        ->count();
        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();
            $order_detail = DB::table('lv_order_detail')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->where('order_detail_id', '=', $request->session()->get('member_id'))
            ->orderBy('order_detail_id', 'desc')
            ->first();
            $id = $id;
            $order = $order;
            $product = DB::table('products')
            ->where('products_id', '=', $id)
            ->first();
            // dd($id,$order );
        $data = array(
            'member' => $member,
            'wishcount' => $wishcount,
            'order_detail' => $order_detail,
            'product' => $product,
            'id' => $id,
            'order' => $order,
        );

        return view('frontend.page-reviews', $data);
    }
    public function page_reviewsSEE(Request $request ,$id ,$order)
    {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }
        $wishcount = DB::table('lv_member')
        ->where('member_id', '=', $request->session()->get('member_id'))
        ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
        ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
        ->where('wish_member', '=', $request->session()->get('member_id'))
        ->count();
        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();
            $order_detail = DB::table('lv_order_detail')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->where('order_detail_id', '=', $request->session()->get('member_id'))
            ->orderBy('order_detail_id', 'desc')
            ->first();
            $id = $id;
            $order = $order;
            $product = DB::table('products')
            ->where('products_id', '=', $id)
            ->first();
            $reviewAT = DB::table('tb_review')
                     // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                        // ->leftJoin('products', 'tb_review.review_menu', '=', 'products.products_id')
                        // ->leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                        ->where('review_menu', $id)
                        ->where('review_member', Session::get('member_id'))
                        ->where('review_orderno', $order)
                        ->first();
            // dd($id,$order );
        $data = array(
            'member' => $member,
            'wishcount' => $wishcount,
            'order_detail' => $order_detail,
            'product' => $product,
            'id' => $id,
            'order' => $order,
            'reviewAT' => $reviewAT,
        );

        return view('frontend.review_see', $data);
    }
    public function ReviewsSave(Request $request)
    {
        // dd($request);
        //$this->get2Lang();

        $review = new Review();
        $review->review_member = $request->review_member;
        $review->review_menu = $request->review_menu;
        $review->review_title = $request->review_title;
        $review->review_content = $request->review_content;
        $review->review_star = $request->review_star;

        $review->review_orderno = $request->review_orderno;

        $review->review_show = '0';
        $review->review_date = now();
        $review->save();

        if (($request->hasFile('upload_img')) != null)
        {
            $savegalleryimg = $request->file('upload_img');
            foreach($savegalleryimg as $uploadfile) {
                $name = 'image_ReviewFile_'.Str::random(12).".". $uploadfile->getClientOriginalExtension();
                $uploadfile->move(public_path().'/image/ReviewFile/', $name);

                $savegalleryimg = new ReviewFile();
                $savegalleryimg->review_file_file  = 'image/ReviewFile/'.$name;
                $savegalleryimg->review_file_main  = $review->review_id;
                $savegalleryimg->review_file_type  = 'IMG';
                $savegalleryimg->save();
            }
        }
        if (($request->hasFile('upload_vdo')) != null)
        {
            $savegalleryimg = $request->file('upload_vdo');
            foreach($savegalleryimg as $uploadfile) {
                $name = 'image_ReviewFile_'.Str::random(12).".". $uploadfile->getClientOriginalExtension();
                $uploadfile->move(public_path().'/image/ReviewFile/', $name);

                $savegalleryimg = new ReviewFile();
                $savegalleryimg->review_file_file  = 'image/ReviewFile/'.$name;
                $savegalleryimg->review_file_main  = $review->review_id;
                $savegalleryimg->review_file_type  = 'VDO';
                $savegalleryimg->save();
            }
        }


        return redirect('/myreviews');
    }
    public function changepassword(Request $request)
    {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }
        $error1 = '';
        $error2 = '';

        if(!empty($_GET['lang']) and $_GET['lang'] == 'Incorrect Confirm Password') {
            $error1 = 'Incorrect Confirm Password';
        }

        if(!empty($_GET['lang']) and $_GET['lang'] == 'Email is Already') {
            $error2 = 'Email is Already';
        }
        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();
            $wishcount = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
            ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
            ->where('wish_member', '=', $request->session()->get('member_id'))
            ->count();
        $data = array(
            'member' => $member,
            'error1' => $error1,
            'error2' => $error2,
            'wishcount' => $wishcount
        );

        return view('frontend.changepassword', $data);
    }

    public function changepasswordSave(Request $request)
    {
        // dd($request);
        //$this->get2Lang();

        // $pass = Str::random(12);
        $forgot = DB::table('lv_member')->where('member_id', '=', $request->session()->get('member_id'))->update(['member_password' =>  $request->New_Password]);
        // $forgot =  DB::table('lv_member')->where('member_email', $request->forgotpassword)->first();
        // // $forgot->member_password = Hash::make($pass);
        // $forgot->member_password = $pass;
        // $forgot->save();


        return redirect('/myprofile');
    }

    public function SendMailThankyou($order_detail_id) {
        $order_detail = DB::table('lv_order_detail')
            ->where('order_detail_id', '=', $order_detail_id)
            ->first();

        $order = DB::table('lv_order') 
            ->where('order_detail_id', '=', $order_detail_id)
            ->orderBy('order_id', 'asc')
            ->get();

        //$sender = array('customerrelation@gourmetprimo.com');
        $sender = array('sales@gourmetprimo.com');
        $sender[] = 'ordering@gourmetprimo.com';
        $sender[] = $order_detail->order_detail_shipping_email;

        $subject = 'eatfit :: Thank You Order No. '.$order_detail->order_no;

        $message = '
                <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
            </head>
            
            <body>
                <div style="width: 100%; max-width: 600px; margin: 0 auto;">
                <div style="text-align: center; margin: 15px 0;"><img src="'.asset('files/frontend/images/logo_031.jpg').'" alt="" style="width: 150px;"></div>
                    <div style="background-color: #74bda2; color: #fff; text-align: center; padding: 15px;">
                        <div style="font-size: 24px;">ORDER CONFIRMATION</div>
                    </div>
                    <div>
                        <h3 style="margin: 40px 0 20px; font-size: 16px;">'.$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family.', Thank you for your order!</h3>
                        <div style="line-height: 26px; margin-bottom: 30px;">
                        Kindly note that your order will be processed once payment is received. Your payment should be made within one hour of your online order.
                        <p><b> 
                        The Bangkok Bank details are: account number <span style="color: #91c019;">862-0161268</span>
                        </b></p>
                        </div>
                    
                        <div style="margin-top: 15px;">
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Order Number:</span> '.$order_detail->order_no.'</div>
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Date:</span> '.date('d/m/Y').'</div>
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Payment Method:</span> '.$order_detail->order_detail_payment_method.'</div>
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Promotion Code:</span> -</div>
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Discount:</span> '.number_format($order_detail->order_detail_discount, 2, ".", ",").' ';
                            if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                $message .= '</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Shipping:</span> '.number_format($order_detail->order_detail_shipping, 0, ".", ",").' ';
                                if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                    $message .= '</div>
                            
                            
                            <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">SHIPPING ADDRESS</div>
                            <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                <div style="font-weight: bold;">'.$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family.' </div><br>
                                '.$order_detail->order_detail_shipping_address
                                .' '.$order_detail->order_detail_shipping_sub_district
                                .' '.$order_detail->order_detail_shipping_district
                                .' '.$order_detail->order_detail_shipping_province
                                .' '.$order_detail->order_detail_shipping_postcode.'
                            </div>
                            
                                <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">BILLING ADDRESS</div>
                            <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                <div style="font-weight: bold;">'.$order_detail->order_detail_billing_name.' '.$order_detail->order_detail_billing_family.' </div><br>
                                '.$order_detail->order_detail_billing_address.' '.$order_detail->order_detail_billing_sub_district.' '.$order_detail->order_detail_billing_district.' '.$order_detail->order_detail_billing_province.' '.$order_detail->order_detail_billing_postcode.'
                            </div>
                            
                            <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">SHIPPING DELIVERY</div>
                            <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                <span style="font-weight: bold;">Date: </span> '.$order_detail->order_detail_shipping_date.' <br>
                                <span style="font-weight: bold;">Time: </span> '.$order_detail->order_detail_shipping_time.' am<br>
                            </div>
                            
                            
                        <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">ORDER DETAILS</div>';
        $all_calories = 0;
        if(!empty($order)) {
            foreach($order as $r) {
                $all_calories += $r->order_calories;
                $message .= '    
                        <div style="border-bottom: 1px solid #ddd; padding: 20px 0 15px;">
                            <div style="width: 25%; display: inline-block; vertical-align: top;"><img src="'.asset($r->order_image).'" style="width: 100%;" alt=""></div>
                            <div style="width: 65%; display: inline-block; vertical-align: top; padding-left: 15px;">
                                <div style="margin-bottom: 5px;"><span style="font-weight: bold;">'.$r->order_name.'</span> </div>
                                <div style="margin-bottom: 5px;">Calories '.$r->order_calories.'</div>
                                <div style="margin-bottom: 10px;">Quantity: '.$r->order_qty.'</div>
                                <div style="font-weight: normal;">'.number_format($r->order_price, 2, ".", ",").' ';
                                if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                    $message .= '</div>
                            </div>
                        </div>';
            }
        }

        $message .= '                
                        <div style="margin-top: 20px;">
                            <div style="width: 59%; display: inline-block;">TOTAL CALORIES</div>
                            <div style="width: 39%; display: inline-block; text-align: right;">'.number_format($all_calories, 0, ".", ",").'</div>
                        </div>
                        <div style="margin-top: 10px;">
                            <div style="width: 59%; display: inline-block; font-size: 20px; font-weight: bold;">TOTAL</div>
                            <div style="width: 39%; display: inline-block; text-align: right; font-size: 20px; font-weight: bold;">'.number_format($order_detail->order_detail_total, 0, ".", ",").' ';
                            if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                $message .= '</div>
                        </div>
                        <div style="margin-top: 10px; font-size: 14px; color: #888;">
                            <div>VAT INCLUDED</div>
                        </div>
                        
                        
            
                    </div>   

                    Please click on the link below to upload your payment slip.
                    <a style="display: block; background-color: #91c019; color: #fff; text-align: center; text-decoration: none; padding: 10px 0; font-weight: bold; font-size: 15px; margin: 20px 0;" href="'.url('myorder_uploadslip/'.$order_detail_id).'" target="_blank">eatfitshop.com</a>
                    
                    </div>
                </div>   
            </body>
     
        ';
        sendMail($sender, $subject, $message);
    }

    public function SendMailCredit($order_detail_id) {
        $order_detail = DB::table('lv_order_detail')
            ->where('order_detail_id', '=', $order_detail_id)
            ->first();

        $order = DB::table('lv_order') 
            ->where('order_detail_id', '=', $order_detail_id)
            ->orderBy('order_id', 'asc')
            ->get();

        
        $sender = array('sales@gourmetprimo.com');
        $sender[] = 'ordering@gourmetprimo.com';

        $sender[] = $order_detail->order_detail_shipping_email;

        $subject = 'eatfit :: Thank You Order No. '.$order_detail->order_no;

        $message = '
                <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
            </head>
            
            <body>
                <div style="width: 100%; max-width: 600px; margin: 0 auto;">
                <div style="text-align: center; margin: 15px 0;"><img src="'.asset('files/frontend/images/logo_031.jpg').'" alt="" style="width: 150px;"></div>
                    <div style="background-color: #74bda2; color: #fff; text-align: center; padding: 15px;">
                        <div style="font-size: 24px;">';
        if(Session::get('lang') == 'th') {
            $message .= 'การยืนยันคำสั่งซื้อ';
        } else {
            $message .= 'ORDER CONFIRMATION';
        }

        $message .= '
                        </div>
                    </div>
                    <div>
                        <h3 style="margin: 40px 0 20px; font-size: 16px;">'.$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family.',  thank you for your payment!</h3>
                        <div style="line-height: 26px; margin-bottom: 30px;">';
        
        if(Session::get('lang') == 'th') {
            $message .= 'เราได้รับคำสั่งซื้อของคุณแล้ว และจะดำเนินการในไม่ช้า คุณสามารถตรวจสอบสถานะการขนส่งได้ที่เว็บไซต์ โดยลงชื่อเข้าใช้บัญชีของคุณ และคลิกที่ตัวเลือกคำสั่งซื้อ';
        } else {
            $message .= 'We’ve received your order and will be processing it shortly. You can check your delivery status on our website by logging into your account and click the Order button.';
        }

        $message .= '
                        </b></p>
                        </div>
                    
                        <div style="margin-top: 15px;">
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">';
        if(Session::get('lang') == 'th') {
            $message .= '  
                            หมายเลขคำสั่งซื้อ';
        } else {
            $message .= '  
                            Order Number';
        }
                            
                            
        $message .= '
                            :</span> '.$order_detail->order_no.'</div>
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">';
        if(Session::get('lang') == 'th') {
            $message .= '
                            วันที่';
        } else {
            $message .= '
                            วันที่';
        }
                            
        $message .= '
                            :</span> '.date('d/m/Y').'</div>
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">';
        if(Session::get('lang') == 'th') {
            $message .= '
                            ช่องทางการชำระเงิน';
        } else {
            $message .= '
                            Payment Method'; 
        }
                            
        $message .= '
                            :</span> '.$order_detail->order_detail_payment_method.'</div>
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">';
        
        if(Session::get('lang') == 'th') {
            $message .= '
                            รหัสโปรโมชัน';
        } else {
            $message .= '
                            Promotion Code';
        }
                            
        
        $message .= '
                            :</span> -</div>
                            <div style="margin-bottom: 10px;"><span style="font-weight: bold;">';
        if(Session::get('lang') == 'th') {
            $message .= '
                            ส่วนลด';
        } else {
            $message .= '
                            Discount';
        }
                            
        $message .= '
                            :</span> '.number_format($order_detail->order_detail_discount, 2, ".", ",").' ';
                            if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                $message .= '</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Shipping:</span> '.number_format($order_detail->order_detail_shipping, 0, ".", ",").' ';
                                if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                    $message .= '</div>
                            
                            
                            <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">';
        if(Session::get('lang') == 'th') {
            $message .= '
                            ที่อยู่สำหรับจัดส่ง';
        } else {
            $message .= '
                            SHIPPING ADDRESS';
        }
                            
        $message .= '
                            </div>
                            <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                <div style="font-weight: bold;">'.$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family.' </div><br>
                                '.$order_detail->order_detail_shipping_address
                                .' '.$order_detail->order_detail_shipping_sub_district
                                .' '.$order_detail->order_detail_shipping_district
                                .' '.$order_detail->order_detail_shipping_province
                                .' '.$order_detail->order_detail_shipping_postcode.'
                            </div>
                            
                                <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">';
        if(Session::get('lang') == 'th') {
            $message .= '
                            ที่อยู่การเรียกเก็บเงิน';
        } else {
            $message .= '
                            BILLING ADDRESS';
        }
                                
                            
        $message .= '
                            </div>
                            <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                <div style="font-weight: bold;">'.$order_detail->order_detail_billing_name.' '.$order_detail->order_detail_billing_family.' </div><br>
                                '.$order_detail->order_detail_billing_address.' '.$order_detail->order_detail_billing_sub_district.' '.$order_detail->order_detail_billing_district.' '.$order_detail->order_detail_billing_province.' '.$order_detail->order_detail_billing_postcode.'
                            </div>
                            
                            <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">';
        if(Session::get('lang') == 'th') {
            $message .= '
                            การจัดส่งและการขนส่ง';
        } else {
            $message .= '
                            SHIPPING DELIVERY';
        }
                            
        $message .= '
                            </div>
                            <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                <span style="font-weight: bold;">';
        if(Session::get('lang') == 'th') {
            $message .= '    
                            วันที่';
        } else {
            $message .= '    
                            Date';
        }
                                
        $message .= '
                            : </span> '.$order_detail->order_detail_shipping_date.' <br>
                                <span style="font-weight: bold;">';
        if(Session::get('lang') == 'th') {
            $message .= '    
                            เวลา';
        } else {
            $message .= '    
                            Time';
        }

        $message .= '
                                : </span> '.$order_detail->order_detail_shipping_time.' am<br>
            
                        <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">';
        if(Session::get('lang') == 'th') {
            $message .= '
                        รายละเอียดคำสั่งซื้อ';
        } else {
            $message .= '
                        ORDER DETAILS';
        }
                        
        
        $message .= '
                        </div>';
        $all_calories = 0;
        if(!empty($order)) {
            foreach($order as $r) {
                $all_calories += $r->order_calories;
                $message .= '    
                        <div style="border-bottom: 1px solid #ddd; padding: 20px 0 15px;">
                            <div style="width: 25%; display: inline-block; vertical-align: top;"><img src="'.asset($r->order_image).'" style="width: 100%;" alt=""></div>
                            <div style="width: 65%; display: inline-block; vertical-align: top; padding-left: 15px;">
                                <div style="margin-bottom: 5px;"><span style="font-weight: bold;">'.$r->order_name.'</span> </div>
                                <div style="margin-bottom: 5px;">';
                if(Session::get('lang') == 'th') {
                    $message .=     'แคลอรี';
                } else {
                    $message .=     'Calories';
                }                
                 
                                
                $message .=     $r->order_calories.'</div>
                                <div style="margin-bottom: 10px;">';
                if(Session::get('lang') == 'th') {
                    $message .=     'จำนวน';
                } else {
                    $message .=     'Quantity';
                }
                
                
                $message .=     ': '.$r->order_qty.'</div>
                                <div style="font-weight: normal;">'.number_format($r->order_price, 2, ".", ",");
                if(Session::get('lang') == 'th') {
                    $message .=         ' บาท';
                } else {
                    $message .=         ' THB';
                }
                                

                $message .= '
                                </div>
                            </div>
                        </div>';
            }
        }

        $message .= '                
                        <div style="margin-top: 20px;">
                            <div style="width: 59%; display: inline-block;">';
        if(Session::get('lang') == 'th') {
            $message .= 'พลังงานแคลอรีทั้งหมด';
        } else {
            $message .= 'TOTAL CALORIES';
        }
                            
        
        $message .= '
                        </div>
                            <div style="width: 39%; display: inline-block; text-align: right;">'.number_format($all_calories, 0, ".", ",").'</div>
                        </div>
                        <div style="margin-top: 10px;">
                            <div style="width: 59%; display: inline-block; font-size: 20px; font-weight: bold;">';
        if(Session::get('lang') == 'th') {
            $message .= '
                            ยอดรวมสุทธิ';
        } else {
            $message .= '
                            TOTAL';
        }
                            
        $message .= '     
                            </div>
                            <div style="width: 39%; display: inline-block; text-align: right; font-size: 20px; font-weight: bold;">'.number_format($order_detail->order_detail_total, 0, ".", ",").' ';
                            if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                $message .= '</div>
                        </div>
                        <div style="margin-top: 10px; font-size: 14px; color: #888;">
                            <div>';
        if(Session::get('lang') == 'th') {
            $message .= 'รวมภาษีมูลค่าเพิ่ม';
        } else {
            $message .= 'VAT INCLUDED';
        }
        
        $message .= '       </div>
                        </div>
                        
                        
            
                    </div>';
        if(Session::get('lang') == 'th') {
            $message .= '
                    กรุณาคลิกที่ลิงก์ด้านล่างเพื่ออัปโหลดหลักฐานการชำระเงิน';
        } else {
            $message .= '
                    Please click on the link below to upload your payment slip.';
        }   

        $message .= '
                    <a style="display: block; background-color: #91c019; color: #fff; text-align: center; text-decoration: none; padding: 10px 0; font-weight: bold; font-size: 15px; margin: 20px 0;" href="'.url('myorder_uploadslip/'.$order_detail_id).'" target="_blank">eatfitshop.com</a>
                    
                    </div>
                </div>   
            </body>
     
        ';
        sendMail($sender, $subject, $message);
    }

    public function myorder_uploadslip(Request $request, $id)
    {
        if($request->session()->get('member_id') == '') {
            return redirect('cart_login');
        }
        
        $wishcount = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
            ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
            ->where('wish_member', '=', $request->session()->get('member_id'))
            ->count();

        $member = DB::table('lv_member')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->first();
        
        $order_detail = DB::table('lv_order_detail')
            ->where('member_id', '=', $request->session()->get('member_id'))
            ->where('order_detail_id', '=', $id)
            ->orderBy('order_detail_id', 'desc')
            ->first();
            
            $id = $id;
            
        $product = DB::table('products')
            ->where('products_id', '=', $id)
            ->first();
            // dd($id);

        $order_detail = DB::table('lv_order_detail')
            ->where('order_detail_id', '=', $id)
            ->first();

        $data = array(
            'member' => $member,
            'wishcount' => $wishcount,
            'order_detail' => $order_detail,
            'product' => $product,
            'id' => $id,
            'order_detail' => $order_detail
        );

        return view('frontend.myorder-uploadslip', $data);
    }

    public function saveUpdatePayment(Request $request) {
        $data = array(
            'order_detail_id' => $request->input('order_detail_id'),
            'payment_phone_number' => $request->input('payment_phone_number'),
            'payment_amount' => $request->input('payment_amount'),
            'payment_time' => $request->input('payment_time'),
            'payment_message' => $request->input('payment_message'),
            'payment_datetime_create' => date('Y-m-d H:i:s'),
            'payment_ip_create' => $_SERVER['REMOTE_ADDR']
        );

        $date = explode('/', $request->input('payment_date'));

        if(!empty($date[2])) {
            $data['payment_date'] = $date[2].'-'.$date[0].'-'.$date[1];
        }

        if(!empty($_FILES['payment_slip']['tmp_name'])) {
            if(move_uploaded_file($_FILES['payment_slip']['tmp_name'], 'local/storage/app/pick_your_plan/'.$_FILES['payment_slip']['name'])) {
                $data['payment_slip'] = $_FILES['payment_slip']['name'];
            }
        }

        DB::table('lv_payment')
            ->insert($data);

        $this->SendMailUploadSlip($request->input('order_detail_id'));

        //return redirect("myorder_uploadslip/".$request->input('order_detail_id')."?status=success");
        return redirect("thankyou_order");
    }

    public function SendMailUploadSlip($order_detail_id) {
        $order_detail = DB::table('lv_order_detail')
            ->where('order_detail_id', '=', $order_detail_id)
            ->first();

        $order = DB::table('lv_order') 
            ->where('order_detail_id', '=', $order_detail_id)
            ->orderBy('order_id', 'asc')
            ->get();

        if(!empty($order_detail) and !empty($order)) {
            //$sender = array('customerrelation@gourmetprimo.com');
            $sender = array('sales@gourmetprimo.com');
            $sender[] = 'ordering@gourmetprimo.com';
            $sender[] = $order_detail->order_detail_shipping_email;

            $subject = 'eatfit :: Thank You Order No. '.$order_detail->order_no;

            $message = '
                    <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
                </head>
                
                <body>
                    <div style="width: 100%; max-width: 600px; margin: 0 auto;">
                    <div style="text-align: center; margin: 15px 0;"><img src="'.asset('files/frontend/images/logo_031.jpg').'" alt="" style="width: 150px;"></div>
                        <div style="background-color: #74bda2; color: #fff; text-align: center; padding: 15px;">
                            <div style="font-size: 24px;">ORDER CONFIRMATION</div>
                        </div>
                        <div>
                            <h3 style="margin: 40px 0 20px; font-size: 16px;">'.$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family.', Thank you for your payment!</h3>
                            <div style="line-height: 26px; margin-bottom: 30px;">
                            We’ve received your order and will be processing it shortly. You can check your delivery status on our website by logging into your account and click the Order button.
                            
                            </div>
                        
                            <div style="margin-top: 15px;">
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Order Number:</span> '.$order_detail->order_no.'</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Date:</span> '.date('d/m/Y').'</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Payment Method:</span> '.$order_detail->order_detail_payment_method.'</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Promotion Code:</span> -</div>
                                <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Discount:</span> '.number_format($order_detail->order_detail_discount, 2, ".", ",").' ';
                                if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                    $message .= '</div>
                                    <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Shipping:</span> '.number_format($order_detail->order_detail_shipping, 0, ".", ",").' ';
                                    if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                        $message .= '</div>
                                
                                
                                <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">SHIPPING ADDRESS</div>
                                <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                    <div style="font-weight: bold;">'.$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family.' </div><br>
                                    '.$order_detail->order_detail_shipping_address
                                    .' '.$order_detail->order_detail_shipping_sub_district
                                    .' '.$order_detail->order_detail_shipping_district
                                    .' '.$order_detail->order_detail_shipping_province
                                    .' '.$order_detail->order_detail_shipping_postcode.'
                                </div>
                                
                                    <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">BILLING ADDRESS</div>
                                <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                    <div style="font-weight: bold;">'.$order_detail->order_detail_billing_name.' '.$order_detail->order_detail_billing_family.' </div><br>
                                    '.$order_detail->order_detail_billing_address.' '.$order_detail->order_detail_billing_sub_district.' '.$order_detail->order_detail_billing_district.' '.$order_detail->order_detail_billing_province.' '.$order_detail->order_detail_billing_postcode.'
                                </div>
                                
                                <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">SHIPPING DELIVERY</div>
                                <div style="margin-bottom: 10px; background-color: #f6f6f6; padding: 20px 30px;">
                                    <span style="font-weight: bold;">Date: </span> '.$order_detail->order_detail_shipping_date.' <br>
                                    <span style="font-weight: bold;">Time: </span> '.$order_detail->order_detail_shipping_time.' am<br>
                                </div>
                                
                                
                            <div style="font-size: 16px; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">ORDER DETAILS</div>';
            $all_calories = 0;
            if(!empty($order)) {
                foreach($order as $r) {
                    $all_calories += $r->order_calories;
                    $message .= '    
                            <div style="border-bottom: 1px solid #ddd; padding: 20px 0 15px;">
                                <div style="width: 25%; display: inline-block; vertical-align: top;"><img src="'.asset($r->order_image).'" style="width: 100%;" alt=""></div>
                                <div style="width: 65%; display: inline-block; vertical-align: top; padding-left: 15px;">
                                    <div style="margin-bottom: 5px;"><span style="font-weight: bold;">'.$r->order_name.'</span> </div>
                                    <div style="margin-bottom: 5px;">Calories '.$r->order_calories.'</div>
                                    <div style="margin-bottom: 10px;">Quantity: '.$r->order_qty.'</div>
                                    <div style="font-weight: normal;">'.number_format($r->order_price, 2, ".", ",").' ';
                                    if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                        $message .= '</div>
                                </div>
                            </div>';
                }
            }

            $message .= '                
                            <div style="margin-top: 20px;">
                                <div style="width: 59%; display: inline-block;">TOTAL CALORIES</div>
                                <div style="width: 39%; display: inline-block; text-align: right;">'.number_format($all_calories, 0, ".", ",").'</div>
                            </div>
                            <div style="margin-top: 10px;">
                                <div style="width: 59%; display: inline-block; font-size: 20px; font-weight: bold;">TOTAL</div>
                                <div style="width: 39%; display: inline-block; text-align: right; font-size: 20px; font-weight: bold;">'.number_format($order_detail->order_detail_total, 0, ".", ",").' ';
                                if(Session::get('lang') == 'th') $message .= 'บาท'; else $message .= 'THB';
                                    $message .= '</div>
                            </div>
                            <div style="margin-top: 10px; font-size: 14px; color: #888;">
                                <div>VAT INCLUDED</div>
                            </div>
                            
                            
                
                        </div>   

                        Please click on the link below to upload your payment slip.
                        <a style="display: block; background-color: #91c019; color: #fff; text-align: center; text-decoration: none; padding: 10px 0; font-weight: bold; font-size: 15px; margin: 20px 0;" href="'.url('myorder_uploadslip/'.$order_detail_id).'" target="_blank">eatfitshop.com</a>
                        
                        </div>
                    </div>   
                </body>
         
            ';
            sendMail($sender, $subject, $message);
        }
    }

    public function terms() {
        $this->get2Lang();

        return view('frontend.terms');
    }

    public function ajaxCheckEmail(Request $request) {
        $checkmember = DB::table('lv_member')
            ->where('member_email', '=', $request->input('member_email'))
            ->first();

        if(!empty($checkmember)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function ajaxCheckShipping(Request $request) {
        // วันพรุ่งนี้
        $day = $request->input('day');
        $current_date = date('Y-m-d', strtotime("+".$day." day", strtotime(date('Y-m-d'))));

        // วันที่เลือก
        $date = explode('/', $request->input('date'));
        
        if(!empty($date[2])) {
            $year = $date[2];
            $month = $date[0];
            $day = $date[1];

            $day_select = $year.'-'.$month.'-'.$day;

            if($current_date > $day_select) {
                echo 'Invalid Date';
            } elseif($current_date == $day_select and date('H') >= 12) {
                echo 'Hide';
            } else {
                echo 'Show';
            }
        }
    }

    public function response_url(Request $request) {
        $change_status = DB::table('lv_charge')
            ->where('charge_test_mcc', 'like', '%"'.$_POST['objectId'].'"%')
            ->first();

        $member_id = $change_status->member_id;

        $order_no = json_decode($change_status->charge_test_mcc, true);
        
        if(!empty($order_no)) {
            //echo $order_no['reference_order'];
            $order_no_ = explode('-', $order_no['reference_order']);

            $data = array(
                'order_detail_status' => 'Order Processing',
                'order_detail_datetime_update' => date('Y-m-d H:i:s'),
                'order_detail_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            DB::table('lv_order_detail')
                ->where('order_no', '=', $order_no_[0])
                ->update($data);

            $order_detail_id = DB::table('lv_order_detail')
                ->where('order_no', '=', $order_no_[0])
                ->first();

            $order = DB::table('lv_order_detail')
                ->where('lv_order_detail.order_no', '=', $order_no_[0])
                ->join('lv_order', 'lv_order_detail.order_detail_id', '=', 'lv_order.order_detail_id')
                //->where('point_redeem', '<>', '')
                ->first();

            if(!empty($order)) {
                $point_ = $order->point_redeem;
            } else {
                $point_ = 0;
            }

            if(!empty($order)) {

                $member = DB::table('lv_member')
                    ->where('member_id', '=', $member_id)
                    ->first();

                if(!empty($member)) {
                    $member_point = $member->member_point + $order->order_detail_point - $point_;

                    $data = array(
                        'member_point' => $member_point,
                        'member_datetime_update' => date('Y-m-d H:i:s'),
                        'member_ip_update' => $_SERVER['REMOTE_ADDR']
                    );

                    DB::table('lv_member')
                        ->where('member_id', '=', $member_id)
                        ->update($data);
                }
            }

            $this->SendMailCredit($order_detail_id->order_detail_id);

            return redirect('thankyou/'.$order_detail_id->order_detail_id);
        }
    }

    public function ajaxForgotPassword(Request $request) {
        $email = DB::table('lv_member')
            ->where('member_email', $request->input('email'))
            ->first();

        if(!empty($email)) {
            $md5 = md5(rand());

            $data = array(
                'member_forgot_password' => $md5,
                'member_datetime_update' => date('Y-m-d H:i:s'),
                'member_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            DB::table('lv_member')
                ->where('member_email', '=', $request->input('email'))
                ->update($data);

            $sender = array($request->input('email'));

            $subject = 'eatfit :: Forget Password';

            $message = '
                Forget Password <a href="'.url('change_password/'.$md5).'">Here</a>
            ';

            sendMail($sender, $subject, $message);

            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function change_password($md5) {
        $check_md5 = DB::table('lv_member')
            ->where('member_forgot_password', '=', $md5)
            ->first();

        if(empty($check_md5)) {
            echo '<script>alert("Incorrect Token");</script>';
            $data = array(
                'typeText' => 'disabled',
                'md5' => ''
            );
        } else {
            $data = array(
                'typeText' => '',
                'md5' => $md5
            );
        }

        return view('frontend.change_password', $data);
    }

    public function ajaxChangePassword(Request $request) {
        $data = array(
            'member_password' => $request->input('member_password'),
            'member_forgot_password' => ''
        );
        
        $check_md5 = DB::table('lv_member')
            ->where('member_forgot_password', '=', $request->input('md5'))
            ->update($data);

        echo 'true';
    }

    // Login Facebook
    public function redirectToProvider($provider = 'facebook')
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider = 'facebook')
    {
        $providerUser = Socialite::driver($provider)->user();
            
        $user = $this->createOrGetUser($provider, $providerUser);
        auth()->login($user);

        return redirect()->to('/home');
    }

    public function createOrGetUser($provider, $providerUser)
    {
        /** Get Social Account */
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            /** Get user detail */
            $userDetail = Socialite::driver($provider)->userFromToken($providerUser->token);

            /** Create new account */
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider,
            ]);

            /** Get email or not */
            $email = !empty($providerUser->getEmail()) ? $providerUser->getEmail() : $providerUser->getId() . '@' . $provider . '.com';

            /** Get User Auth */
            if (auth()->check()) {
                $user = auth()->user();
            }else{
                $user = User::whereEmail($email)->first();
            }

            if (!$user) {
                /** Get Avatar */
                $image = $provider . "_" . $providerUser->getId() . ".png";
                $imagePath = public_path(config('app.media.directory') . "users/avatar/" . $image);
                file_put_contents($imagePath, file_get_contents($providerUser->getAvatar()));


                /** Create User */
                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'username' => $providerUser->getId(),
                    'avatar' => $image,
                    'password' => bcrypt(rand(1000, 9999)),
                ]);

            }

            /** Attach User & Social Account */
            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
    // End Login Facebook

    public function thankyou_order() {


        return view('frontend.thankyou_order');
    }

    public function ajaxPromoCodeFrontend(Request $request) {
        $sub_total = 0;
        $qty = 0;
        foreach(ShoppingCart::all() as $r) {
            $price = $r->qty * $r->price;

            $sub_total += $price;

            $qty += $r->qty;
        }

        $promocode = DB::table('lv_promocode')
            ->where('sub_total_complete', '<=', $sub_total)
            ->where('amount_limit', '>', 0)
            ->where('promocode_name', '=', $request->input('promocode_frontend'))
            ->where('promocode_begin_date', '<=', date('Y-m-d'))
            ->where('promocode_end_date', '>=', date('Y-m-d'))
            ->first();

        /*$check_promocode = DB::table('lv_order_detail')
            ->where('promocode_name', '=', $request->input('promocode_frontend'))
            ->get();

        $count_promocode = count($check_promocode);*/

        if(!empty($promocode)) {
            session(['promocode_name' => $promocode->promocode_name, 'promocode_discount' => $promocode->promocode_discount, 'promocode_type' => $promocode->promocode_type, 'giftset_id' => $promocode->giftset_id, 'promocode_free_shipping' => $promocode->promocode_free_shipping]);

            if($promocode->promocode_free_shipping == 'No') {
                $request->session()->forget(['promocode_free_shipping']);
            }
        } else {
            $request->session()->forget(['promocode_name', 'promocode_discount', 'promocode_type', 'giftset_id', 'promocode_free_shipping']);
        }

        $this->ajaxCart($request);
    }

    public function ajaxWishList(Request $request) {
        $data = array(
            'wish_member' => Session::get('member_id'),
            'wish_menu' => $request->input('products_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        DB::table('tb_wish')
            ->insert($data);

        echo 'Add to Favourite';
    }

    public function getSessionAll() {
        //Session::flush();
        dd(Session::all());
    }

    public function setPoint() {
        $data = array(
            'member_point' => 0
        );

        DB::table('lv_member')
            ->update($data);

        $point_add = DB::table('lv_order_detail')
            ->where('lv_order_detail.order_detail_status', '!=', 'Waiting for Payment')
            ->where('lv_order_detail.order_detail_status', '!=', 'Order Canceled')  
            ->get();

        if(!empty($point_add)) {
            foreach($point_add as $r_add) {
                $member = DB::table('lv_member')
                    ->where('member_id', '=', $r_add->member_id)
                    ->first();

                if(!empty($member)) {
                    $point = $member->member_point + $r_add->order_detail_point;
                }

                //echo $point.'<br>';

                $data = array(
                    'member_point' => $point
                );

                DB::table('lv_member')
                    ->where('member_id', '=', $r_add->member_id)
                    ->update($data);
            }
        }

        $point_delete = DB::table('lv_order_detail')
            ->where('lv_order_detail.order_detail_status', '!=', 'Waiting for Payment')
            ->where('lv_order_detail.order_detail_status', '!=', 'Order Canceled')
            ->join('lv_order', 'lv_order_detail.order_detail_id', '=', 'lv_order.order_detail_id') 
            ->get();

        if(!empty($point_delete)) {
            foreach($point_delete as $r_delete) {
                $member = DB::table('lv_member')
                    ->where('member_id', '=', $r_delete->member_id)
                    ->first();

                    if(!empty($member)) {
                        $point = $member->member_point - $r_delete->point_redeem;
                    }
    
                    $data = array(
                        'member_point' => $point
                    );
    
                    DB::table('lv_member')
                        ->where('member_id', '=', $member->member_id)
                        ->update($data);
            }
        } 
    }
}
