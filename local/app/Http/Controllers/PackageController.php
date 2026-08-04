<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class PackageController extends Controller
{
    
    public function index()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $package = DB::table('lv_package')
            ->orderBy('package_id', 'asc')
            ->get();

        $product = DB::table('products')
            ->orderBy('products_id', 'asc')
            ->get();

        $package_price = DB::table('lv_package_price')
            ->where('package_price_id', '=', 1)
            ->first();

        $data = array(
            'package' => $package,
            'product' => $product,
            'package_price' => $package_price
        );

        return view('backend.package.index',$data);
    }

    public function saveUpdate(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        
        if($request->input('submit') != '') {
            $data_price = array(
                'package_price_3_day' => $request->input('package_price_3_day'),
                'package_price_5_day' => $request->input('package_price_5_day'),
                'package_price_7_day' => $request->input('package_price_7_day'),

                'package_price3_name_th' => $request->input('package_price3_name_th'),
                'package_price5_name_th' => $request->input('package_price5_name_th'),
                'package_price7_name_th' => $request->input('package_price7_name_th'),

                'package_price3_name_en' => $request->input('package_price3_name_en'),
                'package_price5_name_en' => $request->input('package_price5_name_en'),
                'package_price7_name_en' => $request->input('package_price7_name_en'),

                'package_price3_description_th' => $request->input('package_price3_description_th'),
                'package_price5_description_th' => $request->input('package_price5_description_th'),
                'package_price7_description_th' => $request->input('package_price7_description_th'),

                'package_price3_description_en' => $request->input('package_price3_description_en'),
                'package_price5_description_en' => $request->input('package_price5_description_en'),
                'package_price7_description_en' => $request->input('package_price7_description_en'),

                'package_price3_detail_th' => $request->input('package_price3_detail_th'),
                'package_price5_detail_th' => $request->input('package_price5_detail_th'),
                'package_price7_detail_th' => $request->input('package_price7_detail_th'),

                'package_price3_detail_en' => $request->input('package_price3_detail_en'),
                'package_price5_detail_en' => $request->input('package_price5_detail_en'),
                'package_price7_detail_en' => $request->input('package_price7_detail_en'),

                'package_price3_detail2_th' => $request->input('package_price3_detail2_th'),
                'package_price5_detail2_th' => $request->input('package_price5_detail2_th'),
                'package_price7_detail2_th' => $request->input('package_price7_detail2_th'),

                'package_price3_detail2_en' => $request->input('package_price3_detail2_en'),
                'package_price5_detail2_en' => $request->input('package_price5_detail2_en'),
                'package_price7_detail2_en' => $request->input('package_price7_detail2_en'),
                
            );

            if(!empty($_FILES['package_price3_image']['tmp_name'])) {
                if(move_uploaded_file($_FILES['package_price3_image']['tmp_name'], 'local/storage/app/pick_your_plan/'.$_FILES['package_price3_image']['name'])) {
                    $data_price['package_price3_image'] = 'local/storage/app/pick_your_plan/'.$_FILES['package_price3_image']['name'];
                }
            }

            if(!empty($_FILES['package_price5_image']['tmp_name'])) {
                if(move_uploaded_file($_FILES['package_price5_image']['tmp_name'], 'local/storage/app/pick_your_plan/'.$_FILES['package_price5_image']['name'])) {
                    $data_price['package_price5_image'] = 'local/storage/app/pick_your_plan/'.$_FILES['package_price5_image']['name'];
                }
            }

            if(!empty($_FILES['package_price7_image']['tmp_name'])) {
                if(move_uploaded_file($_FILES['package_price7_image']['tmp_name'], 'local/storage/app/pick_your_plan/'.$_FILES['package_price7_image']['name'])) {
                    $data_price['package_price7_image'] = 'local/storage/app/pick_your_plan/'.$_FILES['package_price7_image']['name'];
                }
            }

            DB::table('lv_package_price')
                ->where('package_price_id', '=', 1)
                ->update($data_price);

            $product_id1 = $request->input('product_id1');
            $product_id2 = $request->input('product_id2');
            $product_id3 = $request->input('product_id3');

            $i = 0;
            $j = 1;
            if(!empty($product_id1)) {
                DB::table('lv_package')
                    ->truncate();

                foreach($product_id1 as $product_id1_data) {
                    $calories = 0;

                    $calories1 = DB::table('products')
                        ->where('products_id', '=', $product_id1_data)
                        ->first();

                    if(!empty($calories1)) {
                        $calories += $calories1->calories_products;
                    }

                    $calories2 = DB::table('products')
                        ->where('products_id', '=', $product_id2[$i])
                        ->first();

                    if(!empty($calories2)) {
                        $calories += $calories2->calories_products;
                    }

                    $calories3 = DB::table('products')
                        ->where('products_id', '=', $product_id3[$i])
                        ->first();

                    if(!empty($calories3)) {
                        $calories += $calories3->calories_products;
                    }

                    $data = array(
                        'product_id1' => $product_id1_data,
                        'product_id2' => $product_id2[$i],
                        'product_id3' => $product_id3[$i],
                        'package_calories' => $calories
                    );

                    DB::table('lv_package')
                        ->insert($data);

                    $i++;
                    $j++;
                }

                //dd($data);
            }

            return redirect('backend/package');
        }
    }
}
