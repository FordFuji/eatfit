<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderdetail;
use App\Payment;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class PromocodeController extends Controller {

    public function promocode() {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $promocode = DB::table('lv_promocode')
            ->orderBy('promocode_id', 'asc')
            ->get();

        $giftset = DB::table('lv_giftset')
            ->orderBy('giftset_id', 'asc')
            ->get();

        $data = array(
            'promocode' => $promocode,
            'giftset' => $giftset
        );
        
        return view('backend.promocode.list', $data);
    }

    public function promocode_form(Request $request, $promocode_id = '') {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $row = DB::table('lv_promocode')
            ->where('promocode_id', '=', $promocode_id)
            ->first();

        $data = array(
            'row' => $row
        );

        $data['giftset'] = DB::table('lv_giftset')->orderBy('giftset_id', 'asc')->get();

        return view('backend.promocode.form', $data);
    }

    
    public function saveUpdatepromocode(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = array(
            'sub_total_complete' => $request->input('sub_total_complete'),
            'amount_limit' => $request->input('amount_limit'),
            'promocode_name' => $request->input('promocode_name'),
            'promocode_discount' => $request->input('promocode_discount'),
            'promocode_type' => $request->input('promocode_type'),
            'promocode_begin_date' => $request->input('promocode_begin_date'),
            'promocode_end_date' => $request->input('promocode_end_date'),
            'promocode_datetime_update' => date('Y-m-d H:i:s'),
            'promocode_ip_update' => $_SERVER['REMOTE_ADDR'],
        );

        if($request->input('giftset_id') != '') {
            $data['giftset_id'] = $request->input('giftset_id');
        } else {
            $data['giftset_id'] = 0;
        }

        if($request->input('promocode_free_shipping') == 'Yes') {
            $data['promocode_free_shipping'] = 'Yes';
        } else {
            $data['promocode_free_shipping'] = 'No';
        }

        if($request->input('promocode_id') != '') {
            // update
            DB::table('lv_promocode')
                ->where('promocode_id', '=', $request->input('promocode_id'))
                ->update($data);
        } else {
            // insert
            $data['promocode_datetime_create'] = date('Y-m-d H:i:s');
            $data['promocode_ip_create'] = $_SERVER['REMOTE_ADDR'];

            DB::table('lv_promocode')
                ->insert($data);
        }

        return redirect('backend/promocode');

    }

    public function promocode_delete(Request $request, $promocode_id) {
        DB::table('lv_promocode')
            ->where('promocode_id', '=', $promocode_id)
            ->delete();

        return redirect('backend/promocode');
    }
}
