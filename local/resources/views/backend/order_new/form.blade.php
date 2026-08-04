@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card page-header p-0 bg-11">
                    <div class="card-block front-icon-breadcrumb row align-items-end">
                        <div class="breadcrumb-header col">
                            <div class="big-icon">
                                <i class="icon-tag"></i>
                            </div>
                            <div class="d-inline-block">
                                <h5>Order</h5>
                                <span>eatfit by Gourmet Primo </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item"><a href="#!"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header start -->

                <!-- Page-header end -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Zero config.table start -->
                            <form action="{{url('/backend/order/saveUpdateOrder')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card ">
                                    <!-- Page-body start -->
                                    <div class="card-block">
                                        <legend>Promotion Data</legend>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Promotion</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                @if(!empty($order_detail) and $order_detail->order_detail_promotion_15000_before_3_person == 'Yes') 
                                                    {{'Buy 15,000 The first 3 people get apple watch'}}
                                                @elseif(!empty($order_detail) and $order_detail->order_detail_promotion_500_get_20_percent_and_free_delivery == 'Yes')
                                                    {{'Buy 500, get 20% off with free delivery'}}
                                                @else
                                                    {{'-'}}
                                                @endif
                                            </div>
                                        </div>
                                        <legend>Shipping Data</legend>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name & Family</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_shipping_email}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_shipping_phone_number}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_shipping_address.' '.$order_detail->order_detail_shipping_sub_district.', '.$order_detail->order_detail_shipping_district.', '.$order_detail->order_detail_shipping_province.' '.$order_detail->order_detail_shipping_postcode}}
                                            </div>
                                        </div>
                                        <legend>Billing Data</legend>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name & Family</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_billing_name.' '.$order_detail->order_detail_billing_family}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_billing_email}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_billing_phone_number}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_billing_address.' '.$order_detail->order_detail_billing_sub_district.', '.$order_detail->order_detail_billing_district.', '.$order_detail->order_detail_billing_province.' '.$order_detail->order_detail_billing_postcode}}
                                            </div>
                                        </div>
                                        <legend>Data</legend>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Birth Day</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_birth_day}}
                                            </div>
                                        </div>
                                        <legend>Order Data</legend>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Order No</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_no}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Promocode</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->promocode_name}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Order Shipping Date Time (1)</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_shipping_date.' '.$order_detail->order_detail_shipping_time}}
                                            </div>
                                        </div>
@if($order_detail->order_detail_shipping_date2 != '0000-00-00' and $order_detail->order_detail_shipping_time2 != '')
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Order Shipping Date Time (2)</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_shipping_date2.' '.$order_detail->order_detail_shipping_time2}}
                                            </div>
                                        </div>
@endif
@if($order_detail->order_detail_shipping_date3 != '0000-00-00' and $order_detail->order_detail_shipping_time3 != '')
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Order Shipping Date Time (3)</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_shipping_date3.' '.$order_detail->order_detail_shipping_time3}}
                                            </div>
                                        </div>
@endif
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Payment Method</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_payment_method}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Sub Total</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_sub_total}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Discount</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_discount}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Shipping</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_shipping}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Total</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_total}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Point</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_point}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Datetime Create</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_datetime_create}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">IP Create</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_ip_create}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Datetime Update</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_datetime_update}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">IP Update</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                {{$order_detail->order_detail_ip_update}}
                                            </div>
                                        </div>
                                        <legend>Order Status</legend>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10" style="margin-top: 7px;">
                                                <select name="order_detail_status" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="Waiting for Payment" {{$order_detail->order_detail_status == 'Waiting for Payment' ? 'selected' : ''}}>Waiting for Payment</option>
                                                    <option value="Order Processing" {{$order_detail->order_detail_status == 'Order Processing' ? 'selected' : ''}}>Order Processing</option>
                                                    <option value="Shipped" {{$order_detail->order_detail_status == 'Shipped' ? 'selected' : ''}}>Shipped</option>
                                                    <option value="Delivered" {{$order_detail->order_detail_status == 'Delivered' ? 'selected' : ''}}>Delivered</option>
                                                    <option value="Order Canceled" {{$order_detail->order_detail_status == 'Order Canceled' ? 'selected' : ''}}>Order Canceled</option>
                                                </select>
                                                <br>
                                                <input type="hidden" name="order_detail_id" value="{{$order_detail->order_detail_id}}">
                                                <input type="submit" name="change_status" value="Save">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered nowrap">
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th style="width: 100px !important;">Name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Calories</th>
                                                <th>Total</th>
                                            </tr>
@php
$i = 0;
$all_calories = 0
@endphp
@if(!empty($order))
    @foreach($order as $r)
        @if($r->products_id != '-1')
            @php
            $i++;
            $price = $r->order_qty * $r->order_price;

            $calories = $r->order_qty * $r->order_calories;

            $all_calories += $calories;
            @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td width="160"><img src="{{asset($r->order_image)}}" width="150"></td>
                                                <td>{{$r->order_name}}</td>
                                                <td>{{$r->order_qty}}</td>
                                                <td>{{$r->order_price}}</td>
                                                <td>{{$calories}}</td>
                                                <td>{{$price}}</td>
                                            </tr>
        @endif
    @endforeach
@endif

