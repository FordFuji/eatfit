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

class ReviewAdminController extends Controller {

    public function review_admin() {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $review_admin = DB::table('lv_review_admin')
            ->orderBy('review_admin_id', 'asc')
            ->get();

        $data = array(
            'review_admin' => $review_admin
        );
        
        return view('backend.review_admin.list', $data);
    }

    public function review_admin_form(Request $request, $review_admin_id = '') {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $row = DB::table('lv_review_admin')
            ->where('review_admin_id', '=', $review_admin_id)
            ->first();

        $data = array(
            'row' => $row
        );

        $data['products'] = DB::table('products')
            ->orderBy('name_products_thai', 'asc')
            ->get();

        $data['image'] = DB::table('lv_review_admin_image')
            ->where('review_admin_id', '=', $review_admin_id)
            ->where('image_or_video', '=', 'Image')
            ->get();

        $data['vdo'] = DB::table('lv_review_admin_image')
            ->where('review_admin_id', '=', $review_admin_id)
            ->where('image_or_video', '=', 'VDO')
            ->get();

        return view('backend.review_admin.form', $data);
    }

    
    public function saveUpdateReviewAdmin(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = array(
            'review_admin_name_th' => $request->input('review_admin_name_th'),
            'review_admin_name_en' => $request->input('review_admin_name_en'),
            'products_id' => $request->input('products_id'),
            'review_admin_title_th' => $request->input('review_admin_title_th'),
            'review_admin_title_en' => $request->input('review_admin_title_en'),
            'review_admin_review_th' => $request->input('review_admin_review_th'),
            'review_admin_review_en' => $request->input('review_admin_review_en'),
            'review_admin_rating' => $request->input('review_admin_rating'),
            'review_admin_datetime_update' => date('Y-m-d H:i:s'),
            'review_admin_ip_update' => $_SERVER['REMOTE_ADDR'],
        );

        if($request->input('review_admin_id') != '') {
            // update
            DB::table('lv_review_admin')
                ->where('review_admin_id', '=', $request->input('review_admin_id'))
                ->update($data);

            $review_admin_id = $request->input('review_admin_id');
        } else {
            // insert
            $data['review_admin_datetime_create'] = date('Y-m-d H:i:s');
            $data['review_admin_ip_create'] = $_SERVER['REMOTE_ADDR'];

            DB::table('lv_review_admin')
                ->insert($data);

            $row = DB::table('lv_review_admin')
                ->orderBy('review_admin_id', 'desc')
                ->limit(1)
                ->first();

            if(!empty($row)) {
                $review_admin_id = $row->review_admin_id;
            }
        }

        $data_image = array('review_admin_id' => $review_admin_id);

        if(!empty($_FILES['image'])) {
            $i = 0;
            foreach($_FILES['image']['tmp_name'] as $file_tmp_name) {
                if(move_uploaded_file($file_tmp_name, 'local/public/image/review_admin/'.$_FILES['image']['name'][$i])) {
                    $data_image['image_or_video'] = 'Image';
                    $data_image['review_admin_image_image'] = 'local/public/image/review_admin/'.$_FILES['image']['name'][$i];

                    DB::table('lv_review_admin_image')
                        ->insert($data_image);
                }

                $i++;
            }
        }

        if(!empty($_FILES['vdo'])) {
            $i = 0;
            foreach($_FILES['vdo']['tmp_name'] as $file_tmp_name) {
                if(move_uploaded_file($file_tmp_name, 'local/public/image/review_admin/'.$_FILES['vdo']['name'][$i])) {
                    $data_image['image_or_video'] = 'VDO';
                    $data_image['review_admin_image_image'] = 'local/public/image/review_admin/'.$_FILES['vdo']['name'][$i];

                    DB::table('lv_review_admin_image')
                        ->insert($data_image);
                }

                $i++;
            }
        }

        return redirect('backend/review_admin');
    }

    public function review_admin_delete(Request $request, $review_admin_id) {
        DB::table('lv_review_admin')
            ->where('review_admin_id', '=', $review_admin_id)
            ->delete();

        return redirect('backend/review_admin');
    }

    public function review_admin_delete_gallery($review_admin_image_id, $review_admin_id) {
        DB::table('lv_review_admin_image')
            ->where('review_admin_image_id', '=', $review_admin_image_id)
            ->delete();

        return redirect('backend/review_admin/form/'.$review_admin_id);
    }
}
