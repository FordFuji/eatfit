<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu ">

        <div class="pcoded-navigation-label">eatfit by Gourmet Primo</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backend')}}">
                    <span class="pcoded-micon"><i class="icon-present"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Home</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backend/text_home')}}">
                    <span class="pcoded-micon"><i class="icon-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" style="font-size: 12px;">Text (Background Color Pink)</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backend/video_youtube')}}">
                    <span class="pcoded-micon"><i class="icon-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Video Youtube</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        {{-- <div class="pcoded-navigation-label">Member</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backend/member')}}">
                    <span class="pcoded-micon"><i class="icon-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Member</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul> --}}
        <div class="pcoded-navigation-label">ABOUT US</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backabout')}}">
                    <span class="pcoded-micon"><i class="icon-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">About</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded">
                <a href="{{url('/backbanner')}}">
                    <span class="pcoded-micon"><i class="icon-magic-wand"></i><b>D</b></span>
                    <span class="pcoded-mtext">Banner</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded">
                <a href="{{url('/backend/banner_promotion')}}">
                    <span class="pcoded-micon"><i class="icon-magic-wand"></i></span>
                    <span class="pcoded-mtext">Banner Promotion</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu ">
                    <a href="javascript:void(0)" >
                        <span class="pcoded-micon"><i class="icon-tag"></i><b>D</b></span>
                        <span class="pcoded-mtext">Product</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{url('menu')}}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Plan</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('products')}}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Menu</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('backend/package')}}">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Package</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <li class="pcoded">
                <a href="{{url('/backblog')}}">
                    <span class="pcoded-micon"><i class="icon-trophy"></i><b>D</b></span>
                    <span class="pcoded-mtext">blog</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded">
                <a href="{{url('/backcontact')}}">
                    <span class="pcoded-micon"><i class="icon-bubbles"></i><b>D</b></span>
                    <span class="pcoded-mtext">Contact</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!-- <li class="pcoded">
                <a href="{{url('/backend/pick_your_plan')}}">
                {{-- <a href="javascript:void(0)"> --}}
                    <span class="pcoded-micon"><i class="icon-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Pick Your Plan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> -->
        </ul>
        <div class="pcoded-navigation-label">SHOPPING ONLINE</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backquestionHelp')}}">
                    <span class="pcoded-micon"><i class="icon-question"></i><b>D</b></span>
                    <span class="pcoded-mtext">Question</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        {{-- <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backreview')}}">
                    <span class="pcoded-micon"><i class="icon-star"></i><b>D</b></span>
                    <span class="pcoded-mtext">Review</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul> --}}
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backend/review_admin')}}">
                    <span class="pcoded-micon"><i class="icon-star"></i><b>D</b></span>
                    <span class="pcoded-mtext">Review(Admin)</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        {{-- <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backbank')}}">
                    <span class="pcoded-micon"><i class="icon-credit-card"></i><b>D</b></span>
                    <span class="pcoded-mtext">Bank</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" >
                    <span class="pcoded-micon"><i class="icon-tag"></i><b>D</b></span>
                    <span class="pcoded-mtext">Promotion</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="pcoded">
                        <a href="{{url('/backend/promocode')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Promocode</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="pcoded">
                        <a href="{{url('/backend/promotion_text')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Promocode Text</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="pcoded">
                        <a href="{{url('/backend/promotion_complete')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Complete purchase promotion</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="pcoded">
                        <a href="{{url('/backend/buy_1_get_1_free')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Buy 1 Get 1 Free</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="pcoded">
                        <a href="{{url('/backend/promotion_day')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Promotion Day</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="pcoded">
                        <a href="{{url('/backend/giftset')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Giftset</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="pcoded">
                        <a href="{{url('/backend/promotion_by_product')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Promotion By Product</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" >
                    <span class="pcoded-micon"><i class="icon-tag"></i><b>D</b></span>
                    <span class="pcoded-mtext">Point</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="pcoded">
                        <a href="{{url('backend/point_text')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Point Text</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="pcoded">
                        <a href="{{url('backend/point_redeem')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Point Redeem</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul> --}}
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backend/instagram')}}">
                    <span class="pcoded-micon"><i class="icon-tag"></i><b>D</b></span>
                    <span class="pcoded-mtext">Instagram</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        {{-- <div class="pcoded-navigation-label">SHOPPING CART</div>
@php
$order_detail_view = DB::table('lv_order_detail')
    ->where('order_detail_view', '=', 'No')
    ->orWhere('order_detail_view', '=', '')
    ->first();
@endphp
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backend/order')}}">
                    <span class="pcoded-micon"><i class="icon-basket"></i></span>
                    <span class="pcoded-mtext">Order{!!(!empty($order_detail_view)) ? '<i class="fa fa-bell-o" style="color: red;"></i>' : '' !!}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
@php
$payment_view = DB::table('lv_payment')
    ->where('payment_view', '=', 'No')
    ->orWhere('payment_view', '=', '')
    ->first();

@endphp
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/backend/payment')}}">
                    <span class="pcoded-micon"><i class="icon-credit-card"></i></span>
                    <span class="pcoded-mtext">Payment {!!(!empty($payment_view)) ? '<i class="fa fa-bell-o" style="color: red;"></i>' : '' !!}</i></span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded">
                <a href="{{url('/Price')}}">
                    <span class="pcoded-micon"><i class="icon-tag"></i><b>D</b></span>
                    <span class="pcoded-mtext">Price</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" >
                    <span class="pcoded-micon"><i class="icon-doc"></i><b>D</b></span>
                    <span class="pcoded-mtext">Receipt</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{url('/Receipt')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Field Latex</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{url('/ReceiptCL')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Cup Lump</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded">
                <a href="{{url('/Report')}}">
                    <span class="pcoded-micon"><i class="icon-printer"></i><b>D</b></span>
                    <span class="pcoded-mtext">Report</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul> --}}
    </div>
</nav>