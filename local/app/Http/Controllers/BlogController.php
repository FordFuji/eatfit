<?php

namespace App\Http\Controllers;

use App\Blog;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Session;

class BlogController extends Controller
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

        $blog = Blog::orderBy('blog_id','DESC')->get();
        $data = array(
            'blog' => $blog,

        );
        return view('backend.blog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        //
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

        $blog = new Blog();
        $blog->blog_topic_th = $request->blog_topic_th;
        $blog->blog_topic_en = $request->blog_topic_en;
        $blog->blog_content_th = $request->blog_content_th;
        $blog->blog_content_en = $request->blog_content_en;
        $blog->blog_date = $request->blog_date;
        
        //ข้างหน้าชื่อของคอลัม
        //ข้างหลังชื่อของ name input ในฟอร์ม
       
        if ($request->hasFile('blog_banner_image')!=''){
            $filename = 'image_blog_'.Str::random(12).".". $request->file('blog_banner_image')->getClientOriginalExtension();
            $request->file('blog_banner_image')->move(public_path().'/image/blog/', $filename);
            
            $blog->blog_banner_image= 'image/blog/'.$filename;        
        }else{
            $blog->blog_banner_image = 'image/blog/no.png';
        }

        if ($request->hasFile('blog_cover_image')!=''){
            $filename = 'image_blog_'.Str::random(12).".". $request->file('blog_cover_image')->getClientOriginalExtension();
            $request->file('blog_cover_image')->move(public_path().'/image/blog/', $filename);
            
            $blog->blog_cover_image= 'image/blog/'.$filename;        
        }else{
            $blog->blog_cover_image = 'image/blog/no.png';
        }
        
        $blog->save();

       
        // Session::flash('status', 'บันทึกข้อมูลเรียบร้อย!');
        return redirect('backblog');
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

        $where = array('blog_id' => $id);
         $data = Blog::where($where)->first();
         // dd($datashow);
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

        $blog_info = Blog::where('blog_id' , $id)->first();

        $data = array(
            'blog_info' => $blog_info,
        );

        // $where = array('ourproject_id' => $id);
        // $data['ourproject_info'] = Ourproject::where($where)->first();
        return view('backend.blog.edit', $data);
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

        // dd($request);
        $blog_update = Blog::find($id);
        $blog_update->blog_topic_th = $request->blog_topic_th;
        $blog_update->blog_topic_en = $request->blog_topic_en;
        $blog_update->blog_content_th = $request->blog_content_th;
        $blog_update->blog_content_en = $request->blog_content_en;
        $blog_update->blog_date = $request->blog_date;

        if ($request->hasFile('blog_banner_image')!=''){
            if($blog_update->blog_banner_image != 'no.png'){
                $delete =  File::delete(public_path().'/'.$blog_update->blog_banner_image);
              }
         
              $filename = 'image_blog_'.Str::random(12).".". $request->file('blog_banner_image')->getClientOriginalExtension();
              $request->file('blog_banner_image')->move(public_path().'/image/blog/', $filename);
            //   $news->news_image= 'img/news/'.$filename;      
              $image = 'image/blog/'.$filename  ;  
            //  dd(public_path().'/image/blog/', $filename);
                $blog_update->blog_banner_image = $image;
            } 


            if ($request->hasFile('blog_cover_image')!=''){
                if($blog_update->blog_cover_image != 'no.png'){
                    $deleteCo =  File::delete(public_path().'/'.$blog_update->blog_cover_image);
                  }
             
                  $filenameCo = 'image_blog_'.Str::random(12).".". $request->file('blog_cover_image')->getClientOriginalExtension();
                  $request->file('blog_cover_image')->move(public_path().'/image/blog/', $filenameCo);
                //   $news->news_image= 'img/news/'.$filename;      
                  $imageCo = 'image/blog/'.$filenameCo  ;  
                 
                    $blog_update->blog_cover_image = $imageCo;
                } 
                // dd($blog_update->blog_cover_image,$blog_update->blog_banner_image);
        $blog_update->save();
        return redirect('backblog');
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
        
        $data = Blog::where('blog_id' , $id)->first();
            if($data->blog_cover_image != 'no.png'){//ลบรูปที่ไม่ใช่ no.png
                $delete =  File::delete(public_path().'/'.$data->blog_cover_image);
           }
           if($data->blog_banner_image != 'no.png'){
            $delete =  File::delete(public_path().'/'.$data->blog_banner_image);
          }
          Blog::destroy($id);
        //   Ourproimg::where('image_ourproject_ourpro',$id)->delete();
    
        //   $producttype = producttype::destroy($id);
        //   productbrand::where('brand_f',$id)->delete();
            return back();
    }
}
