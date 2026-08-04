<?php

namespace App\Http\Controllers;

use App\Delivery_products;
use App\Gallery_products;
use App\Ingredients_products;
use App\Menu_product_head;
use App\Products;
use App\Tag_products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Session;

class ProductsController extends Controller
{

    public function index($mode = 'index')
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $products = Products::all();
        $menu_products = DB::select("SELECT menu_product_head_id, CONCAT(name_head_menu_thai ,'  |  จำนวน เมนูอาหาร = ',(SELECT COUNT(products_id) FROM products WHERE menu_head_pk = menu_product_head_id )) AS name FROM `menu_product_head`");
        $menu_products_head_name = Menu_product_head::all();
//        return $menu_products;
        $data = array(
            'products' => $products,
            'menu_products' => $menu_products,
            'menu_products_head_name' => $menu_products_head_name,
            'mode' => $mode
        );
        return view('backend.products.products', $data);
    }

    public function insert(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        // dd($request);

        $img = 'local/storage/app/' . $request->img_products_outside->store('img_products_outside');

        $products_insert = new Products();

        /*if(move_uploaded_file($_FILES['img_products_outside']['tmp_name'], 'local/storage/app/'.$_FILES['img_products_outside']['name'])) {
            $products_insert->img_products = 'local/storage/app/'.$_FILES['img_products_outside']['name'];
        }*/

        $products_insert->img_products = $img;

        $products_insert->percent = $request['percent_product'];

        $products_insert->color_percent = $request['color'];

        $products_insert->name_products_thai = $request['products_namet'];
        $products_insert->name_products_eng = $request['products_namee'];

        $products_insert->price_full = $request['price_full'];
        $products_insert->price_sale = $request['price_sale'];
        $products_insert->price = $request['price'];

        $products_insert->title_inside_products_thai = $request['title_inside_products_thai'];
        $products_insert->title_inside_products_eng = $request['title_inside_products_eng'];

        $products_insert->calories_products = $request['calories_products'];
        $products_insert->carbs_products = $request['carbs_products'];
        $products_insert->fat_products = $request['fat_products'];
        $products_insert->protein_products = $request['protein_products'];

        $products_insert->text_delivery_upper_thai = $request['text_delivery_upper_thai'];
        $products_insert->text_delivery_upper_eng = $request['text_delivery_upper_thai'];
        $products_insert->text_delivery_down_thai = $request['text_down_delivery_thai'];
        $products_insert->text_delivery_down_eng = $request['text_down_delivery_eng'];

        $products_insert->menu_head_pk = $request['head_menu_id'];

        if($request['products_bestsellers'] == 'Yes') {
            $products_insert->products_bestsellers = $request['products_bestsellers'];
        } else {
            $products_insert->products_bestsellers = 'No';
        }

        $products_insert->save();


        return redirect('/products');


    }

    public function show(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $show_products = Products::where('products_id', $request['id'])
            ->first();
        $menu_products = DB::select("SELECT menu_product_head_id, CONCAT(name_head_menu_thai ,'  |  จำนวน เมนูอาหาร = ',(SELECT COUNT(products_id) FROM products WHERE menu_head_pk = menu_product_head_id )) AS name FROM `menu_product_head`");

        return view('backend.modal_products', compact('show_products', 'menu_products'));
    }

    public function edit(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $edit_products = Products::where('products_id', $request['id_products'])->first();

        if ($request->img_products_outside != null) {
            if (file_exists($edit_products->img_products)) {
                unlink($edit_products->img_products);
            }
            $products_img = 'local/storage/app/' . $request->img_products_outside->store('img_products_outside');
            $edit_products->img_products = $products_img;

            $edit_products->percent = $request['percent_product'];

            if ($request->color != null){
                $edit_products->color_percent = $request['color'];
            }


            $edit_products->name_products_thai = $request['products_namet'];
            $edit_products->name_products_eng = $request['products_namee'];

            $edit_products->price_full = $request['price_full'];
            $edit_products->price_sale = $request['price_sale'];
            $edit_products->price = $request['price'];

            $edit_products->title_inside_products_thai = $request['title_inside_products_thai'];
            $edit_products->title_inside_products_eng = $request['title_inside_products_eng'];

            $edit_products->calories_products = $request['calories_products'];
            $edit_products->carbs_products = $request['carbs_products'];
            $edit_products->fat_products = $request['fat_products'];
            $edit_products->protein_products = $request['protein_products'];

            $edit_products->text_delivery_upper_thai = $request['text_delivery_upper_thai'];
            $edit_products->text_delivery_upper_eng = $request['text_delivery_upper_thai'];
            $edit_products->text_delivery_down_thai = $request['text_down_delivery_thai'];
            $edit_products->text_delivery_down_eng = $request['text_down_delivery_eng'];
            
            if($request['products_bestsellers'] == 'Yes') {
                $edit_products->products_bestsellers = $request['products_bestsellers'];
            } else {
                $edit_products->products_bestsellers = 'No';
            }

            if ($request->head_menu_id) {
                $edit_products->menu_head_pk = $request['head_menu_id'];
            }

            $edit_products->save();
            return redirect('/products');
        } else {
            $edit_products->percent = $request['percent_product'];
            if ($request->color != null){
                $edit_products->color_percent = $request['color'];

            }

            $edit_products->name_products_thai = $request['products_namet'];
            $edit_products->name_products_eng = $request['products_namee'];

            $edit_products->price_full = $request['price_full'];
            $edit_products->price_sale = $request['price_sale'];
            $edit_products->price = $request['price'];

            $edit_products->title_inside_products_thai = $request['title_inside_products_thai'];
            $edit_products->title_inside_products_eng = $request['title_inside_products_eng'];

            $edit_products->calories_products = $request['calories_products'];
            $edit_products->carbs_products = $request['carbs_products'];
            $edit_products->fat_products = $request['fat_products'];
            $edit_products->protein_products = $request['protein_products'];

            $edit_products->text_delivery_upper_thai = $request['text_delivery_upper_thai'];
            $edit_products->text_delivery_upper_eng = $request['text_delivery_upper_thai'];
            $edit_products->text_delivery_down_thai = $request['text_down_delivery_thai'];
            $edit_products->text_delivery_down_eng = $request['text_down_delivery_eng'];

            if($request['products_bestsellers'] == 'Yes') {
                $edit_products->products_bestsellers = $request['products_bestsellers'];
            } else {
                $edit_products->products_bestsellers = 'No';
            }

            if ($request->head_menu_id) {
                $edit_products->menu_head_pk = $request['head_menu_id'];
            }

            $edit_products->save();
            return redirect('/products');
        }

    }

    public function show_gallery_products(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data_products = Products::where('products_id', $request->id)->first();
        $data_gallery_products = Gallery_products::where('products_pk', $request->id)->get();

//        dd($data_gallery);
        return view('backend.modal_gallery_productsx', compact('data_products', 'data_gallery_products'));
    }

    public function save_gallery_products(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

//        dd($request);  //
        // save วิธีการเซฟ //
        if ($request->images != null) {
            foreach ($request->images as $key => $rgallery) {
                $img_gallery_products = 'local/storage/app/' . $rgallery->store('imagegalley_products');

                $rgallery = new Gallery_products();
                $rgallery->img_products_gallery = $img_gallery_products;
                $rgallery->products_pk = $request->id_products;
                $rgallery->save();
            }

            return redirect('/products');
        }
        return redirect('/products');
    }

    public function delete_gallery_products(Request $request, $iddel)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

