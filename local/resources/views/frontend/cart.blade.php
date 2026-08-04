<!doctype html>
<html>

<head>
	@include('frontend.layouts.inc_head')
</head>

<body>

	<div class="container-fluid footer_notop">
	
		@include('frontend.layouts.inc_menu')

		<section class="row">
		    <div class="container">
                 <div class="row wrap_navigationbar">
                     <a href="{{url('index')}}"><img src="{{asset('files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span>  <div>@if(Session::get('lang') == 'th') ตระกร้าสินค้า @else My Cart @endif</div>
                 </div>
		    </div>
		</section>
		
		
		<section class="row">
		    <div class="container">
		        <div class="row">
                     <div class="col-12">
                         <div class="cart_bggreen_topic">
                             <img src="{{ asset('files/frontend/images/icon_cart.svg') }}" alt=""> @if(Session::get('lang') == 'th') ตระกร้าของฉัน @else My Cart @endif
                         </div>
                         <div class="cart_bggrey_topic">
                             <div class="row">
                                 <div class="col-12 col-lg-5">@if(Session::get('lang') == 'th') รายการ  @else PRODUCT @endif</div>
                                 <div class="col-12 col-lg-2 cart_hide_mb text-center">@if(Session::get('lang') == 'th') ราคา @else PRICE @endif</div>
                                 <div class="col-12 col-lg-2 cart_hide_mb text-center">@if(Session::get('lang') == 'th') จำนวน @else QUANTITY @endif</div>
                                 <div class="col-12 col-lg-2 cart_hide_mb text-center">@if(Session::get('lang') == 'th') ยอดรวม @else SUBTOTAL @endif</div>
                                 <div class="col-12 col-lg-1"></div>
                             </div>
                         </div>
                        <span class="view_cart">
