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

class InstagramController extends Controller {

    public function instagram() {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $instagram = DB::table('lv_instagram')
            ->orderBy('instagram_id', 'asc')
            ->get();

        $data = array(
            'instagram' => $instagram
        );
        
        return view('backend.instagram.list', $data);
    }

    public function instagram_form(Request $request, $instagram_id = '') {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $row = DB::table('lv_instagram')
            ->where('instagram_id', '=', $instagram_id)
            ->first();

        $data = array(
            'row' => $row
        );

        return view('backend.instagram.form', $data);
    }

    
    public function saveUpdateInstagram(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = array(
            'instagram_alt' => $request->input('instagram_alt'),
            'instagram_datetime_update' => date('Y-m-d H:i:s'),
            'instagram_ip_update' => $_SERVER['REMOTE_ADDR'],
        );

        if(move_uploaded_file($_FILES['instagram_image']['tmp_name'], 'local/public/image/instagram/'.$_FILES['instagram_image']['name'])) {
            $data['instagram_image'] = 'local/public/image/instagram/'.$_FILES['instagram_image']['name'];
        }

        if($request->input('instagram_id') != '') {
            // update
            DB::table('lv_instagram')
                ->where('instagram_id', '=', $request->input('instagram_id'))
                ->update($data);
        } else {
            // insert
            $data['instagram_datetime_create'] = date('Y-m-d H:i:s');
            $data['instagram_ip_create'] = $_SERVER['REMOTE_ADDR'];

            DB::table('lv_instagram')
                ->insert($data);
        }

        return redirect('backend/instagram');

    }

    public function instagram_delete(Request $request, $instagram_id) {
        DB::table('lv_instagram')
            ->where('instagram_id', '=', $instagram_id)
            ->delete();

        return redirect('backend/instagram');
    }
}