@if(!empty($order))
    @foreach($order as $r)
        @if($r->products_id == '-1')
            @php
            $i++;
            $price = $r->order_qty * $r->order_price;

            $calories = $r->order_qty * $r->order_calories;

            $all_calories += $calories;
            @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><img src="{{asset($r->order_image)}}" width="150"></td>
                                                <td>{{substr($r->order_name, 0, 50).'...'}}</td>
                                                <td>{{$r->order_qty}}</td>
                                                <td>{{$r->order_price}}</td>
                                                <td>{{$calories}}</td>
                                                <td>{{$price}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="7">
                                                    <table class="table table-striped table-bordered nowrap">
            @php
            $fo = 0;
            for($f = 1; $f <= 100; $f++) {
                $order_products_id_day = 'order_products_id_'.$f.'_day';

                if($r->$order_products_id_day == 'true') {
                    $fo++;

                    echo '<tr><th width="10%" align="center">Day '.$fo.' : Set '.chr($f + 64).'</th>';
                    $products = DB::table('products')
                        ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id1')
                        ->where('lv_package.package_id', '=', $f)
                        ->first();
                    if(!empty($products)) {
                        echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                    }

                    $products = DB::table('products')
                        ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id2')
                        ->where('lv_package.package_id', '=', $f)
                        ->first();

                    if(!empty($products)) {
                        echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                    }

                    $products = DB::table('products')
                        ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id3')
                        ->where('lv_package.package_id', '=', $f)
                        ->first();
                    
                    if(!empty($products)) {
                        echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                    }

                    echo '</tr>';
                }
            }
            @endphp
            {{-- @if($r->order_products_id_1_day == 'true')
                @php
                echo '<tr><th width="10%" align="center">Day 1 : Set A</th>';
                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id1')
                    ->where('lv_package.package_id', '=', '1')
                    ->first();
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id2')
                    ->where('lv_package.package_id', '=', '1')
                    ->first();

                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id3')
                    ->where('lv_package.package_id', '=', '1')
                    ->first();
                
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                echo '</tr>';

                @endphp
            @endif

            @if($r->order_products_id_2_day == 'true')
                @php
                echo '<tr><th width="10%" align="center">Day 2 : Set B</th>';
                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id1')
                    ->where('lv_package.package_id', '=', '2')
                    ->first();
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id2')
                    ->where('lv_package.package_id', '=', '2')
                    ->first();

                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id3')
                    ->where('lv_package.package_id', '=', '2')
                    ->first();
                
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                echo '</tr>';

                @endphp
            @endif

            @if($r->order_products_id_3_day == 'true')
                @php
                echo '<tr><th width="10%" align="center">Day 3 : Set C</th>';
                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id1')
                    ->where('lv_package.package_id', '=', '3')
                    ->first();
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id2')
                    ->where('lv_package.package_id', '=', '3')
                    ->first();

                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id3')
                    ->where('lv_package.package_id', '=', '3')
                    ->first();
                
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                echo '</tr>';

                @endphp
            @endif
                
            @if($r->order_products_id_4_day == 'true')
                @php
                echo '<tr><th width="10%" align="center">Day 4 : Set D</th>';
                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id1')
                    ->where('lv_package.package_id', '=', '4')
                    ->first();
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id2')
                    ->where('lv_package.package_id', '=', '4')
                    ->first();

                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id3')
                    ->where('lv_package.package_id', '=', '4')
                    ->first();
                
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                echo '</tr>';

                @endphp
            @endif
            
            @if($r->order_products_id_5_day == 'true')
                @php
                echo '<tr><th width="10%" align="center">Day 5 : Set E</th>';
                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id1')
                    ->where('lv_package.package_id', '=', '5')
                    ->first();
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id2')
                    ->where('lv_package.package_id', '=', '5')
                    ->first();

                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id3')
                    ->where('lv_package.package_id', '=', '5')
                    ->first();
                
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                echo '</tr>';

                @endphp
            @endif
            
            @if($r->order_products_id_6_day == 'true')
                @php
                echo '<tr><th width="10%" align="center">Day 6 : Set F</th>';
                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id1')
                    ->where('lv_package.package_id', '=', '6')
                    ->first();
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id2')
                    ->where('lv_package.package_id', '=', '6')
                    ->first();

                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id3')
                    ->where('lv_package.package_id', '=', '6')
                    ->first();
                
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                echo '</tr>';

                @endphp
            @endif
            
            @if($r->order_products_id_7_day == 'true')
                @php
                echo '<tr><th width="10%" align="center">Day 7 : Set G</th>';
                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id1')
                    ->where('lv_package.package_id', '=', '7')
                    ->first();
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id2')
                    ->where('lv_package.package_id', '=', '7')
                    ->first();

                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                $products = DB::table('products')
                    ->join('lv_package', 'products.products_id', '=', 'lv_package.product_id3')
                    ->where('lv_package.package_id', '=', '7')
                    ->first();
                
                if(!empty($products)) {
                    echo '<td align="center" width="30%"><img src="'.asset($products->img_products).'" width="100"><br>'.$products->name_products_thai.'</td>';
                }

                echo '</tr>';

                @endphp
            @endif --}}                         
                                                    </table>
                                                </td> 
                                            </tr>                                               
        @endif
    @endforeach
@endif  
                                            
                                            <tr>
                                                <th colspan="6">Sub Total</th>
                                                <th>{{$order_detail->order_detail_sub_total}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Discount</th>
                                                <th>{{$order_detail->order_detail_discount}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Shipping</th>
                                                <th>{{$order_detail->order_detail_shipping}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Total</th>
                                                <th>{{$order_detail->order_detail_total}}</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>        
                            </div>
                        </div>
                    </div>
                    <!-- Zero config.table end -->
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