//        dd($request);

        $iddeletepicm = Gallery_products::where('products_gallery_id', $iddel)->first();

        if (file_exists($iddeletepicm->img_products_gallery)) {
            unlink($iddeletepicm->img_products_gallery);
        }
        $iddeletepicm->delete();

        return 0;

    }

    public function edit_tag_products(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data_products = Products::where('products_id', $request->id)->first();
        $data_tag_products = Tag_products::where('products_pk', $request->id)->get();
        $data_tag_show = Tag_products::where('products_pk', $request->id)->get();
//        return $data_tag_show;
//        dd($data_gallery);
        return view('backend.modal_tag_products', compact('data_products', 'data_tag_products', 'data_tag_show'));
    }

    public function save_tag_products(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
//        dd($request);
        if ($request->tag_thai == null) {

            Tag_products::where('products_pk', $request['id_products'])->delete();
            foreach ($request['tag_thai_show'] as $keytag => $rtag_thai_show) {
                $data_tag_show = new Tag_products();
                $data_tag_show->tag_thai = $rtag_thai_show;
                $data_tag_show->tag_eng = $request['tag_eng_show'][$keytag];
                $data_tag_show->products_pk = $request->id_products;

                $data_tag_show->save();
            }
            return redirect('products');
        }


        if ($request->tag_thai != null) {
            foreach ($request['tag_thai'] as $key => $rtag_thai) {
                $tag_save = new Tag_products();
                $tag_save->tag_thai = $rtag_thai;
                $tag_save->tag_eng = $request['tag_eng'][$key];
                $tag_save->products_pk = $request->id_products;
                $tag_save->save();
            }
            return redirect('products');
        }
        return redirect('products');
    }

    public function remove_tag_products($iddel)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $tag_delete = Tag_products::where('products_tag_id', $iddel)->first();
        $tag_delete->delete();

        return 0;
    }

    public function edit_ingredients_products(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }

        $data_products = Products::where('products_id', $request->id)->first();
        $data_ingredients_products = Ingredients_products::where('products_pk', $request->id)->orderBy('ingredient_sort', 'asc')->get();

