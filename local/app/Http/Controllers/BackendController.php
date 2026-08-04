<?php

namespace App\Http\Controllers;

use App\Gallery_banner_menu_head;
use App\Menu_product_head;
use App\Products;
use Illuminate\Http\Request;
use DB;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Session;

class BackendController extends Controller
{


    public function Dashboard()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $order = DB::table('lv_order_detail')
            ->get();

        $order = count($order);

        $data = array(
            'count_order' => $order
        );

        return view('backend.index', $data);
        // return view('backend.layouts.main');
    }

    public function delete_product($products_id) {
        
        DB::table('products')
            ->where('products_id', '=', $products_id)
            ->delete();
        
        return redirect('products');
    }

    public function index()
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $menu_head = Menu_product_head::all();
        $data = array(
            'menu_head' => $menu_head
        );

        return view('backend.plan.menu_head', $data);
        // return view('backend.layouts.main');
    }

    public function insert(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $head_menu_img = 'local/storage/app/' . $request->img_menu->store('image_head_menu');

        $head_menu = new Menu_product_head();
        $head_menu->img_head_menu_eng = $head_menu_img;
        $head_menu->name_head_menu_thai = $request['namet'];
        $head_menu->name_head_menu_eng = $request['namee'];
        $head_menu->title_head_menu_thai = $request['titlet'];
        $head_menu->title_head_menu_eng = $request['titlee'];
        $head_menu->content_head_menu_thai = $request['contentt'];
        $head_menu->content_head_menu_eng = $request['contente'];


        $head_menu->save();


        return redirect('/menu');
    }

    public function show(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $show_menu_head = Menu_product_head::where('menu_product_head_id', $request['id'])
            ->first();
        return view('backend.modal_menu_head', compact('show_menu_head'));
    }

    public function edit(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $edit_menu_head = Menu_product_head::where('menu_product_head_id', $request['id_menu_head'])
            ->first();
        if ($request->img_menu !== null) {

            if (file_exists($edit_menu_head->img_head_menu_eng)) {
                unlink($edit_menu_head->img_head_menu_eng);
            }
            $head_menu_img = 'local/storage/app/' . $request->img_menu->store('image_head_menu');

            $edit_menu_head->img_head_menu_eng = $head_menu_img;

            $edit_menu_head->name_head_menu_thai = $request['namet'];
            $edit_menu_head->name_head_menu_eng = $request['namee'];
            $edit_menu_head->title_head_menu_thai = $request['titlet'];
            $edit_menu_head->title_head_menu_eng = $request['titlee'];
            $edit_menu_head->content_head_menu_thai = $request['contentt'];
            $edit_menu_head->content_head_menu_eng = $request['contente'];


            $edit_menu_head->save();


        } else {
            $edit_menu_head->name_head_menu_thai = $request['namet'];
            $edit_menu_head->name_head_menu_eng = $request['namee'];
            $edit_menu_head->title_head_menu_thai = $request['titlet'];
            $edit_menu_head->title_head_menu_eng = $request['titlee'];
            $edit_menu_head->content_head_menu_thai = $request['contentt'];
            $edit_menu_head->content_head_menu_eng = $request['contente'];


            $edit_menu_head->save();
        }
        return redirect('menu');

    }

    public function destroy($iddelete)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $delete_menu_head = Menu_product_head::where('menu_product_head_id', $iddelete)
            ->first();
        $delete_gallery = Gallery_banner_menu_head::where('menu_product_head_pk', $iddelete)->delete();
        $delete_product = Products::where('menu_head_pk', $iddelete)->delete();
        /*if (file_exists($delete_menu_head->img_head_menu_eng)) {
            unlink($delete_menu_head->img_head_menu_eng);
        }
        $delete_menu_head->delete();*/

        DB::table('menu_product_head')
            ->where('menu_product_head_id', '=', $iddelete)
            ->delete();

        //dd($iddelete);

        //return redirect('/products');
    }

    public function show_gallery_banner(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data_gallery = Menu_product_head::where('menu_product_head_id', $request->id)->first();
        $data_gallery_all = Gallery_banner_menu_head::where('menu_product_head_pk', $request->id)->get();

        return view('backend.modal_gallery_banner_menu_head', compact('data_gallery', 'data_gallery_all'));
    }

    public function save_gallery_banner(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        // save วิธีการเซฟ //
        if ($request->images != null) {
            foreach ($request->images as $key => $rgallery) {
                $img_gallery_menu_head = 'local/storage/app/' . $rgallery->store('imagegalley_head_menu');

                $rgallery = new Gallery_banner_menu_head();
                $rgallery->img_gallery_banner_menu_head = $img_gallery_menu_head;
                $rgallery->menu_product_head_pk = $request->id_menu_head;
                $rgallery->save();
            }

            return redirect('/menu');
        }
        return redirect('/menu');
    }

    public function delete_gallery_banner_menu(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        
        $iddelet = $request->id;
        $iddelete_gallery = Gallery_banner_menu_head::where('gallery_menu_head_id', $iddelet)
            ->first();


        if (file_exists($iddelete_gallery->img_gallery_banner_menu_head)) {
            unlink($iddelete_gallery->img_gallery_banner_menu_head);
        }
        $iddelete_gallery->delete();

        return 0;

    }

}
