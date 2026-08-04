<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class PickYourPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $planYourPlan = DB::table('lv_plan')
            ->orderBy('plan_id', 'asc')
            ->get();
        
        $data = array(
            'planYourPlan' => $planYourPlan
        );
        return view('backend.pick_your_plan.list', $data);
    }

    public function form($plan_id = '')
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $planYourPlan = DB::table('lv_plan')
            ->where('plan_id', '=', $plan_id)
            ->first();
        
        $data = array(
            'planYourPlan' => $planYourPlan
        );

        return view('backend.pick_your_plan.form', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pick_your_plan_save_update(Request $request)
    {
        //
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        if($request->input('plan_id') != '') {
            $data = array(
                'plan_name_th' => $request->input('plan_name_th'),
                'plan_name_en' => $request->input('plan_name_en'),
                'plan_description_th' => $request->input('plan_description_th'),
                'plan_description_en' => $request->input('plan_description_en'),
                'plan_datetime_update' => date('Y-m-d H:i:s'),
                'plan_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            if(!empty($_FILES['plan_image'])) {
                if(move_uploaded_file($_FILES['plan_image']['tmp_name'], 'local/storage/app/pick_your_plan/'.$_FILES['plan_image']['name'])) {
                    $data['plan_image'] = '/local/storage/app/pick_your_plan/'.$_FILES['plan_image']['name'];
                }
            }

            DB::table('lv_plan')
                ->where('plan_id', '=', $request->input('plan_id'))
                ->update($data);

            return redirect('backend/pick_your_plan');
        } else {
            $data = array(
                'plan_name_th' => $request->input('plan_name_th'),
                'plan_name_en' => $request->input('plan_name_en'),
                'plan_description_th' => $request->input('plan_description_th'),
                'plan_description_en' => $request->input('plan_description_en'),
                'plan_datetime_create' => date('Y-m-d H:i:s'),
                'plan_ip_create' => $_SERVER['REMOTE_ADDR'],
                'plan_datetime_update' => date('Y-m-d H:i:s'),
                'plan_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            if(!empty($_FILES['plan_image'])) {
                if(move_uploaded_file($_FILES['plan_image']['tmp_name'], 'local/storage/app/pick_your_plan/'.$_FILES['plan_image']['name'])) {
                    $data['plan_image'] = '/local/storage/app/pick_your_plan/'.$_FILES['plan_image']['name'];
                }
            }

            DB::table('lv_plan')
                ->insert($data);

            return redirect('backend/pick_your_plan');
        }
    }
}
