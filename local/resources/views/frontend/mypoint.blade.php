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
                    <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a>
                    <span><i class="fas fa-chevron-right"></i></span>
                    <a href="{{url('/myprofile')}}">@if(Session::get('lang') == 'th') สมาชิก @else Member @endif</a> <span><i class="fas fa-chevron-right"></i></span>
                    <div>@if(Session::get('lang') == 'th') คะแนนสะสมของฉัน @else My Point @endif</div>
                </div>
            </div>
        </section>

        <section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')

                    <div class="col-12 col-lg-8 wrap_memberorder">
                        <div class="topicbar_member">@if(Session::get('lang') == 'th') คะแนนสะสมของฉัน @else My Point @endif</div>

                        <div class="txt_point1">@if(Session::get('lang') == 'th') การรับคะแนนสะสม @else Earn points @endif</div>
                        <div class="mypoint_yourpoint">
                            <div>@if(Session::get('lang') == 'th') ซื้อทุก 100 บาท @else Buy 100 thb @endif </div>
                            <div class="point_iconarrow"><img src="{{asset('/files/frontend/images/arrow_white.svg')}}" alt=""></div>
                            <div>@if(Session::get('lang') == 'th') รับ 1 คะแนน @else get 1 point ! @endif</div>

                            <div class="box_yourpoint">
                                <div class="icon_point_c"><img src="{{asset('/files/frontend/images/icon_point.svg')}}" class="svg" alt=""></div>
                                <div class="numpoint_c">{{($member->member_point != '') ? $member->member_point : '0'}}</div>
                                <div class="t_mpoint">@if(Session::get('lang') == 'th') คะแนนสะสม @else My Point @endif</div>
                            </div>
                        </div>
                        <div class="box_pointinfo">
                            <div class="topic_pointinfo">@if(Session::get('lang') == 'th') เงื่อนไขการรับคะแนนสะสม @else Conditions for earning points @endif</div>
                            <ul>
@if(!empty($point_text))
    @foreach($point_text as $r)
                                <li>
                                    {{(Session::get('lang') == 'th') ? $r->point_text_name_th : $r->point_text_name_en}}
                                </li>
    @endforeach
@endif
                                <!-- <li>
                                    20 points get Free delivery within 150 bht.
                                </li>
                                <li>
                                    30 points get 200 bht. voucher.
                                </li> -->
                            </ul>
                        </div>
@php
$check_redeem = false;
@endphp
@foreach(ShoppingCart::all() as $r)
    @if($r->redeem_point == 'Redeem Point') 
        @php
        $check_redeem = true;
        @endphp
    @endif
