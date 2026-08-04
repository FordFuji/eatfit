<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Review;
use App\ReviewFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
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
        $wishcount = DB::table('lv_member')
        // ->where('member_id', '=', $request->session()->get('member_id'))
        ->leftJoin('tb_wish', 'lv_member.member_id', '=', 'tb_wish.wish_member')
        ->leftJoin('products', 'tb_wish.wish_menu', '=', 'products.products_id')
        // ->where('wish_member', '=', $request->session()->get('member_id'))
        ->count();
            $order_detail = DB::table('lv_order_detail')
            // ->where('member_id', '=', $request->session()->get('member_id'))
            ->orderBy('order_detail_id', 'desc')
            ->get();
            $review = Review::
                    // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                    leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                    ->leftJoin('products', 'tb_review.review_menu', '=', 'products.products_id')
                    ->orderBy('review_id','DESC')
                    ->get();
            // dd($id);
        $data = array(
            'wishcount' => $wishcount,
            'order_detail' => $order_detail,
            'review' => $review,
        );
        return view('backend.review.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
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
        $where = array('review_id' => $id);
        $reviewAT = Review::
        // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
        leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
        ->leftJoin('products', 'tb_review.review_menu', '=', 'products.products_id')
        ->where($where)->first();

        return view('backend.review.view_file', compact('reviewAT'));
        //  $data = Review::where($where)->first();
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
        //
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
        //
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
        
        // dd($id);
        Review::where('review_id',$id)->delete();
        ReviewFile::where('review_file_main',$id)->delete();
        return back();
    }
    public function showReview(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        // dd($request);
        DB::table('tb_review')
        ->where('review_id', $request->id)
        ->update([
            'review_show' => $request->one
        ]);
    }

    // review admin
    public function reviewAdmin() {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data['review'] = DB::table('tb_review')
            ->where('review_member', '=', 0)
            ->get();

        $data['product'] = DB::table('products')
            ->orderBy('products_id', 'asc')
            ->get();

        return view('backend.review.index',$data);
    }

    public function reviewAdminAddEdit() {

    }

    public function reviewAdminInsertUpdate(Request $request) {

    }

    public function reviewAdminDelete() {

    }
}
