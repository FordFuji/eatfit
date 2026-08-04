<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-186735076-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-186735076-1');
</script>

<div class="row topbar_green">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-6 col-lg-9">
                <div class="wrap_topbar">
                    <div class="box_topbar topbar_hidemb"><img src="{{asset('/files/frontend/images/icon_call.svg')}}"
                            alt=""> <span>call us</span> 091 666 0998</div>
                    <div class="box_topbar topbar_hidemb"><a href="mailto:sales@gourmetprimo.com"
                            target="_blank"><img src="{{asset('/files/frontend/images/icon_mail.svg')}}" alt="">
                            sales@gourmetprimo.com</a></div>
                    <div class="box_topbar"><a href="https://www.gourmetprimo.com/" target="_blank"><i
                                class="fas fa-globe"></i> visit gourmet primo</a></div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3 text-right">
                <div class="social_top">
                    <a href="https://www.facebook.com/eatfit.th" target="_blank">
                        <img src="{{asset('/files/frontend/images/icon_fb_white.svg')}}" alt="">
                    </a>
                    <a href="https://www.instagram.com/eatfit.th/" target="_blank">
                        <img src="{{asset('/files/frontend/images/icon_ig_white.svg')}}" alt="">
                    </a>
                    <a href="https://line.me/R/ti/p/@eatfit.th" target="_blank">
                        <img src="{{asset('/files/frontend/images/icon_line_white.svg')}}" alt="">
                    </a>
                </div>
                <div class="topbar_lang">
                    <a href="{{url()->current().'?lang=th'}}">TH</a> <span>|</span> <a
                        href="{{url()->current().'?lang=en'}}">EN</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row wrap_menu">
    <div class="container">
        <div class="row">
            <div class="col-4 col-lg-5">
                <div class="wrap_btn_menu">
                    <div class="btn_menu"><i class="fas fa-bars"></i></div>
                </div>
                <div class="mainmenu menuleft">
                    <ul>
                        <li class="logo_menuopen">
                            <div class="close_menu"><i class="far fa-times-circle"></i> Close</div>
                        </li>
                        <li class="hassub"><a>{{(Session::get('lang') == 'th') ? 'เมนู' : 'MENUS'}}</a>
                            <ul class="submenu">
                                {{-- <li><a href="{{url('/product')}}">Weight Control</a>
                        </li>
                        <li><a href="{{url('/product')}}">High-Protein</a></li>
                        <li><a href="{{url('/product')}}">Healthy Drinks</a></li>
                        <li><a href="{{url('/product')}}">Healthy Snacks</a></li> --}}
                        @foreach (\App\Menu_product_head::all() as $menu_product)
                        <li>
                            <a href="{{url('/product/'.$menu_product->menu_product_head_id)}}">
                                @if(Session::get('lang') == 'th')
                                {{$menu_product->name_head_menu_thai}}
                                @else
                                {{$menu_product->name_head_menu_eng}}
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    </li>
                      <li><a href="{{url('/#eatfitpackage')}}">{{(Session::get('lang') == 'th') ? 'eatfit PACKAGES' : 'eatfit PACKAGES'}}</a></li>
                    <li><a href="{{url('/blog')}}">{{(Session::get('lang') == 'th') ? 'บทความ' : 'BLOG'}}</a></li>
                    <li><a href="{{url('/contact')}}">{{(Session::get('lang') == 'th') ? 'ติดต่อเรา' : 'CONTACT'}}</a></li>
                    <!-- <li><a href="">Get a free meal</a></li> -->
                    <li class="hassub m_faqs"><a>@if(Session::get('lang') == 'th') ปัญหาที่พบบ่อย @else FAQS @endif</a>
                        <ul class="submenu">
                            <li><a href="{{ url('faqsAW/2') }}">About Eatfit</a></li>
                            <li><a href="{{ url('faqsAW/5') }}">Orders</a></li>
                            <li><a href="{{ url('faqsAW/6') }}">Payments</a></li>
                            <li><a href="{{ url('faqsAW/4') }}">Shipping & Delivery</a></li>
                            <li><a href="{{ url('faqsAW/8') }}">Packing & Recycling</a></li>
                            <li><a href="{{ url('faqsAW/7') }}">Dietary And Nutritional</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="col-4 col-lg-2 logo">
                <a href="{{url('/')}}">
                    <img src="{{asset('/files/frontend/images/logo.svg')}}" alt="">
                </a>
            </div>
            <div class="col-4 col-lg-5">
                <div class="topbar_right">
                    <div class="mainmenu menuright">
                        <ul>
{{-- @if(Session::get('member_id') != '')
    @php
    $login_inc_top = DB::table('lv_member')
        ->where('member_id', '=', Session::get('member_id'))
        ->first();
    @endphp
                            <li class="hide_mb">
                                <a href="{{url('myprofile')}}" class="btn_login">
                                    <div class="circle_icon icon_login">
                                        <img src="{{asset('/files/frontend/images/icon_user.svg')}}" alt="">
                                    </div>
                                    {{substr(@$login_inc_top->member_name.' '.@$login_inc_top->member_family, 0, 15).'...'}}
                                </a> /
                                <a href="{{url('/logout')}}" class="btn_login">@if(Session::get('lang') == 'th') ออกจากระบบ @else Logout @endif</a>
                            </li>
@else
                            <li class="hide_mb">
                                <a data-fancybox data-src="#hidden-content" href="javascript:;" class="btn_login">
                                    <div class="circle_icon icon_login">
                                        <img src="{{asset('/files/frontend/images/icon_user.svg')}}" alt="">
                                    </div> {{(Session::get('lang') == 'th') ? 'เข้าสู่ระบบ' : 'Login'}}
                                </a> /
                                <a href="{{url('/register')}}" class="btn_login">{{(Session::get('lang') == 'th') ? 'ลงทะเบียน' : 'Sign up'}}</a>
                            </li>
@endif

                            <li class="menu_account_mb hassub">
                                <a>
                                    <div class="circle_icon icon_login"><img
                                            src="{{asset('/files/frontend/images/icon_user.svg')}}" alt=""></div>
                                    <div class="txt_mb_signin">Sign in</div>
                                </a>
                                @if(Session::get('member_id') != '')
                                @php
                                $login_inc_top = DB::table('lv_member')
                                ->where('member_id', '=', Session::get('member_id'))
                                ->first();
                                @endphp
                                <ul class="submenu mlogin">
                                    <li><a
                                            href="{{url('myprofile')}}">{{substr(@$login_inc_top->member_name.' '.@$login_inc_top->member_family, 0, 15).'...'}}</a>
                                    </li>
                                    <li>
                                        <a href="{{url('myprofile')}}" class="icon_menudropdown m_iconuser">
                                            <div>
                                                <img src="{{asset('/files/frontend/images/icon_user_menu.svg')}}" alt=""
                                                    class="svg">
                                            </div> My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('member_shippingaddress')}}" class="icon_menudropdown m_iconshipping">
                                            <div>
                                                <img src="{{asset('/files/frontend/images/icon_shipping.svg')}}" alt="" class="svg">
                                            </div> Shipping & Billing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('mywishlist')}}" class="icon_menudropdown m_wishlist">
                                            <div>
                                                <img src="{{asset('/files/frontend/images/heart-regular.svg')}}" alt="" class="svg">
                                            </div> My Wish List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{('myorder')}}" class="icon_menudropdown m_iconbasket">
                                            <div>
                                                <img src="{{asset('/files/frontend/images/icon_basket.svg')}}" alt="" class="svg">
                                            </div> My Order
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{('mypoint')}}" class="icon_menudropdown m_iconpoint">
                                            <div>
                                                <img src="{{asset('/files/frontend/images/icon_point.svg')}}" alt="" class="svg">
                                            </div> My Point
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{('myreviews')}}" class="icon_menudropdown m_iconstar">
                                            <div><i class="far fa-star"></i></div> Review
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{('changepassword')}}" class="icon_menudropdown m_iconlock">
                                            <div>
                                                <img src="{{asset('/files/frontend/images/icon_lock.svg')}}" alt="" class="svg">
                                            </div> Change Password
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="" class="icon_menudropdown m_iconlogout">
                                            <div>
                                                <img src="{{asset('/files/frontend/images/icon_logout.svg')}}" alt="" class="svg">
                                            </div> Sign Out
                                        </a>
                                    </li> -->
                                    <li><a href="{{url('/logout')}}">@if(Session::get('lang') == 'th') ออกจากระบบ @else Logout @endif</a></li>
                                </ul>
                                @else
                                <ul class="submenu mlogin">
                                    <li><a data-fancybox data-src="#hidden-content" href="javascript:;">Login</a></li>
                                    <li><a href="{{url('/register')}}">Sign up</a></li>
                                </ul>
                                @endif
                                <div style="display: none;" id="hidden-content">
                                    <div class="menulogin_topic">{{(Session::get('lang') == 'th') ? 'ลงชื่อเข้าใช้' : 'Log in to eatfit'}}</div>
                                    <div class="box_menulogin">
                                        <div class="box_cartlogin">
                                            <div>
                                                <a href="{{url('login/facebook')}}" class="btn_default100 btn_facebook">
                                                    <i class="fab fa-facebook-square"></i> @if(Session::get('lang') == 'th') เข้าสู่ระบบด้วย @else Sign in with @endif
                                                    <span>Facebook</span>
                                                </a>
                                            </div>
                                            <div class="txt_or">@if(Session::get('lang') == 'th') หรือ @else or @endif</div>
                                            <div class="form_cartlogin">
                                                <form action="{{url('loginFrontend')}}">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label><span>*</span> {{(Session::get('lang') == 'th') ? 'อีเมล' : 'Email Address'}}</label>
                                                                <input type="email" class="form-control form-control-lg"
                                                                    id="email_inc" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label><span>*</span> {{(Session::get('lang') == 'th') ? 'รหัสผ่าน' : 'Password'}}</label>
                                                                <input type="password"
                                                                    class="form-control form-control-lg"
                                                                    id="password_inc" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group form-check">
                                                                
                                                                    <a href=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <a href="{{url('/forgotpassword')}}"
                                                                class="link_forgot">{{(Session::get('lang') == 'th') ? 'ลืมรหัสผ่าน' : 'Forgot Password?'}}</a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <a href="javascript:loginInc();" class="btn_default100 btn_green">{{(Session::get('lang') == 'th') ? 'เข้าสู่ระบบ' : 'SIGN IN'}}</a>
                                                <div class="cartlogin_btnregis">
                                                    <span>@if(Session::get('lang') == 'th') เป็นสมาชิกกับทาง อีทฟิต @else New to eatfit? @endif</span> <br>
                                                    <a href="{{url('/register')}}"
                                                        class="btn_default100 btn_yellow">{{(Session::get('lang') == 'th') ? 'สร้างบัญชี หรือ ลงทะเบียน' : 'CREATE AN ACCOUNT'}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}



                    <!-- <li class="hassub">
                                <a class="btn_login m_username">
                                    <div class="circle_icon icon_login">
                                        <img src="{{asset('/files/frontend/images/icon_user.svg')}}" alt="">
                    </div>
                    <span class="txt_username">userna...</span>
                    </a>
                    <ul class="submenu mlogin">
                        <li>
                            <a href="myprofile.php" class="icon_menudropdown m_iconuser">
                                <div>
                                    <img src="{{asset('/files/frontend/images/icon_user_menu.svg')}}" alt=""
                                        class="svg">
                                </div> My Profile
                            </a>
                        </li>
                        <li>
                            <a href="member_shippingaddress.php" class="icon_menudropdown m_iconshipping">
                                <div>
                                    <img src="{{asset('/files/frontend/images/icon_shipping.svg')}}" alt="" class="svg">
                                </div> Shipping & Billing
                            </a>
                        </li>
                        <li>
                            <a href="mywishlist.php" class="icon_menudropdown m_wishlist">
                                <div>
                                    <img src="{{asset('/files/frontend/images/heart-regular.svg')}}" alt="" class="svg">
                                </div> My Wish List
                            </a>
                        </li>
                        <li>
                            <a href="myorder.php" class="icon_menudropdown m_iconbasket">
                                <div>
                                    <img src="{{asset('/files/frontend/images/icon_basket.svg')}}" alt="" class="svg">
                                </div> My Order
                            </a>
                        </li>
                        <li>
                            <a href="" class="icon_menudropdown m_iconpoint">
                                <div>
                                    <img src="{{asset('/files/frontend/images/icon_point.svg')}}" alt="" class="svg">
                                </div> My Point
                            </a>
                        </li>
                        <li>
                            <a href="myreviews.php" class="icon_menudropdown m_iconstar">
                                <div><i class="far fa-star"></i></div> Review
                            </a>
                        </li>
                        <li>
                            <a href="changepassword.php" class="icon_menudropdown m_iconlock">
                                <div>
                                    <img src="{{asset('/files/frontend/images/icon_lock.svg')}}" alt="" class="svg">
                                </div> Change Password
                            </a>
                        </li>
                        <li>
                            <a href="" class="icon_menudropdown m_iconlogout">
                                <div>
                                    <img src="{{asset('/files/frontend/images/icon_logout.svg')}}" alt="" class="svg">
                                </div> Sign Out
                            </a>
                        </li>
                    </ul>
                    </li> -->


                    <li class="hassub">
                        {{-- <a class="btn_login">
                            <div class="circle_icon icon_cart"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""></div>
                            <span>{{(Session::get('lang') == 'th') ? 'ตระกร้าสินค้า' : 'Cart'}}</span>
                            @php
                            $i = 0;
                            $qty = 0;
                            @endphp
                            @foreach(ShoppingCart::all() as $r_inc)
                            @php
                            $qty += $r_inc->qty;
                            $i++;
                            @endphp
                            @endforeach
                            <div class="numcart"><span>(</span><span class="order_qty">{{$qty}}</span><span>)</span></div>
                        </a>
                         --}}
                        <div class="cartbox submenu">
                            <div class="wrap_opencart">
                                <div class="topic-cartshow">@if(Session::get('lang') == 'th') ตระกร้าสินค้าของฉัน @else Your Cart @endif</div>
                                <div class="close_boxcart"><i class="fas fa-times"></i></div>
                            </div>

                            <div class="cart_boxitem cart_basket">
                                @php
                                $sub_total = 0;
                                $all_calories = 0;
                                @endphp
                                @foreach(ShoppingCart::all() as $r_inc)
                                @php
                                    if($r_inc->redeem_point != 'Redeem Point') {
                                        $sub_total += ($r_inc->price * $r_inc->qty);
                                        $all_calories += $r_inc->calories * $r_inc->qty;
                                    }
                                @endphp
                                <div class="row box_cartshowlist">
                                    <div class="col-3 photo_cart">
                                        <a href="{{url('/product-page/'.$r_inc->id)}}">
                                            <img src="{{asset($r_inc->image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="col-7 nopad">
                                        <div class="desc_cartshow">
                                            <div class="cartshow_pname">{{$r_inc->name}}</div>
                                            <div>@if(Session::get('lang') == 'th') พลังงาน @else Calories @endif {{$r_inc->calories}}</div>
                                @if($r_inc->redeem_point != 'Redeem Point')
                                            <div class="cartshow_price">{{$r_inc->qty}} x
                                                {{number_format($r_inc->price, 2, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button class="cart_del"
                                            onclick="deleteCartInc('<?php echo $r_inc->__raw_id;?>');"><i
                                                class="fas fa-times-circle"></i></button>
                                    </div>
                                </div>
                                @endforeach

                                @if(Session::get('giftset_id') != 0)
                                    @php
                                    $giftset = DB::table('lv_giftset')->where('giftset_id', '=', Session::get('giftset_id'))->first();
                                    @endphp

                                    <div class="row box_cartshowlist">
                                        <div class="col-3 photo_cart">
                                            <a href="#">
                                                <img src="{{ asset($giftset->giftset_image) }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="col-7 nopad">
                                            <div class="desc_cartshow">
                                                <div class="cartshow_pname">{{ $giftset->giftset_name }}</div>
                                                <div><?php //if(Session::get('lang') == 'th') echo 'พลังงาน'; else echo 'Calories';?> <?php //echo $r_inc->calories;?></div>                      
                                                <div class="cartshow_price">{{ '1 x 0.00' }} @if(Session::get('lang') == 'th'){{ 'บาท' }}@else {{ 'THB' }}@endif</div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            {{-- <button class="cart_del" onclick="deleteCartInc('<?php echo $r_inc->__raw_id;?>');"><i class="fas fa-times-circle"></i></button> --}}
                                        </div>
                                    </div>
                                @endif
                                <!-- 
                                        <div class="row box_cartshowlist">
                                            <div class="col-3 photo_cart">
                                                <a href="product-page.php">
                                                    <img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="col-7 nopad">
                                                <div class="desc_cartshow">
                                                    <div class="cartshow_pname">Choize - Chocolate</div>
                                                    <div>Calories 200</div>
                                                    <div class="cartshow_price">65.00 THB</div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button class="cart_del"><i class="fas fa-times-circle"></i></button>
                                            </div>
                                        </div>
                                        <div class="row box_cartshowlist">
                                            <div class="col-3 photo_cart">
                                                <a href="product-page.php">
                                                    <img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="col-7 nopad">
                                                <div class="desc_cartshow">
                                                    <div class="cartshow_pname">Choize - Chocolate</div>
                                                    <div>Calories 200</div>
                                                    <div class="cartshow_price">65.00 THB</div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button class="cart_del"><i class="fas fa-times-circle"></i></button>
                                            </div>
                                        </div>
                                        -->
                            </div>
                            <div class="cartshow_totalcal">
                                <div class="row">
                                    <div class="col-6">@if(Session::get('lang') == 'th') พลังงานทั้งหมด @else Total Calories @endif</div>
                                    <div class="col-6 text-right order_calories">{{$all_calories}}</div>
                                </div>
                            </div>
                            <div class="cartshow_totalprice">
                                <div class="row">
                                    <div class="col-6">@if(Session::get('lang') == 'th') ยอดรวม @else Total @endif</div>
                                    <div class="col-6 text-right"><span
                                            class="order_sub_total">{{number_format($sub_total, 2, '.', ',')}}</span>
                                            @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                </div>
                            </div>
                            <div class="cartshow_boxbtn">
                                <div class="row row_cartshow_boxbtn">
                                    <div class="col-6 col_cartshow_boxbtn">
                                        <a href="{{url('cart')}}" class="btn_default btn_grey">
                                            @if(Session::get('lang') == 'th')
                                                ดูตระกร้าสินค้า
                                            @else
                                                view Cart
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-6 col_cartshow_boxbtn">
                                        <a href="javascript:checkLogin();" class="btn_default btn_green">@if(Session::get('lang') == 'th')
                                            ดำเนินการสั่งซื้อ
                                        @else
                                        check out
                                        @endif</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@php
$text_home = DB::table('lv_text_home')
            ->orderBy('text_home_id', 'asc')
            ->get();
@endphp
@if(!empty($text_home)) 
<div class="topbarmenu_pink">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <marquee direction="scroll">
@if(!empty($text_home))
    @foreach($text_home as $r)
            <div class="textmarquee">{{ Session::get('lang') == 'th' ? $r->text_home_th : $r->text_home_en }}</div>
    @endforeach
@endif
            </marquee>
            </div>
        </div>
    </div>
</div>
@endif
</div>
<script>
    function deleteCartInc(raw_id) {
        if (confirm('Confirm Delete') == true) {
            $.post('<?php echo url("ajaxDeleteCart");?>',
                {
                    raw_id: raw_id,
                    "_token": "{{ csrf_token() }}"
                },
                function (data) {
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
                }
            );
        }
    }

    function isEmailInc(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function loginInc() {
        if ($("#email_inc").val() == '') {
            alert('Please enter Email');

            $("#email_inc").focus();
        } else if (!isEmailInc($("#email_inc").val())) {
            alert('Invalid Email');

            $("#email_inc").val('');
            $("#email_inc").focus();
        } else if ($("#password_inc").val() == '') {
            alert('Please enter Password');

            $("#password_inc").focus();
        } else {
            $.post('<?php echo url("checkLoginInc");?>', {
                email_inc: $("#email_inc").val(),
                password_inc: $("#password_inc").val(),
                "_token": "{{ csrf_token() }}"
            }, function (data) {
                if (data == '0') {
                    alert('Email Or Password Incorrect');

                    $("#email_inc").val('');
                    $("#password_inc").val('');

                    $("#email_inc").focus();
                } else {
                    data_split = data.split('-');
                    window.location.href = '<?php echo url("");?>/' + data_split[1];

                    //window.location.href = '<?php echo Session::get("current_url");?>';
                }
            });
        }
    }

    function checkLogin() {
        $.post('<?php echo url("ajaxCheckMemberSession");?>', { "_token": "{{ csrf_token() }}" }, function(data) {
            if(data == 'true') {
                window.location.href = '<?php echo url("cart");?>';
            } else {
                //alert('Please Login');

                window.location.href = '<?php echo url("cart_login");?>';
            }
        });
    }

</script>

<!-- 
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v9.0&appId=2872963483029649&autoLogAppEvents=1" nonce="IDL0uo4e"></script> -->

<script type="text/javascript">
    /*var token = "";
    var userId = "";

    window.fbAsyncInit = function(){
        FB.init({
            // ใส่่ App ID
            appId: '2872963483029649',
            status: false,
            cookie: false,
            xfbml: true
        });
        FB.Event.subscribe('auth.authResponseChange',function(response){
            console.log(response);
            //Logout-unauthen
            if(response.authResponse == null | response.status == "unknow"){
                return;
            }
            token = response.authResponse.accessToken;
            userId = response.authResponse.userID;
            if(response.status === 'connected'){

            }else if(response.status === 'not_authorized'){
                FB.login(function() { scope: 'pubile_actions'});
            }else{
                FB.login(function() { scope: 'pubile_actions'});
            }
        });
    };
    // Load the SDK asynchronously
    (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if(d.getElementById(id)){
            //console.log(7);
            return;
        }
        js = d.createElement('script');
        js.id = id; js.async = true;
        js.src = "https://connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));

    var loginProfile = {};
    
    // เรียกใช้ function fbLogin ตรงคลิกลิงก์
    function fbLogin(){
        FB.login(function(response){
            if(response.authResponse){
                access_token = response.authResponse.accessToken;
                user_id = response.authResponse.user_ID;
                FB.api('/me', { locale: 'en_US', fields: 'name, email, gender,locale,picture' },
                    function(response){
                    console.log('EMAIL : '+response.email);
                    console.log(response);
                    var id      = response.id;
                    var name    = response.name;
                    var email   = response.email;
                    var gender  = response.gender;
                    var locale  = response.locale;
                    var picture = response.picture['data']['url'];
                    
                    // ใช้เป็น ajax
                    $.ajaxSetup({
                        async: true
                    });
                     
                    $.ajax('<?php echo url("ajaxLoginFacebook");?>', {
                        type: 'POST',
                        data: {
                            'id'            : id,
                            'name'          : name,
                            'email'         : email,
                            "_token": "{{ csrf_token() }}"
                            //'gender'        : gender,
                            //'locale'        : locale,
                            //'picture'       : picture
                        },
                        dataType: 'html',
                        success: function(data) {
                            window.location.href = '<?php echo url('index');?>';
                        }
                    });
                    // End ใช้เป็น ajax
                });
            }else{

            }
        },{
            scope: 'public_profile, email'
        }); 
    }*/
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '200917868367677');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=200917868367677&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->