@php
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
                         <div class="cart_itemproduct">
                             <div class="row">
                                 <div class="col-12 col-lg-5">
                                     <div class="row">
                                         <div class="col-3 col-sm-2 col-lg-3 cart_mbnopad">
                                             <a href="product-page.php"><img src="{{asset($r_inc->image)}}" class="img-fluid" alt=""></a>
                                         </div>
                                         <div class="col-9 col-sm-10 col-lg-9">
                                             <div class="cart_pname">{{$r_inc->name}}</div>
                                             <div>@if(Session::get('lang') == 'th') พลังงาน @else Calories @endif {{$calories}}</div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-9 offset-3 col-sm-3 offset-sm-2 col-lg-2 offset-lg-0 mb_textleft text-center">
                                    <div class="cart_price">{{number_format($r_inc->price, 2, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                 </div>
                                 <div class="col-9 offset-3 col-sm-3 offset-sm-0 col-md-3 col-lg-2 mb_textleft2 text-center">
    @if($r_inc->redeem_point != '')
                                    1                        
    @else
                                     <div class="box_quantity">
                                            <span class="minus" onclick="minus_('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-minus"></i></span>
                                            <input class="quantity-input" id="qty_<?php echo $r_inc->__raw_id;?>" type="text" name="quantity" value="{{$r_inc->qty}}">
                                            <span class="plus" onclick="plus_('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-plus"></i></span>
                                    </div>
    @endif
                                 </div>
                                 <div class="col-9 offset-3 col-sm-3 offset-sm-0 col-md-3 col-lg-2 mb_textleft2 text-center">
                                     <div class="cart_price">{{number_format($price, 2, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                 </div>
                                 <div class="col-9 offset-3 col-sm-1 offset-sm-0 text-right">
                                     <button class="cart_del" onclick="deleteCart('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-times-circle"></i> <span>Delete</span></button>
                                 </div>
                             </div>
                         </div>
@endforeach

@if(Session::get('giftset_id') != 0) 
    @php
    $giftset = DB::table('lv_giftset')->where('giftset_id', '=', Session::get('giftset_id'))->first();
    @endphp
                        <div class="cart_itemproduct">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="row">
                                        <div class="col-3 col-sm-2 col-lg-3 cart_mbnopad">
                                            <a href="#"><img src="<?php echo asset($giftset->giftset_image);?>" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="col-9 col-sm-10 col-lg-9">
                                            <div class="cart_pname">{{ $giftset->giftset_name }}</div>
                                            <div><?php //if(Session::get('lang') == 'th') echo 'พลังงาน'; else echo 'Calories';?> <?php //echo $calories;?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9 offset-3 col-sm-3 offset-sm-2 col-lg-2 offset-lg-0 mb_textleft text-center">
                                <div class="cart_price">0 @if(Session::get('lang') == 'th') {{ 'บาท' }} @else {{ 'THB' }} @endif</div>
                                </div>
                                <div class="col-9 offset-3 col-sm-3 offset-sm-0 col-md-3 col-lg-2 mb_textleft2 text-center">1</div>
                                <div class="col-9 offset-3 col-sm-3 offset-sm-0 col-md-3 col-lg-2 mb_textleft2 text-center">
                                <div class="cart_price">0 @if(Session::get('lang') == 'th') {{ 'บาท' }} @else {{ 'THB' }} @endif</div>
                                </div>
                                <div class="col-9 offset-3 col-sm-1 offset-sm-0 text-right">
                                    {{-- <button class="cart_del" onclick="deleteCartInc('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-times-circle"></i> <span>Delete</span></button> --}}
                                </div>
                            </div>
                        </div>
@endif
                        </span>
                        <span class="promotion_by_product">
@php
$sub_total = 0;
foreach(ShoppingCart::all() as $r) {
    $price = $r->qty * $r->price;

    $sub_total += $price;
}
@endphp

@php
$promotion_complete = DB::table('lv_promotion_complete')
    ->where('promotion_complete_id', '=', '1')
    ->where('promotion_complete_from_price', '<=', $sub_total)
    ->where('promotion_complete_begin_date', '<=', date('Y-m-d'))
    ->where('promotion_complete_end_date', '>=', date('Y-m-d'))
    ->first();
@endphp

@if(!empty($promotion_complete))                               
    @php
    $discount = $sub_total * $promotion_complete->promotion_complete_discount / 100;
    Session::put('promocode_frontend_discount', $discount);
    @endphp
    @if($promotion_complete->promotion_complete_free_shipping == 'Yes')
        @php
        session(['order_detail_shipping' => 0]);
        @endphp
    @endif
@endif

@if(empty($promotion_complete))
    @if(!empty($promotion_by_product) and $promotion_by_product->promotion_by_product_amount <= $sub_total)
        @php
        $exp = explode(', ', $promotion_by_product->products_id);
        $product = DB::table('products')
            ->whereIn('products_id', $exp)
            ->get();
        @endphp
                         <div class="cart_boxpromotion">
                            <div class="bg_topicpromotion_cart">
                                <div>{{ Session::get('lang') == 'th' ? 'โปรโมชัน' : 'promotion' }}</div>
                                <p>{{ Session::get('lang') == 'th' ? $promotion_by_product->promotion_by_product_text_th : $promotion_by_product->promotion_by_product_text_en }}</p>
                            </div>
                            <div class="owl-recentproduct owl-carousel owl-theme">
        @if(!empty($product))
            @foreach($product as $p)
                @php
                    $discount_price = ceil($p->price - ($p->price * $promotion_by_product->promotion_by_product_percent / 100));
                @endphp
                                <div>
                                    <div class="item_products">
                                        <div class="box_addwishlist"><button onclick="setWish('{{ $p->products_id }}');"><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt="" style="color: #f39193;"><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button></div>
                                        <a href="{{ url('product_page/'.$p->menu_head_pk.'/'.$p->products_id) }}">
                                            <div class="product_photosquare">
                                                <figure><img src="{{asset($p->img_products)}}" alt=""></figure>
                                            </div>
                                            <div class="item_productname">{{ Session::get('lang') == 'th' ? $p->name_products_thai : $p->name_products_eng }}</div>
                                        </a>
                                        <div class="item_productprice">Price : @if($p->price != $discount_price)<span>฿{{ $p->price }}</span>@endif <div>฿ {{ $discount_price }}</div></div>
                                        <div class="wrap_addcart">
                                            <a href="" class="btn_default btn_green btn_addcart" id="{{ $p->products_id }}_promotion_by_product"><img src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
            @endforeach
        @endif
                            </div>
                         </div>
    @endif
@endif
                        </span>
                         <div class="bg_promocode">
                             <div class="box_promocode">
                                 <img src="{{asset('files/frontend/images/icon_promocode.svg')}}" alt=""> <span>@if(Session::get('lang') == 'th'){{'รหัสโปรโมชัน'}}@else{{'Promo code'}}@endif</span>
                                 <input type="text" id="promocode_frontend" placeholder="@if(Session::get('lang') == 'th') ใส่รหัสโปรโมชัน @else Enter a new code @endif" value="@if(Session::get('promocode_name') != ''){{ Session::get('promocode_name') }}@endif"> <button class="btn_default" onclick="checkPromocode();">@if(Session::get('lang') == 'th') แลกคะแนน @else redeem @endif</button>
                             </div>
                         </div>
                         
                         <div class="cart_boxsummary">
                             <div class="row">
                                 <div class="col-12 col-lg-5 col-xl-7"></div>
                                 <div class="col-12 col-lg-7 col-xl-5">
                                     <div class="topic_ordersum">@if(Session::get('lang') == 'th') สรุปรายการสินค้า @else ORDER SUMMARY @endif</div>  
                                     <div class="ordersum_border">
                                         <div class="row">
                                             <div class="col-6 nopad"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') พลังงานทั้งหมด @else Total Calories @endif</span></div>
                                             <div class="col-6 nopad text-right order_calories">{{number_format($all_calories, 0, '.', ',')}}</div>
                                         </div>
                                     </div> 
                                     <div class="ordersum_border">
                                         <div class="row">
                                             <div class="col-6 nopad txt_bold"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') รหัสโปรโมชัน @else Promo Code @endif</span></div>
                                             <div class="col-6 nopad text-right txt_bold promocode_name">@if(Session::get('promocode_name') != ''){{ Session::get('promocode_name') }}@else{{ '-' }}@endif</div>
                                         </div>
                                         <div class="row">
                                            <div class="col-6 nopad txt_bold"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') โปรโมชัน @else Promotion @endif</span></div>
                                            <div class="col-6 nopad text-right txt_bold promotion_2_type_before">{{(!empty(Session::get('promotion'))) ? Session::get('promotion') : '-'}}</div>
                                        </div>
                                         <div class="row">
                                             <div class="col-6 nopad"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') ส่วนลด @else DISCOUNT @endif</span></div>
                                             <div class="col-6 nopad text-right"><!-- -10%(305) --><span class="order_discount">{{number_format(Session::get('promocode_frontend_discount'), 2, '.', ',')}}</span> <span class="txt_grey">@if(Session::get('lang') == 'th') บาท @else THB @endif</span></div>
                                         </div>
                                         <div class="row">
                                             <div class="col-6 nopad"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') ค่าจัดส่ง @else SHIPPING @endif</span></div>
                                             <div class="col-6 nopad text-right"><span class="txt_grey txt_calculate">@if(Session::get('lang') == 'th') คำนวณขั้นตอนถัดไป @else Calculated at next step @endif</span></div>
                                         </div>
                                         <div class="row">
                                             <div class="col-6 nopad txt_bold"><span class="topic2_ordersum">@if(Session::get('lang') == 'th') ยอดรวมสุทธิ @else SUBTOTAL @endif</span></div>
                                             <div class="col-6 nopad text-right txt_bold"><span id="order_sub_total" class="order_sub_total">{{number_format($sub_total, 2, '.', ',')}}</span> @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
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
                                             <div class="col-6 nopad text-right"><span class="cart_point">{{floor($sub_total / 100)}}</span> @if(Session::get('lang') == 'th') คะแนน @else POINTS @endif</div>
                                         </div> 
                                         <div class="row">
                                             <div class="col-6 nopad"><span class="topic2_ordersum txt_pink"><img src="{{asset('files/frontend/images/icon_eatfit_king.svg')}}" class="icon_kingpink" alt=""> @if(Session::get('lang') == 'th') คะแนนสะสม @else your points @endif</span></div>
                                             <div class="col-6 nopad text-right txt_pink"><span class="txt_pink cart_point">{{floor($sub_total / 100)}}</span> @if(Session::get('lang') == 'th') คะแนน @else POINTS @endif</div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                          <div class="cart_boxborder_btn">
                              <div class="row">
                                  <div class="col-12 col-lg-5 col-xl-7"></div>
                                  <div class="col-12 col-lg-7 col-xl-5">
                                      <div class="row box_btncart_a">
                                          <div class="col-7 col-sm-6">
                                               <a href="{{url('index')}}" class="btn_default btn_brown">@if(Session::get('lang') == 'th') เลือกสินค้าต่อ @else CONTINUE SHOPPING @endif</a>
                                          </div>
                                          <div class="col-5 col-sm-6">
                                              <a href="javascript:checkout_123();" class="btn_default btn_green">@if(Session::get('lang') == 'th') ดำเนินการสั่งซื้อ @else check out @endif</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                         
                     </div>
		        </div>
		    </div>
		</section>
		
		@include('frontend.layouts.inc_footer')
		@include('frontend.layouts.scriptjs')
		
	</div>
    <script>
        function minus_(raw_id) {
            //alert('abc');
            var qty = $("#qty_" + raw_id).val();

            if(qty > 1) {
                qty--;
                $.post('<?php echo url('ajaxUpdateCart');?>', { qty: qty, raw_id: raw_id, "_token": "{{ csrf_token() }}" }, function(data) {
                    $("#qty_" + raw_id).val(qty);

                    var data_split = data.split('!@#$%^&*())_+');

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
                    $(".promotion_by_product").html(data_split[12]);

                    $('.owl-recentproduct').owlCarousel({
                        loop: false,
                        margin: 0,
                        autoplay: false,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: true,
                        smartSpeed: 1000,
                        nav: true,
                        dots: false,
                        navText: ['&nbsp;', '&nbsp;'],
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 2
                            },
                            1000: {
                                items: 4
                            }
                        }
                    });
                });
            }
        }

        function plus_(raw_id) {
            //alert('def');
            var qty = $("#qty_" + raw_id).val();

            qty++;

            $.post('<?php echo url('ajaxUpdateCart');?>', { qty: qty, raw_id: raw_id, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#qty_" + raw_id).val(qty);

                var data_split = data.split('!@#$%^&*())_+');

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
                $(".promotion_by_product").html(data_split[12]);     

                $('.owl-recentproduct').owlCarousel({
                    loop: false,
                    margin: 0,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: false,
                    navText: ['&nbsp;', '&nbsp;'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                });        
            });
        }

        function deleteCart(raw_id) {
            if(confirm('Confirm Delete') == true) {
                $.post('<?php echo url('ajaxDeleteCart');?>', { raw_id: raw_id, "_token": "{{ csrf_token() }}" }, function(data) {

                    var data_split = data.split('!@#$%^&*())_+');

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
                    $(".promotion_by_product").html(data_split[12]);    

                    $('.owl-recentproduct').owlCarousel({
                        loop: false,
                        margin: 0,
                        autoplay: false,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: true,
                        smartSpeed: 1000,
                        nav: true,
                        dots: false,
                        navText: ['&nbsp;', '&nbsp;'],
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 2
                            },
                            1000: {
                                items: 4
                            }
                        }
                    });       
                });
            }
        }

        function checkout_123() {
            $.post('<?php echo url("ajaxCheckLogin");?>', { "_token": "{{ csrf_token() }}" }, function(data) {
                window.location.href = data;
            });
        }

        function checkPromocode() {
            //alert($("#promocode_frontend").val());
            if($("#promocode_frontend").val() == '') {
                alert("Please enter Promocode");
            } else {
                $.post('{{ url("/ajaxPromoCodeFrontend") }}', { promocode_frontend: $("#promocode_frontend").val(), "_token": "{{ csrf_token() }}" }, function(data) {
                    var data_split = data.split('!@#$%^&*())_+');

                    if(data_split[11] == '') {
                        alert('This coupon code is invalid or has expired.');
                        $("#promocode_frontend").val('');
                    } else {
                        alert('Thank You For Your Redeem');
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
                    $(".promotion_by_product").html(data_split[12]);

                    $('.owl-recentproduct').owlCarousel({
                        loop: false,
                        margin: 0,
                        autoplay: false,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: true,
                        smartSpeed: 1000,
                        nav: true,
                        dots: false,
                        navText: ['&nbsp;', '&nbsp;'],
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 2
                            },
                            1000: {
                                items: 4
                            }
                        }
                    });
                });
            }
        }

        function setWish(products_id) {
            $.post('{{ url("/ajaxWishList") }}', { products_id: products_id, "_token": "{{ csrf_token() }}" }, function(data) {
                alert(data);
            });
        }
    </script>
</body>

</html>
