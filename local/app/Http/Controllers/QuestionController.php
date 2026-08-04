<?php

namespace App\Http\Controllers;

use DB;
use App\Question;
use App\TypeQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class QuestionController extends Controller
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

        $typequestion = TypeQuestion::orderBy('updated_at','DESC')->get();
        $question = Question::orderBy('updated_at','DESC')->get();
        $data = array(
            'question' => $question,
            'typequestion' => $typequestion,

        );
        return view('backend.question.index',$data);
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
        // dd($request);
        if($request->question_type == '')
        {
            $typequestion = new TypeQuestion();
            $typequestion->type_question_name_th = $request->type_question_name_th;
            $typequestion->type_question_name_en = $request->type_question_name_en;
            $typequestion->save();
        }

        $question = new Question();
        $question->question_show = $request->question_show;
        $question->question_q_th = $request->question_q_th;
        $question->question_q_en = $request->question_q_en;
        $question->question_answer_th = $request->question_answer_th;
        $question->question_answer_en = $request->question_answer_en;

        if($request->question_type == ''){
            $IDtype = TypeQuestion::where('type_question_name_en', $request->type_question_name_en)
                                        ->where('type_question_name_th', $request->type_question_name_th)
                                        ->first();;
            $question->question_type = $IDtype->type_question_id; 
        }else{
            $question->question_type = $request->question_type; 
        }
        
        // dd($question);
        $question->save();
        return redirect('backquestionHelp');
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

        $where = array('question_id' => $id);
         $data = Question::where($where)->first();
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

        $where = array('question_id' => $id);
        $data = Question::where($where)->first();
        //Userst ชื่อ model
        //['news_info']ค่าที่จะส่งไปแสดงในข้อมูลเดิม
        // dd($data);
        // return view('backoffice.reference.index',$data);
        return $data ;
    
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
        $qaupdate =  Question::find($id);
        $qaupdate->question_q_th = $request->questionq_th;
        $qaupdate->question_q_en = $request->questionq_en;
        $qaupdate->question_answer_th = $request->questionanswer_th;
        $qaupdate->question_answer_en = $request->questionanswer_en;
        // $category->reference_category_name = $request->reference_category_name;
        // dd($request, $id);
        $qaupdate->save();
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

        Question::where('question_id',$id)->delete();
        return back();
    }
    public function delType($id)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        // dd($id);
        Question::where('question_type',$id)->delete();
        TypeQuestion::where('type_question_id',$id)->delete();
        return back();
    }
    public function showQA(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        // dd($request);
        DB::table('tb_question')
        ->where('question_id', $request->id)
        ->update([
            'question_show' => $request->one
        ]);
    }
    public function filterIntType(Request $request) 
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $intypId = $request->intyp;
        if ($intypId == '') {
            $th_add = '
                            <div class="form-group">
                                <strong>Add Type (TH)</strong>
                                <input type="text" name="type_question_name_th" class="form-control" id="Addtypeth"
                                    placeholder="Enter Type (TH)" >
                            </div>
                        ';
            $en_add = '
                            <div class="form-group">
                                <strong>Add Type (EN)</strong>
                                <input type="text" name="type_question_name_en" class="form-control" id="Addtypeen"
                                    placeholder="Enter Type (EN)" >
                            </div>
                        ';
        }
        else{
            $th_add = '
                           
                        ';
            $en_add = '
                            
                        ';
        }
        
        $data = array(
            'th_add' => $th_add, 
            'en_add' => $en_add, 
        );
        // dd($data);
        return $data;
    }
    public function backquestionTYPEedit($id)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        
        $where = array('type_question_id' => $id);
        $data = TypeQuestion::where($where)->first();
        //Userst ชื่อ model
        //['news_info']ค่าที่จะส่งไปแสดงในข้อมูลเดิม
        // dd($data);
        // return view('backoffice.reference.index',$data);
        return $data ;
    
    }
}
