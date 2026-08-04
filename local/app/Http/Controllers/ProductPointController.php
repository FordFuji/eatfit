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

class ProductPointController extends Controller {

    public function productPoint() {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $product_point = DB::table('lv_product_point')
            ->orderBy('product_point_id', 'asc')
            ->get();

        $data = array(
            'product_point' => $product_point
        );
        
        return view('backend.product_point.list', $data);
    }

    public function productPointForm(Request $request, $product_point_id = '') {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $productPoint = DB::table('lv_product_point')
            ->where('product_point_id', '=', $product_point_id)
            ->first();

        $products = DB::table('products')
            ->orderBy('name_products_thai', 'asc')
            ->get();

        $data = array(
            'row' => $row,
            'products' => $products
        );

        return view('backend.promocode.form', $data);
    }

    
    public function saveUpdateProductPoint(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }


    }

    public function promocode_delete(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        
    }
}
