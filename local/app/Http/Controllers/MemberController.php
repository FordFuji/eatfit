<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class MemberController extends Controller
{
    public function member()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $member = DB::table('lv_member')
            ->orderBy('member_id', 'desc')
            ->get();

        $data = array(
            'member' => $member
        );

        return view('backend.member.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($member_id)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $member = DB::table('lv_member')
            ->where('member_id', '=', $member_id)
            ->first();

        $address = DB::table('tb_address')
            ->where('address_regis', '=', $member_id)
            ->get();

        $data = array(
            'member' => $member,
            'address' => $address
        );

        return view('backend.member.form', $data);
    }
}