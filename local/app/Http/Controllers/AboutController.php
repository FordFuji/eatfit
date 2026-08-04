<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Store;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class AboutController extends Controller
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

        $about_model = About::all();
        $aboutlist = About::where('about_id', '1')->first();;
        $data = array(
            'about' => $about_model,
            'aboutlist' => $aboutlist,
        );
        return view('backend.about.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $about = new About();
        // $about->about_profile_th = $request->about_profile_th;
        // $about->about_profile_en = $request->about_profile_en;
        // $about->about_content_th = $request->about_content_th;
        // $about->about_content_en = $request->about_content_en;
        // //ข้างหน้าชื่อของคอลัม
        // //ข้างหลังชื่อของ name input ในฟอร์ม
        // $about->save();

        // // Session::flash('status', 'บันทึกข้อมูลเรียบร้อย!');
        // return redirect('backabout');

        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('about_id' => $id);
        $data = About::where($where)->first();
        return $data ;

        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about_update =  About::find($id);
        
        // $about_update->about_profile_th = $request->about_profile_th;
        // $about_update->about_profile_en = $request->about_profile_en;
        // $about_update->about_content_th = $request->about_content_th;
        // $about_update->about_content_en = $request->about_content_en;
        $about_update->about_address_th = $request->about_address_th;
        $about_update->about_address_en = $request->about_address_en;

        $about_update->about_phone = $request->about_phone;
        $about_update->about_fax = $request->about_fax;
        $about_update->about_email = $request->about_email;
        $about_update->about_facebook = $request->about_facebook;
        $about_update->about_line = $request->about_line;
        $about_update->about_youtube = $request->about_youtube;
        $about_update->about_instagram = $request->about_instagram;

        $about_update->about_facebook_name = $request->about_facebook_name;
        $about_update->about_line_id = $request->about_line_id;
        $about_update->about_instagram_name = $request->about_instagram_name;
        $about_update->about_youtube_name = $request->about_youtube_name;
        // $category->reference_category_name = $request->reference_category_name;
    //    dd($id);
        $about_update->save();
        // dd($contact);
        // Session::flash('status', 'บันทึกข้อมูลเรียบร้อย!');
        // return redirect('reference');
        // return "ss" ;
        return redirect('backabout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