//        return $data_ingredients_products;
//        dd($data_gallery);
        return view('backend.modal_ingredients_products', compact('data_products', 'data_ingredients_products'));
    }

    public function save_ingredients_products(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
//        dd($request);


        $img = 'local/storage/app/' . $request->img_ingredients->store('img_ingredients_products');
        $save_ingredients = new Ingredients_products();

        $save_ingredients->img_ingredients = $img;
        $save_ingredients->text_ingredients_thai = $request['namet'];
        $save_ingredients->text_ingredients_eng = $request['namee'];
        $save_ingredients->products_pk = $request->id_products;

        $save_ingredients->save();

        $ingredient_sort = $request->input('ingredient_sort');
        $products_ingredients_id = $request->input('products_ingredients_id');

        if(!empty($ingredient_sort)) {
            $i = 0;
            foreach($ingredient_sort as $sort) {
                $data_ingredient = array(
                    'ingredient_sort' => $sort
                );

                DB::table('products_ingredients')
                    ->where('products_ingredients_id', '=', $products_ingredients_id[$i])
                    ->update($data_ingredient);

                $i++;
            }
        }

        return redirect('/products');
    }

    public function modal_edit_ingredients(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
//        dd($request->id);
        $data_products = Products::where('products_id', $request->id)->first();
//        return $data_products;
        $data_ingredients_products = Ingredients_products::where('products_ingredients_id', $request->id)->first();

        return view('backend.modal_edit_ingredients', compact('data_products', 'data_ingredients_products'));
    }

    public function save_edit_ingredients(Request $request)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
//        dd($request);

        $edit_ingredients = Ingredients_products::where('products_ingredients_id', $request['id_ingredients'])->first();

        if ($request->img_ingredients != null) {

            if (file_exists($edit_ingredients->img_ingredients)) {
                unlink($edit_ingredients->img_ingredients);
            }
            $ingredients_img = 'local/storage/app/' . $request->img_ingredients->store('img_ingredients_products');
            $edit_ingredients->img_ingredients = $ingredients_img;

            $edit_ingredients->text_ingredients_thai = $request['namet'];
            $edit_ingredients->text_ingredients_eng = $request['namee'];
            $edit_ingredients->products_pk = $request->id_products_pk;

            $edit_ingredients->save();
            return redirect('/products');
        }
        $edit_ingredients->text_ingredients_thai = $request['namet'];
        $edit_ingredients->text_ingredients_eng = $request['namee'];
        $edit_ingredients->ingredient_sort = $request['ingredient_sort'];
        $edit_ingredients->products_pk = $request->id_products_pk;

        $edit_ingredients->save();

        return redirect('/products');

    }

    public function delete_ingredients($iddel)
    {
        if(Session::get("user_id") == '') {
            return redirect('backend/login');
        }
        
        $delete_ingredients = Ingredients_products::where('products_ingredients_id', $iddel)->first();

        if (file_exists($delete_ingredients->img_ingredients)) {
            unlink($delete_ingredients->img_ingredients);
        }
        $delete_ingredients->delete();

        return 0;
    }


    public function edit_delivery_products(Request $request)
    {
        $data_products = Products::where('products_id', $request->id)->first();
        $show_delivery = Delivery_products::where('products_pk', $request->id)->get();
//return $show_delivery;
        return view('backend.modal_delivery_products', compact('data_products', 'show_delivery'));

    }

    public function save_delivery_products(Request $request)
    {
//        dd($request);
        $save_delivery = new Delivery_products();

        $save_delivery->option_thai = $request['option_thai'];
        $save_delivery->option_eng = $request['option_eng'];
        $save_delivery->day_thai = $request['day_thai'];
        $save_delivery->day_eng = $request['day_eng'];
        $save_delivery->time_thai = $request['time_thai'];
        $save_delivery->time_eng = $request['time_eng'];
        $save_delivery->products_pk = $request->id_products;

        $save_delivery->save();

        return redirect('/products');
    }

    public function modal_edit_delivery(Request $request)
    {
        $data_products = Products::where('products_id', $request->id)->first();
        $show_delivery = Delivery_products::where('products_delivery_id', $request->id)->first();
//        return $show_delivery;
        return view('backend.modal_edit_delivery', compact('data_products', 'show_delivery'));
    }

    public function save_edit_delivery(Request $request)
    {
//        dd($request);
        $edit_delivery = Delivery_products::where('products_delivery_id', $request['id_delivery'])->first();

        $edit_delivery->option_thai = $request['option_thai'];
        $edit_delivery->option_eng = $request['option_eng'];
        $edit_delivery->day_thai = $request['day_thai'];
        $edit_delivery->day_eng = $request['day_eng'];
        $edit_delivery->time_thai = $request['time_thai'];
        $edit_delivery->time_eng = $request['time_eng'];
        $edit_delivery->products_pk = $request->id_products_pk;

        $edit_delivery->save();

        return redirect('/products');

    }

    public function delete_delivery($iddel)
    {
        $delete_delivery = Delivery_products::where('products_delivery_id', $iddel)->first();
        $delete_delivery->delete();
        return 0;
    }

    public function edit_color(Request $request)
    {
        dd($request);

    }
}
