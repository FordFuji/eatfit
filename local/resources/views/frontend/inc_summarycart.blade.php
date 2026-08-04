                    <div class="bg_box_cartright">
                        <div class="box_cartright">
                        <div class="topic_cartright"><img src="{{asset('files/frontend/images/icon_cart2.svg')}}" class="svg" alt="">@if(Session::get('lang') == 'th') ตระกร้าสินค้าของฉัน @else My Cart @endif</div>
                            <div class="bgwhite_cartright">
@php
//dd(Session::all());
$sub_total = 0;
$all_calories = 0;
@endphp
@foreach(ShoppingCart::all() as $r_inc)
    @php
    if($r_inc->redeem_point != 'Redeem Point') {
        $price = $r_inc->qty * $r_inc->price;
        $sub_total += $price;
    }

    $calories = $r_inc->qty * $r_inc->calories;
    $all_calories += $calories;
    @endphp
                                <div class="item_cartright">
                                    <div class="row">
                                        <div class="col-3 col-md-2 col-lg-3 cartphoto_nopadright">
                                            <a href="{{url('product_page/'.$r_inc->id)}}"><img src="{{asset($r_inc->image)}}" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="col-6 col-md-6 col-lg-6">
                                            <div>
                                                <div class="pname_cartright">{{$r_inc->name}}</div>
                                                <div class="qty_cartright">@if(Session::get('lang') == 'th') จำนวน @else QTY @endif: {{$r_inc->qty}}</div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-4 col-lg-3 price_nopadleft">
                                            <div class="price_cartright">{{number_format($r_inc->price, 2, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                        </div>
                                    </div>
                                </div>
@endforeach

@if(Session::get('giftset_id') != 0)
    @php
    $giftset = DB::table('lv_giftset')->where('giftset_id', '=', Session::get('giftset_id'))->first();
    @endphp
                                <div class="item_cartright">
                                    <div class="row">
                                        <div class="col-3 col-md-2 col-lg-3 cartphoto_nopadright">
                                            <a href="#"><img src="{{asset($giftset->giftset_image)}}" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="col-6 col-md-6 col-lg-6">
                                            <div>
                                                <div class="pname_cartright">{{$giftset->giftset_name}}</div>
                                                <div class="qty_cartright">1</div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-4 col-lg-3 price_nopadleft">
                                            <div class="price_cartright">{{number_format(0, 2, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                        </div>
                                    </div>
                                </div>
@endif
                                <!-- <div class="item_cartright">
                                    <div class="row">
                                        <div class="col-3 cartphoto_nopadright">
                                            <a href=""><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <div class="pname_cartright">choize - Chocolate</div>
                                                <div class="qty_cartright">QTY:  1</div>
                                                <div class="btn_cartright">
                                                    <a href="cart.php" class="btn_edit"><i class="fas fa-pen-square"></i> Edit</a>
                                                    <a href="#" class="btn_delete"><i class="fas fa-times-circle"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="price_cartright">65.00 THB</div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="cartright_boxpromocode">
                                    <div class="box_promocode">
                                         <input type="text" id="promocode_frontend" placeholder="@if(Session::get('lang') == 'th') ใส่โค้ดโปรโมชัน @else Enter a new code @endif" value="@if(Session::get('promocode_name') != ''){{ Session::get('promocode_name') }}@endif"><button class="btn_default" onclick="checkPromocode();">@if(Session::get('lang') == 'th') แลกคะแนน @else redeem @endif</button>
                                     </div>
                                </div>
                                <div class="cartright_boxsummary">
                                    <div class="topic_ordersum">@if(Session::get('lang') == 'th') สรุปรายการสินค้า @else ORDER SUMMARY @endif</div>  
                                     <div class="ordersum_border">
                                         <div class="row">
                                             <div class="col-6 nopad"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') พลังงานทั้งหมด @else Total Calories @endif</span></div>
                                             <div class="col-6 nopad text-right">{{number_format($all_calories, 0, '.', ',')}}</div>
                                         </div>
                                     </div> 
                                     <div class="ordersum_border">
                                         <div class="row">
                                             <div class="col-6 nopad txt_bold"><span class="topic2_ordersum">@if(Session::get('lang') == 'th')รหัสโปรโมชัน @else Promo Code @endif</span></div>
                                             <div class="col-6 nopad text-right txt_bold"><span class="promocode_name">{{(Session::get('promocode_name') != '') ? Session::get('promocode_name') : '-'}}</span></div>
                                         </div>
                                         <div class="row">
                                            <div class="col-6 nopad txt_bold"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') โปรโมชัน @else Promotion @endif</span></div>
                                            <div class="col-6 nopad text-right txt_bold">{{(Session::get('promotion') != '') ? Session::get('promotion') : '-'}}</div>
                                         </div>
@php
$discount = 0;
$promotion_complete = DB::table('lv_promotion_complete')
    ->where('promotion_complete_id', '=', '1')
    ->where('promotion_complete_from_price', '<=', $sub_total)
    ->where('promotion_complete_begin_date', '<=', date('Y-m-d'))
    ->where('promotion_complete_end_date', '>=', date('Y-m-d'))
    ->first();
@endphp
@if(Session::get('promotion') == 'Promotion eatfit') 
    @if(Session::get('promotion_by_product_free_shipping') != true)
        {{-- @if(!empty($promotion_complete))                               
            @php
            $discount = $sub_total * $promotion_complete->promotion_complete_discount / 100;
            @endphp
            @if($promotion_complete->promotion_complete_free_shipping == 'Yes')
                @php
                session(['order_detail_shipping' => 0]);
                @endphp
            @endif
        @endif --}}
    @endif
@else
    @php
    //dd($shipping_address);
    $discount = 0;
    if(Session::get('promotion_by_product_free_shipping') != true) {
        if(!empty($shipping_address) or !empty($member_address)) {
            if(!empty($shipping_address)) {
                if(!empty($shipping_address->member_sub_district)) {
                    $row_shipping = DB::table('lv_tumbol')
                        ->where('tumbol_name_en', '=', $shipping_address->member_sub_district)
                        ->first();

                    if(!empty($row_shipping)) {
                        session(['order_detail_shipping' => $row_shipping->tumbol_shipping]);
                    }
                }
            }/* elseif(!empty($member_address)) {
                
            }*/
        }/* else {

        }*/
    }
    @endphp
@endif
@if(!empty($promotion_complete))                               
    @php
    $discount = $sub_total * $promotion_complete->promotion_complete_discount / 100;
    @endphp
    @if($promotion_complete->promotion_complete_free_shipping == 'Yes')
        @php
        session(['order_detail_shipping' => 0]);
        @endphp
    @endif
@endif
@php
/*if(!empty(Session::get('promocode_frontend_discount'))) {
    $discount += Session::get('promocode_frontend_discount');
}*/

$check_shipping_free = false;
if(empty($promotion_complete)) {
    if(!empty(Session::get('discount_point_redeem'))) {
        $discount += Session::get('discount_point_redeem'); 
    }

    $sub_total = 0;
    foreach(ShoppingCart::all() as $r_inc) {
        $price = $r_inc->qty * $r_inc->price;
        $sub_total += $price;
    }

    $check_shipping_free = false;

    foreach(ShoppingCart::all() as $r_inc) {
        $promotion_by_product_ = DB::table('lv_promotion_by_product')
            ->where('promotion_by_product_id', '=', '1')
            ->where('promotion_by_product_amount', '<=', $sub_total)
            ->first();

        if(!empty($promotion_by_product_)) {
            $exp = explode(', ', $promotion_by_product_->products_id);

            if(!empty($exp)) {
                foreach($exp as $product_id_) {
                    if($product_id_ == $r_inc->id) {
                        $check_shipping_free = true;
                    }
                }
            }
        }

        if($r_inc->name == 'Package 3 Days') {
            $row_promotion_by_product_id = DB::table('lv_promotion_by_product')
                ->where('promotion_by_product_amount', '<=', $sub_total)
                ->where('products_package_3', '=', 'Yes')
                ->first();

            if(!empty($row_promotion_by_product_id)) {
                $check_shipping_free = true;
            }
        }

        if($r_inc->name == 'Package 5 Days') {
            $row_promotion_by_product_id = DB::table('lv_promotion_by_product')
                ->where('promotion_by_product_amount', '<=', $sub_total)
                ->where('products_package_3', '=', 'Yes')
                ->first();

            if(!empty($row_promotion_by_product_id)) {
                $check_shipping_free = true;
            }
        }

        if($r_inc->name == 'Package 7 Days') {
            $row_promotion_by_product_id = DB::table('lv_promotion_by_product')
                ->where('promotion_by_product_amount', '<=', $sub_total)
                ->where('products_package_3', '=', 'Yes')
                ->first();

            if(!empty($row_promotion_by_product_id)) {
                $check_shipping_free = true;
            }
        }

        if(!empty($row_promotion_by_product_id) and $row_promotion_by_product_id->promotion_by_product_free_shipping == 'Yes' and $check_shipping_free == true) {
            $shipping = 0;
        }
    }
}

$shipping = 0;

//dd(Session::get('promocode_free_shipping'), Session::get('promotion_by_product_free_shipping'));
if((!empty(Session::get('promocode_free_shipping')) and Session::get('promocode_free_shipping') == 'Yes') or $check_shipping_free == true) {
    $shipping = 0;

    Session::put('order_detail_shipping', 0);
} else {
    $row_shipping = DB::table('lv_tumbol')
        ->where('tumbol_name_en', '=', Session::get('order_detail_shipping_sub_district'))
        ->orWhere('tumbol_name_th', '=', Session::get('order_detail_shipping_sub_district'))
        ->first();

    if(!empty($row_shipping)) {
        Session::put('order_detail_shipping', $row_shipping->tumbol_shipping);
        $shipping = $row_shipping->tumbol_shipping;
    } else {
        Session::put('order_detail_shipping', 0);
        $shipping = 0;
    }    
}

$total = $sub_total + $shipping - $discount;
@endphp
                                         <div class="row">
                                             <div class="col-6 nopad"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') ส่วนลด @else DISCOUNT @endif</span></div>
                                             <div class="col-6 nopad text-right"><span class="order_discount">{{number_format($discount, 2, '.', ',')}}</span><span class="txt_grey">@if(Session::get('lang') == 'th') บาท @else THB @endif</span></div>
                                         </div>
                                         <div class="row">
                                             <div class="col-6 nopad"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') ค่าจัดส่ง @else SHIPPING @endif</span></div>
                                             <div class="col-6 nopad text-right"><span class="txt_grey txt_calculate">@if($shipping == 0){{number_format($shipping, 2, '.', ',')}}@else{{number_format(Session::get('order_detail_shipping'), 2, '.', ',')}}@endif @if(Session::get('lang') == 'th') บาท @else THB @endif</span></div>
                                         </div>
                                         <div class="row cartright_subtotal">
                                             <div class="col-6 nopad txt_bold"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') ยอดรวม @else SUBTOTAL @endif</span></div>
                                             <div class="col-6 nopad text-right txt_bold">{{number_format($sub_total, 2, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                         </div>
                                        <div class="row cartright_subtotal">
                                            <div class="col-6 nopad txt_bold"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') ยอดรวมสุทธิ @else TOTAL @endif</span></div>
                                            <div class="col-6 nopad text-right txt_bold"><span class="order_total">{{number_format($total, 2, '.', ',')}}</span> @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                        </div>
                                         <div class="row">
                                             <div class="col-12 nopad">
                                                 <div class="txt_grey">@if(Session::get('lang') == 'th') รวมภาษีมูลค่าเพิ่ม @else vat included @endif</div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="ordersum_border"> 
                                         <div class="row">
                                             <div class="col-6 nopad"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') คะแนนที่ได้รับ @else points earned @endif</span></div>
                                             <div class="col-6 nopad text-right">{{floor(($sub_total - $discount) / 100)}} @if(Session::get('lang') == 'th') คะแนน @else POINTS @endif</div>
                                         </div> 
                                         <div class="row">
                                             <div class="col-6 nopad"><span class="topic2_ordersum txt_pink"><img src="{{asset('files/frontend/images/icon_eatfit_king.svg')}}" class="icon_kingpink" alt=""> @if(Session::get('lang') == 'th') คะแนนสะสมของคุณ @else your points @endif</span></div>
                                             <div class="col-6 nopad text-right txt_pink">{{floor(($sub_total - $discount) / 100)}} @if(Session::get('lang') == 'th') คะแนน @else POINTS @endif</div>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
<script>
    function checkPromocode() {
        //alert($("#promocode_frontend").val());
        if($("#promocode_frontend").val() == '') {
            alert("Please enter Promocode");
        } else {
            $.post('{{ url("/ajaxPromoCodeFrontend") }}', { promocode_frontend: $("#promocode_frontend").val(), "_token": "{{ csrf_token() }}" }, function(data) {
                var data_split = data.split('!@#$%^&*())_+');

                if(data_split[3] == '0.00') {
                    alert('Incorrect Promocode Or Price Not Complete Or Limit Amount Or Expire Promocode');
                    $("#promocode_frontend").val('');
                }

                $(".order_qty").html(data_split[0]);
                $(".order_sub_total").html(data_split[1]);
                $(".order_shipping").html(data_split[2]);
                $(".order_discount").html(data_split[3]);
                $(".order_total").html(data_split[4]);
                $(".cart_basket").html(data_split[5]);
                $(".view_cart").html(data_split[6]);
                $(".order_calories").html(data_split[7]); 
                $(".promotion_2_type_before").html(data_split[8]);
                $(".cart_point").html(data_split[9]); 

                $(".promocode_name").html(data_split[11]);

                location.reload();
            });
        }
    }
</script>