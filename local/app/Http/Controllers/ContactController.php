<?php

namespace App\Http\Controllers;

use DB;
use App\Contact;
use App\TypeQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class ContactController extends Controller
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

        $contact = Contact::orderBy('contact_form_id','DESC')->get();
        $data = array(
            'contact' => $contact,

        );
        return view('backend.contact.index',$data);
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

        $where = array('contact_form_id' => $id);
         $data = Contact::where($where)->first();
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
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

         // dd($request);
         $typeqaupdate =  TypeQuestion::find($id);
         $typeqaupdate->type_question_name_th = $request->type_question_name_th;
         $typeqaupdate->type_question_name_en = $request->type_question_name_en;
         // $category->reference_category_name = $request->reference_category_name;
         // dd($request, $id);
         $typeqaupdate->save();
         // dd($contact);
         // Session::flash('status', 'บันทึกข้อมูลเรียบร้อย!');
         // return redirect('reference');
         // return "ss" ;
         return redirect('backquestionHelp');
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
        
        Contact::where('contact_form_id',$id)->delete();
        return back();
    }
}
