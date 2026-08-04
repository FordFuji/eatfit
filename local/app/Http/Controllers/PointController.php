<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class PointController extends Controller
{
    // Point Text
    public function point_text()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $rows = DB::table('lv_point_text')
            ->orderBy('point_text_id', 'asc')
            ->get();

        $data = array(
            'rows' => $rows
        );

        return view('backend.point_text.form', $data);
    }

    public function proint_text_save_update(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $point_text_name_th = $request->input('point_text_name_th');
        $point_text_name_en = $request->input('point_text_name_en');

        $i = 0;
        if(!empty($point_text_name_th)) {
            DB::table('lv_point_text')
                ->truncate();

            foreach($point_text_name_th as $name_th) {
                $data = array(
                    'point_text_name_th' => $name_th,
                    'point_text_name_en' => $point_text_name_en[$i],
                    'point_text_datetime_create' => date('Y-m-d H:i:s'),
                    'point_text_ip_create' => $_SERVER['REMOTE_ADDR']
                );

                DB::table('lv_point_text')
                    ->insert($data);

                $i++;
            }
        }

        return redirect('backend/point_text');

    }
    // End Point Text

    // Point Redeem
    public function point_redeem() {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $point_redeem = DB::table('lv_point_redeem_new')
            ->orderBy('lv_point_redeem_new.point_redeem_new_id', 'asc')
            ->get();

        $data = array(
            'point_redeem' => $point_redeem
        );

        return view('backend.point_redeem.list', $data);
    }

    public function point_redeem_form(Request $request, $point_redeem_new_id = '') {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $row = DB::table('lv_point_redeem_new')
            ->where('point_redeem_new_id', '=', $point_redeem_new_id)
            ->first();

        $products = DB::table('products')
            ->orderBy('name_products_thai', 'asc')
            ->get();

        $data = array(
            'row' => $row,
            'products' => $products
        );

        return view('backend.point_redeem.form', $data);
    }

    public function point_redeem_save_update(Request $request, $point_redeem_new_id = '') {
        $data = array(
            'point_redeem_new_type' => $request->input('point_redeem_new_type'),
            'point_redeem_new_point' => $request->input('point_redeem_new_point'),
            'point_redeem_new_datetime_update' => date('Y-m-d H:i:s'),
            'point_redeem_new_ip_update' => $_SERVER['REMOTE_ADDR']
        );

        if(!empty($_FILES['point_redeem_new_image'])) {
            if(move_uploaded_file($_FILES['point_redeem_new_image']['tmp_name'], 'local/storage/app/point_redeem/'.$_FILES['point_redeem_new_image']['name'])) {

                $data['point_redeem_new_image'] = 'local/storage/app/point_redeem/'.$_FILES['point_redeem_new_image']['name'];
            }
        }

        if($request->input('point_redeem_new_type') == 'Product') {
            $data['point_redeem_new_product_id'] = $request->input('point_redeem_new_product_id');
            
            $data['point_redeem_new_minimum_price'] = 0;
            $data['point_redeem_new_free_shipping'] = 'No';
            $data['point_redeem_new_discount'] = '0';
            $data['point_redeem_new_discount_type'] = '';
        } elseif($request->input('point_redeem_new_type') == 'Minimum Price') {
            $data['point_redeem_new_minimum_price'] = $request->input('point_redeem_new_minimum_price');
            
            $data['point_redeem_new_product_id'] = 0;
            //$data['point_redeem_new_minimum_price'] = 0;
            $data['point_redeem_new_free_shipping'] = 'No';
            $data['point_redeem_new_discount'] = '0';
            $data['point_redeem_new_discount_type'] = '';
        } elseif($request->input('point_redeem_new_type') == 'Free Shipping') {
            if(!empty($request->input('point_redeem_new_free_shipping')) and $request->input('point_redeem_new_free_shipping') == 'Yes') {

                $data['point_redeem_new_free_shipping'] = $request->input('point_redeem_new_free_shipping');
            } else {
                $data['point_redeem_new_free_shipping'] = 'No';
            }

            $data['point_redeem_new_product_id'] = 0;
            $data['point_redeem_new_minimum_price'] = 0;
            //$data['point_redeem_new_free_shipping'] = 'No';
            $data['point_redeem_new_discount'] = '0';
            $data['point_redeem_new_discount_type'] = '';
        } elseif($request->input('point_redeem_new_type') == 'Discount') {
            $data['point_redeem_new_discount'] = $request->input('point_redeem_new_discount');
            $data['point_redeem_new_discount_type'] = $request->input('point_redeem_new_discount_type');

            $data['point_redeem_new_product_id'] = 0;

            $data['point_redeem_new_product_id'] = 0;
            $data['point_redeem_new_minimum_price'] = 0;
            $data['point_redeem_new_free_shipping'] = 'No';
            //$data['point_redeem_new_discount'] = '0';
            //$data['point_redeem_new_discount_type'] = '';
        }

        if($request->input('point_redeem_new_id') != '') {
            // update
            DB::table('lv_point_redeem_new')
                ->where('point_redeem_new_id', '=', $request->input('point_redeem_new_id'))
                ->update($data);
        } else {
            // insert
            $data['point_redeem_new_datetime_create'] = date('Y-m-d H:i:s');
            $data['point_redeem_new_ip_create'] = $_SERVER['REMOTE_ADDR'];

            DB::table('lv_point_redeem_new')
                ->insert($data);
        }

        return redirect('backend/point_redeem');
    }

    public function point_redeem_delete($point_redeem_id) {
        DB::table('lv_point_redeem_new')
            ->where('point_redeem_new_id', '=', $point_redeem_id)
            ->delete();

        return redirect('backend/point_redeem');
    }
    // End Point Redeem
}