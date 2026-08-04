<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class HomeController extends Controller
{

    public function __construct(Request $request) {
        if(session()->has("user")) {
            return redirect('backend/login');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        
        return view('home');
    }

    public function textHome() {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data['rows'] = DB::table('lv_text_home')
            ->orderBy('text_home_id', 'asc')
            ->get();

        return view('backend.text_home.list', $data);
    }

    public function FormTextHome(Request $request, $text_home_id = '') {
        $data['row'] = DB::table('lv_text_home')
            ->where('text_home_id', '=', $text_home_id)
            ->first();

        return view('backend.text_home.form', $data);
    }

    public function saveUpdateTextHome(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = array(
            'text_home_th' => $request->input('text_home_th'),
            'text_home_en' => $request->input('text_home_en'),
            'text_home_datetime_update' => date('Y-m-d H:i:s')
        );

        if(!empty($request->input('text_home_id'))) {
            // update
            DB::table('lv_text_home')
                ->where('text_home_id', '=', $request->input('text_home_id'))
                ->update($data);
        } else {
            // insert
            $data['text_home_datetime_create'] = date('Y-m-d H:i:s');

            DB::table('lv_text_home')
                ->insert($data);
        }

        return redirect('/backend/text_home');
    }

    public function deleteTextHome($text_home_id) {
        DB::table('lv_text_home')
            ->where('text_home_id', '=', $text_home_id)
            ->delete();

        return redirect('/backend/text_home');
    }

    public function VideoYoutube() {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data['row'] = DB::table('lv_video_youtube')
            ->where('video_youtube_id', '=', '1')
            ->first();

        return view('backend.video_youtube.form', $data);
    }

    public function saveUpdateVideoYoutube(Request $request) {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data = array(
            'video_youtube_embed' => $request->input('video_youtube_embed'),
            'video_youtube_topic_th' => $request->input('video_youtube_topic_th'),
            'video_youtube_topic_en' => $request->input('video_youtube_topic_en'),
            'video_youtube_topic2_th' => $request->input('video_youtube_topic2_th'),
            'video_youtube_topic2_en' => $request->input('video_youtube_topic2_en'),
            'video_youtube_detail_th' => $request->input('video_youtube_detail_th'),
            'video_youtube_detail_en' => $request->input('video_youtube_detail_en'),
            'video_youtube_datetime_create' => date('Y-m-d H:i:s'),
            'video_youtube_datetime_update' => date('Y-m-d H:i:s'),
        );

        DB::table('lv_video_youtube')
            ->where('video_youtube_id', '=', '1')
            ->update($data);

        return redirect('/backend/video_youtube');
    }
}
