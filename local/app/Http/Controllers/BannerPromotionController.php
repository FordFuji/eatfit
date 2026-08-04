<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Store;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class BannerPromotionController extends Controller
{
    
    public function banner_promotion()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $banner_promotion = DB::table('lv_banner_promotion')
            ->where('banner_promotion_id', '=', '1')
            ->first();
            
        $data = array(
            'banner_promotion' => $banner_promotion
        );

        return view('backend.banner_promotion.index', $data);
    }

    
    public function banner_promotion_save_update(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = array();

        $data['banner_promotion_enable'] = $request->input('banner_promotion_enable');

        if(move_uploaded_file($_FILES['banner_promotion_image_pc']['tmp_name'], 'local/storage/app/pick_your_plan/'.$_FILES['banner_promotion_image_pc']['name'])) {
            $data['banner_promotion_image_pc'] = 'local/storage/app/pick_your_plan/'.$_FILES['banner_promotion_image_pc']['name'];
        }

        if(move_uploaded_file($_FILES['banner_promotion_image_mobile']['tmp_name'], 'local/storage/app/pick_your_plan/'.$_FILES['banner_promotion_image_mobile']['name'])) {
            $data['banner_promotion_image_mobile'] = 'local/storage/app/pick_your_plan/'.$_FILES['banner_promotion_image_mobile']['name'];
        }

        DB::table('lv_banner_promotion')
            ->where('banner_promotion_id', '=', '1')
            ->update($data);

        return redirect('backend/banner_promotion');
    }
}
