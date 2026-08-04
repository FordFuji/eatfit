<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class BankController extends Controller
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

        $bank = Bank::orderBy('bank_show','DESC')->orderBy('updated_at','DESC')->get();
        $data = array(
            'bank' => $bank,

        );
        return view('backend.bank.index',$data);
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

        $bank = new Bank();
        $bank->bank_show = $request->bank_show;
        $bank->bank_namelogo_th = $request->bank_namelogo_th;
        $bank->bank_namelogo_en = $request->bank_namelogo_en;
        $bank->bank_accountnumber = $request->bank_accountnumber;
        $bank->bank_accountname_th = $request->bank_accountname_th;
        $bank->bank_accountname_en = $request->bank_accountname_en;
        //ข้างหน้าชื่อของคอลัม
        //ข้างหลังชื่อของ name input ในฟอร์ม
        if ($request->hasFile('bank_logo')!=''){
            $filename = 'image_file_'.Str::random(12).".". $request->file('bank_logo')->getClientOriginalExtension();
            $request->file('bank_logo')->move(public_path().'/image/file/', $filename);
            $bank->bank_logo= 'image/file/'.$filename;   
        }else{
            $bank->bank_logo = 'image/file/no.png';
        }
        $bank->save();
        // Session::flash('status', 'บันทึกข้อมูลเรียบร้อย!');
        return redirect('backbank');
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
        
        $where = array('bank_id' => $id);
         $data = Bank::where($where)->first();
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
        $data = Bank::where('bank_id' , $id)->first();
        if($data->bank_logo != 'no.png'){//ลบรูปที่ไม่ใช่ no.png
            $delete =  File::delete(public_path() . '/' . $data->bank_logo);
        }
        DB::table('tb_bank')->where('bank_id',$id)->delete();
        return back();
    }
    public function showBank(Request $request)
    {
        // dd($request);
        DB::table('tb_bank')
        ->where('bank_id', $request->id)
        ->update([
            'bank_show' => $request->one
        ]);
    }
}
