<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class BannerController extends Controller
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

        $banner = Banner::orderBy('banner_show','DESC')->get();
        $data = array(
            'banner' => $banner,

        );
        return view('backend.banner.index',$data);
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
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $banner = new Banner();
        $banner->banner_link = $request->banner_link;
        /* ออม บอกให้ซ่อนไว้ก่อน $banner->banner_topic_th = $request->banner_topic_th;
        $banner->banner_topic_en = $request->banner_topic_en;
        $banner->banner_title_th = $request->banner_title_th;
        $banner->banner_title_en = $request->banner_title_en;
        $banner->banner_content_th = $request->banner_content_th;
        $banner->banner_content_en = $request->banner_content_en;*/
        $banner->banner_show = $request->banner_show;
        
        //ข้างหน้าชื่อของคอลัม
        //ข้างหลังชื่อของ name input ในฟอร์ม
       
        if ($request->hasFile('banner_image')!=''){
            $filename = 'image_banner_'.Str::random(12).".". $request->file('banner_image')->getClientOriginalExtension();
            $request->file('banner_image')->move(public_path().'/image/banner/', $filename);
            $banner->banner_image= 'image/banner/'.$filename;        
        }else{
            $banner->banner_image = 'image/banner/no.png';
        }

        if ($request->hasFile('banner_image_en')!=''){
            $filename = 'image_banner_'.Str::random(12).".". $request->file('banner_image_en')->getClientOriginalExtension();
            $request->file('banner_image_en')->move(public_path().'/image/banner/', $filename);
            $banner->banner_image_en= 'image/banner/'.$filename;        
        }else{
            $banner->banner_image_en = 'image/banner/no.png';
        }
        
        //$banner->save();

        if ($request->hasFile('banner_image_mobile')!=''){
            $filename = 'image_banner_'.Str::random(12).".". $request->file('banner_image_mobile')->getClientOriginalExtension();
            $request->file('banner_image_mobile')->move(public_path().'/image/banner/', $filename);
            $banner->banner_image_mobile = 'image/banner/'.$filename;        
        }else{
            $banner->banner_image_mobile = 'image/banner/no.png';
        }

        if ($request->hasFile('banner_image_mobile_en')!=''){
            $filename = 'image_banner_'.Str::random(12).".". $request->file('banner_image_mobile_en')->getClientOriginalExtension();
            $request->file('banner_image_mobile_en')->move(public_path().'/image/banner/', $filename);
            $banner->banner_image_mobile_en = 'image/banner/'.$filename;        
        }else{
            $banner->banner_image_mobile_en = 'image/banner/no.png';
        }
        
        $banner->save();

        // Session::flash('status', 'บันทึกข้อมูลเรียบร้อย!');
        return redirect('backbanner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $where = array('banner_id' => $id);
         $data = Banner::where($where)->first();
         return $data ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $where = array('banner_id' => $id);
        $data['banner_info'] = Banner::where($where)->first();
        return view('backend.banner.edit', $data);
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
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $ban =  Banner::find($id);
        $ban->banner_link = $request->banner_link;
        /* ออม บอกให้ซ่อนไว้ก่อน $ban->banner_topic_th = $request->banner_topic_th;
        $ban->banner_topic_en = $request->banner_topic_en;
        $ban->banner_title_th = $request->banner_title_th;
        $ban->banner_title_en = $request->banner_title_en;
        $ban->banner_content_th = $request->banner_content_th;
        $ban->banner_content_en = $request->banner_content_en;*/
        if ($request->hasFile('banner_image')!=''){
            if($ban->banner_image != 'no.png'){
                $delete =  File::delete(public_path().'/'.$ban->banner_image);
            }
            $filename = 'image_banner_'.Str::random(12).".". $request->file('banner_image')->getClientOriginalExtension();
            $request->file('banner_image')->move(public_path().'/image/banner/', $filename);
            $ban->banner_image= 'image/banner/'.$filename;     
        }

        if ($request->hasFile('banner_image_en')!=''){
            if($ban->banner_image_en != 'no.png'){
                $delete =  File::delete(public_path().'/'.$ban->banner_image_en);
            }
            $filename = 'image_banner_'.Str::random(12).".". $request->file('banner_image_en')->getClientOriginalExtension();
            $request->file('banner_image_en')->move(public_path().'/image/banner/', $filename);
            $ban->banner_image_en = 'image/banner/'.$filename;     
        }

        if ($request->hasFile('banner_image_mobile')!=''){
            if($ban->banner_image_mobile != 'no.png'){
                $delete =  File::delete(public_path().'/'.$ban->banner_image_mobile);
            }
            $filename = 'image_banner_'.Str::random(12).".". $request->file('banner_image_mobile')->getClientOriginalExtension();
            $request->file('banner_image_mobile')->move(public_path().'/image/banner/', $filename);
            $ban->banner_image_mobile= 'image/banner/'.$filename;     
        }

        if ($request->hasFile('banner_image_mobile_en')!=''){
            if($ban->banner_image_mobile_en != 'no.png'){
                $delete =  File::delete(public_path().'/'.$ban->banner_image_mobile_en);
            }
            $filename = 'image_banner_'.Str::random(12).".". $request->file('banner_image_mobile_en')->getClientOriginalExtension();
            $request->file('banner_image_mobile_en')->move(public_path().'/image/banner/', $filename);
            $ban->banner_image_mobile_en = 'image/banner/'.$filename;     
        }

        $ban->save();

        // return "ss" ;
        return redirect('backbanner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = Banner::where('banner_id' , $id)->first();
    //     if($data->home_image != 'no.png'){//ลบรูปที่ไม่ใช่ no.png
    //         $delete =  File::delete(public_path() . '/img/home/' . $data->home_image);
    //    }
       if($data->banner_image != 'no.png'){
        $delete =  File::delete(public_path().'/'.$data->banner_image);
      }
     
      Banner::where('banner_id',$id)->delete();
        return back();
    }
    public function showdata(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        
        // dd($request);
        DB::table('tb_banner')
        ->where('banner_id', $request->id)
        ->update([
            'banner_show' => $request->one
        ]);
    }
}
