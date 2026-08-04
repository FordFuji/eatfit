<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderdetail;
use App\Payment;
use DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Session;

class OrderController extends Controller
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

        $order = Order::where('order_satatus', 'Ord')->orderBy('order_id','DESC')->get();
        // $count = Order::where('order_satatus', 'Pay')->count();
        // dd($count);
        $data = array(
            'order' => $order,

        );
        return view('backend.order.index',$data);
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
        //  $data = DB::table('tb_order')
        //  ->where('order_id' , $id)
        //  ->leftJoin('tb_order_detail', 'tb_order.order_number', '=', 'tb_order_detail.order_detail_ordernumber')
        //  ->leftJoin('products', 'tb_order_detail.order_detail_product', '=', 'products.id')
        //  ->first();
        //  dd($data);
        // $where = array('order_id' => $id);
        // $data = Order::where($where)->first();
        //  return $data ;

        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $detail = Order::where('order_id', $id)->first();
        $myorder = DB::table('tb_order')
        ->where('order_id', $id)
        ->leftJoin('tb_order_detail', 'tb_order.order_number', '=', 'tb_order_detail.order_detail_ordernumber')
        ->leftJoin('products', 'tb_order_detail.order_detail_product', '=', 'products.id')
        ->get();
        
        $data = array(
            'detail' => $detail,
            'myorder' => $myorder,
        );
        return view('backend.order.details', $data);
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

        $detail = Order::where('order_id', $id)->first();
        $myorder = DB::table('tb_order')
        ->where('order_id', $id)
        ->leftJoin('tb_order_detail', 'tb_order.order_number', '=', 'tb_order_detail.order_detail_ordernumber')
        ->leftJoin('products', 'tb_order_detail.order_detail_product', '=', 'products.id')
        ->get();
        
        $data = array(
            'detail' => $detail,
            'myorder' => $myorder,
        );
        return view('backend.order.edit', $data);
        
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
        
        $datadetail = Order::where('order_id' , $id)->first();
        if ($datadetail->order_pay == 'Bank' ) {
            $datapayment = Payment::where('payment_ordernumber' , $datadetail->order_number)->delete();
            // dd($datapayment);
        } else {
            # code...
        }
        $data = DB::table('tb_order')
        ->where('order_id', $id)
        ->leftJoin('tb_order_detail', 'tb_order.order_number', '=', 'tb_order_detail.order_detail_ordernumber')
        // ->leftJoin('products', 'tb_order_detail.order_detail_product', '=', 'products.id')
        ->get();
        foreach($data as $item) 
        {
            $datapro = Orderdetail::where('order_detail_ordernumber' , $datadetail->order_number)->delete();
        }
        Order::where('order_id',$id)->delete();
        return back();
    }
    public function backpay()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $order = Order::where('order_satatus', 'Pay')->orderBy('order_id','DESC')->get();
        $data = array(
            'order' => $order,
        );
        return view('backend.order.paymentacc',$data);
    }
    public function savepay(Request $request, $id)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        // dd($request);
        $savepay = Order::find($id);
        $savepay->order_satatus = $request->order_satatus;
        $savepay->save();
        return back();
    }
    public function backpro()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $order = Order::where('order_satatus', 'Pro')->orderBy('order_id','DESC')->get();
        $data = array(
            'order' => $order,
        );
        return view('backend.order.processing',$data);
    }
    public function savepro(Request $request, $id)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        // dd($request);
        $savepay = Order::find($id);
        $savepay->order_satatus = $request->order_satatus;
        $savepay->save();
        return back();
    }
    public function backdelivery()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $order = Order::where('order_satatus', 'D')->orderBy('order_id','DESC')->get();
        $data = array(
            'order' => $order,
        );
        return view('backend.order.delivered',$data);
    }
    public function savedelivery(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        
        // dd($request);
        $savepay = Order::find($request->order_id);
        $savepay->order_satatus = $request->order_satatus;
        $savepay->order_tracking = $request->order_tracking;
        $savepay->save();
        return back();
    }
}