@endforeach
                        <div class="topbar_rewards">@if(Session::get('lang') == 'th') ของรางวัล eatfit @else EATFIT Rewards @endif</div>
                        <span id="redeem_already">
    @if(!empty($pointRedeem))
        @foreach($pointRedeem as $r)
            @if($r->point_redeem_new_type == 'Product')
                @php
                $product = DB::table('products')
                    ->where('products.products_id', '=', $r->point_redeem_new_product_id)
                    ->first();
                @endphp

                @if(!empty($product))
                        <div>
                            <div class="cart_itemproduct">
                                <div class="row">
                                    <div class="col-3 col-md-2 cart_mbnopad">
                                        <a href="{{url('product_page/'.$product->menu_head_pk.'/'.$product->products_id)}}"><img
                                                src="{{asset($r->point_redeem_new_image)}}"
                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="col-9 col-md-6">
                                        <div class="cart_pname">{{(Session::get('lang') == 'th') ? $product->name_products_thai : $product->name_products_eng}}</div>
                                        <div class="txt_redeempoint">Redeem {{$r->point_redeem_new_point}} @if(Session::get('lang') == 'th') คะแนน @else points @endif</div>
                                    </div>
                                    <div class="col-9 offset-3 col-md-4 offset-md-0">
                                        <a href="" id="{{$product->products_id}}-{{$r->point_redeem_new_id}}" class="btnredeem btnreview btn_product @if($point < $r->point_redeem_new_point or $check_redeem == true){{'disabled'}}@endif">@if(Session::get('lang') == 'th') แลกคะแนน @else redeem @endif</a>
                    @if($point < $r->point_redeem_new_point)
                                        <div class="noti_unsuccesspoint">@if(Session::get('lang') == 'th') ขออภัย คะแนนสะสมของคุณไม่เพียงพอ @else Sorry, your points not enough. @endif</div>
                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
            @elseif($r->point_redeem_new_type == 'Minimum Price')
                @php
                $minimum_product = DB::table('products')
                    ->where('price_sale', '<=', $r->point_redeem_new_minimum_price)
                    ->orWhere('price', '<=', $r->point_redeem_new_minimum_price)
                    ->get();
                @endphp
                @if(!empty($minimum_product))
                    @foreach($minimum_product as $mp)
                        @php
                        $product = DB::table('products')
                            ->where('products.products_id', '=', $mp->products_id)
                            ->first();
                        @endphp
                        <div>
                            <div class="cart_itemproduct">
                                <div class="row">
                                    <div class="col-3 col-md-2 cart_mbnopad">
                                        <a href="{{url('product_page/'.$mp->menu_head_pk.'/'.$mp->products_id)}}"><img
                                                src="{{asset($product->img_products)}}"
                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="col-9 col-md-6">
                                        <div class="cart_pname">{{(Session::get('lang') == 'th') ? $mp->name_products_thai : $mp->name_products_eng}}</div>
                                        <div class="txt_redeempoint">@if(Session::get('lang') == 'th') แลกคะแนน @else Redeem @endif {{$r->point_redeem_new_point}} @if(Session::get('lang') == 'th') คะแนน @else points @endif</div>
                                    </div>
                                    <div class="col-9 offset-3 col-md-4 offset-md-0">
                                        <a href="" id="{{$mp->products_id}}-{{$r->point_redeem_new_id}}" class="btnredeem btnreview btn_product @if($point < $r->point_redeem_new_point or $check_redeem == true){{'disabled'}}@endif">@if(Session::get('lang') == 'th') แลกคะแนน @else redeem @endif</a>
                        @if($point < $r->point_redeem_new_point)
                                        <div class="noti_unsuccesspoint">@if(Session::get('lang') == 'th') ขออภัย คะแนนสะสมของคุณไม่เพียงพอ @else Sorry, your points not enough. @endif</div>
                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @elseif($r->point_redeem_new_type == 'Free Shipping')
                        <div>
                            <div class="cart_itemproduct">
                                <div class="row">
                                    <div class="col-3 col-md-2 cart_mbnopad">
                                        <a href="javascript:void(0);"><img
                                                src="{{asset($r->point_redeem_new_image)}}"
                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="col-9 col-md-6">
                                        <div class="cart_pname">@if(Session::get('lang') == 'th') ค่าจัดส่งฟรี @else Free Shipping @endif</div>
                                        <div class="txt_redeempoint">Redeem {{$r->point_redeem_new_point}} @if(Session::get('lang') == 'th') คะแนน @else points @endif</div>
                                    </div>
                                    <div class="col-9 offset-3 col-md-4 offset-md-0">
                                        <a href="" id="{{$r->point_redeem_new_id}}" class="btnredeem btnreview btn_free_shipping @if($point < $r->point_redeem_new_point or $check_redeem == true){{'disabled'}}@endif">@if(Session::get('lang') == 'th') แลกคะแนน @else redeem @endif</a>
                        @if($point < $r->point_redeem_new_point)
                                        <div class="noti_unsuccesspoint">@if(Session::get('lang') == 'th') ขออภัย คะแนนสะสมของคุณไม่เพียงพอ @else Sorry, your points not enough. @endif</div>
                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
            @elseif($r->point_redeem_new_type == 'Discount')
                        <div>
                            <div class="cart_itemproduct">
                                <div class="row">
                                    <div class="col-3 col-md-2 cart_mbnopad">
                                        <a href="javascript:void(0);"><img
                                                src="{{asset($r->point_redeem_new_image)}}"
                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="col-9 col-md-6">
                                        <div class="cart_pname">@if(Session::get('lang') == 'th') ส่วนลด @else Discount @endif {{$r->point_redeem_new_discount}} {{$r->point_redeem_new_discount_type}}</div>
                                        <div class="txt_redeempoint">@if(Session::get('lang') == 'th') แลกคะแนน @else Redeem @endif {{$r->point_redeem_new_point}} points</div>
                                    </div>
                                    <div class="col-9 offset-3 col-md-4 offset-md-0">
                                        <a href="" id="{{$r->point_redeem_new_id}}" class="btnredeem btnreview btn_discount @if($point < $r->point_redeem_new_point or $check_redeem == true){{'disabled'}}@endif">@if(Session::get('lang') == 'th') แลกคะแนน @else redeem @endif</a>
                        @if($point < $r->point_redeem_new_point)
                                        <div class="noti_unsuccesspoint">@if(Session::get('lang') == 'th') ขออภัย คะแนนสะสมของคุณไม่เพียงพอ @else Sorry, your points not enough. @endif</div>
                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
            @endif            
        @endforeach
    @endif  
                        </span>             
                    </div>
                </div>
            </div>
        </section>



        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')

        <script>
            $(".menu_account_left > ul > li:nth-child(5) > a").addClass("here");
        </script>

        <style>
            a.disabled {
                pointer-events: none;
                cursor: default;
            }
        </style>

    </div>
</body>

</html>
