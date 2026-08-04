<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class PromotionController extends Controller
{
    // Promotion Complete
    public function promotion_complete()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $row = DB::table('lv_promotion_complete')
            ->where('promotion_complete_id', '=', 1)
            ->first();


        $data = array(
            'row' => $row
        );

        return view('backend.promotion_complete.form', $data);
    }

    public function promotion_complete_save_update(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = array(
            'promotion_complete_from_price' => $request->input('promotion_complete_from_price'),
            'promotion_complete_discount' => $request->input('promotion_complete_discount'),
            'promotion_complete_begin_date' => $request->input('promotion_complete_begin_date'),
            'promotion_complete_end_date' => $request->input('promotion_complete_end_date'),
            'promotion_complete_datetime_update' => date('Y-m-d H:i:s'),
            'promotion_complete_ip_update' => $_SERVER['SERVER_NAME']
        );

        if($request->input('promotion_complete_free_shipping') == 'Yes') {
            $data['promotion_complete_free_shipping'] = 'Yes';
        } else {
            $data['promotion_complete_free_shipping'] = 'No';
        }

        DB::table('lv_promotion_complete')
            ->where('promotion_complete_id', '=', 1)
            ->update($data);

        return redirect('backend/promotion_complete');

    }
    // End Promotion Complete

    // Buy 1 Get 1 Free
    public function buy_1_get_1_free() {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $buy1Get1Free = DB::table('lv_buy_1_get_1_free')
            ->orderBy('lv_buy_1_get_1_free.buy_1_get_1_free_id', 'asc')
            ->join('products', 'lv_buy_1_get_1_free.product_id', '=', 'products.products_id')
            ->get();

        $data = array(
            'rows' => $buy1Get1Free
        );

        return view('backend.buy_1_get_1_free.list', $data);

    }

    public function buy_1_get_1_free_form(Request $request, $buy_1_get_1_free_id = '') {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $row = DB::table('lv_buy_1_get_1_free')
            ->where('buy_1_get_1_free_id', '=', $buy_1_get_1_free_id)
            ->first();

        $products = DB::table('products')
            ->orderBy('name_products_thai', 'asc')
            ->get();

        $data = array(
            'row' => $row,
            'products' => $products
        );

        return view('backend.buy_1_get_1_free.form', $data);

    }

    public function buy_1_get_1_free_save_update(Request $request) {
        if($request->input('buy_1_get_1_free_id') != '') {
            // update
            $data = array(
                'product_id' => $request->input('product_id'),
                'buy_1_get_1_free_datetime_create' => date('Y-m-d H:i:s'),
                'buy_1_get_1_free_ip_create' => $_SERVER['SERVER_NAME']
            );

            DB::table('lv_buy_1_get_1_free')
                ->where('buy_1_get_1_free_id', '=', $request->input('buy_1_get_1_free_id'))
                ->update($data);
        } else {
            // insert 
            $data = array(
                'product_id' => $request->input('product_id'),
                'buy_1_get_1_free_datetime_create' => date('Y-m-d H:i:s'),
                'buy_1_get_1_free_ip_create' => $_SERVER['SERVER_NAME']
            );

            DB::table('lv_buy_1_get_1_free')
                ->insert($data);
        }

        return redirect('backend/buy_1_get_1_free');

    }

    public function buy_1_get_1_free_delete(Request $request, $buy_1_get_1_free_id) {
        DB::table('lv_buy_1_get_1_free')
            ->where('buy_1_get_1_free_id', '=', $buy_1_get_1_free_id)
            ->delete();

        return redirect('backend/buy_1_get_1_free');
    }
    // End Point Redeem

    // Promotion Text
    public function promotion_text()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $row1 = DB::table('lv_promotion_text')
            ->where('promotion_text_id', '=', 1)
            ->first();


        $row2 = DB::table('lv_promotion_text')
            ->where('promotion_text_id', '=', 2)
            ->first();


        $data = array(
            'row1' => $row1,
            'row2' => $row2
        );

        return view('backend.promotion_text.form', $data);
    }

    public function promotion_text_save_update(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $promotion_text_th = $request->input('promotion_text_th');
        $promotion_text_en = $request->input('promotion_text_en');

        $i = 0;
        $j = 0;
        if(!empty($promotion_text_th)) {
            foreach($promotion_text_th as $input_text_th) {
                $i++;

                $data = array(
                    'promotion_text_th' => $promotion_text_th[$j],
                    'promotion_text_en' => $promotion_text_en[$j],
                    'promotion_text_datetime_update' => date('Y-m-d H:i:s'),
                    'promotion_text_ip_update' => $_SERVER['SERVER_NAME']
                );
                
                DB::table('lv_promotion_text')
                    ->where('promotion_text_id', '=', $i)
                    ->update($data);

                $j++;
            }
        }

        return redirect('backend/promotion_text');
    }
    // End Promotion Text

    // Promotion Day
    public function promotion_day()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $row = DB::table('lv_promotion_day')
            ->where('promotion_day_id', '=', 1)
            ->first();


        $data = array(
            'row' => $row
        );

        return view('backend.promotion_day.form', $data);
    }

    public function promotion_day_save_update(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = array(
            'promotion_day_begin' => $request->input('promotion_day_begin'),
            'promotion_day_end' => $request->input('promotion_day_end'),
            'promotion_day_day' => $request->input('promotion_day_day'),
            'promotion_day_percent' => $request->input('promotion_day_percent'),
            'promotion_day_baht' => $request->input('promotion_day_baht')
        );

        DB::table('lv_promotion_day')
            ->where('promotion_day_id', '=', 1)
            ->update($data);

        return redirect('backend/promotion_day');

    }
    // End Promotion Complete

    // Giftset
    public function giftset()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data['rows'] = DB::table('lv_giftset')
            ->get();

        return view('backend.giftset.list', $data);
    }

    public function giftsetform(Request $request, $giftset_id = '')
    {
        $data['row'] = DB::table('lv_giftset')->where('lv_giftset.giftset_id', '=', $giftset_id)->first();

        return view('backend.giftset.form', $data);
    }

    public function giftset_save_update(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        if(move_uploaded_file($_FILES['giftset_image']['tmp_name'], 'local/storage/app/giftset/'.$_FILES['giftset_image']['name'])) {
            $giftset_image = 'local/storage/app/giftset/'.$_FILES['giftset_image']['name'];
        }

        $data = array(
            'giftset_name' => $request->input('giftset_name'),
            'giftset_datetime_update' => date('Y-m-d H:i:s')
        );

        if(!empty($giftset_image)) {
            $data['giftset_image'] = $giftset_image;
        }

        if($request->input('giftset_id') != '') {
            // update
            $where = array('giftset_id' => $request->input('giftset_id'));

            DB::table('lv_giftset')->update($data, $where);
        } else {
            // insert
            $data['giftset_datetime_create'] = date('Y-m-d H:i:s');

            DB::table('lv_giftset')->insert($data);
        }

        return redirect('backend/giftset');

    }

    public function giftset_delete($giftset_id = '') {
        DB::table('lv_giftset')
            ->where('giftset_id', '=', $giftset_id)
            ->delete();

        return redirect('backend/giftset');
    }
    // End Giftset

    // buy_products_in_this_set
    public function promotion_by_product()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $row = DB::table('lv_promotion_by_product')
            ->where('promotion_by_product_id', '=', 1)
            ->first();

        $data = array(
            'row' => $row
        );

        $data['result'] = DB::table('products')
            ->orderBy('name_products_thai', 'asc')
            ->get();

        return view('backend.promotion_by_product.form', $data);
    }

    public function promotion_by_product_save_update(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = array(
            'promotion_by_product_text_th' => $request->input('promotion_by_product_text_th'),
            'promotion_by_product_text_en' => $request->input('promotion_by_product_text_en'),
            'promotion_by_product_amount' => $request->input('promotion_by_product_amount'),
            'promotion_by_product_percent' => $request->input('promotion_by_product_percent'),
            'promotion_by_product_datetime_create' => date('Y-m-d H:i:s'),
            'promotion_by_product_datetime_update' => date('Y-m-d H:i:s')
        );

        if($request->input('products_package_3') == 'Yes') {
            $data['products_package_3'] = $request->input('products_package_3');
        } else {
            $data['products_package_3'] = 'No';
        }

        if($request->input('products_package_5') == 'Yes') {
            $data['products_package_5'] = $request->input('products_package_5');
        } else {
            $data['products_package_5'] = 'No';
        }

        if($request->input('products_package_7') == 'Yes') {
            $data['products_package_7'] = $request->input('products_package_7');
        } else {
            $data['products_package_7'] = 'No';
        }

        if(!empty($request->input('promotion_by_product_free_shipping'))) {
            $data['promotion_by_product_free_shipping'] = 'Yes';
        } else {
            $data['promotion_by_product_free_shipping'] = 'No';
        }

        $products_id = $request->input('products_id');

        $products_id_ = '';
        if(!empty($products_id)) {
            foreach($products_id as $r) {
                $products_id_ .= $r.', ';
            }
        }

        $data['products_id'] = $products_id_;

        DB::table('lv_promotion_by_product')
            ->where('promotion_by_product_id', '=', 1)
            ->update($data);
        
        return redirect('backend/promotion_by_product');
    }
    // End buy_products_in_this_set
}