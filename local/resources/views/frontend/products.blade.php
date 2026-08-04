<!doctype html>
<html>

<head>
    @include('frontend.layouts.inc_head')
</head>

<body>

    <div class="container-fluid">

        @include('frontend.layouts.inc_menu')

        <section class="row">
            <div class="container">
                <div class="row wrap_navigationbar">
                    <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a>
                    <div>
                        @if(Session::get('lang') == 'th')
                        {{$menu_icon->name_head_menu_thai}}
                        @else
                        {{$menu_icon->name_head_menu_eng}}
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 wrap_bannerproduct wrap_banner">
                <div class="owl-bannerslide owl-carousel owl-theme">
                    @foreach($gallery as $keygal =>$rgallery)
                    <div class="items">
                        <div class="hg_photobanner-product">
                            <a href="#" target="_blank"><img src="{{url($rgallery->img_gallery_banner_menu_head)}}"
                                    alt=""></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="row recent_productcate">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="owl-productcate owl-carousel owl-theme">
                            <?php
                        $status = 1;
                        $color = '';
                        $color_b = '';
                        ?>
                            @foreach ($menu_sub as $key_head => $rmenu_sub)
                            <?php if ($status == 1) {
                                $color = 'btn_blue';
                                $color_b = 'box_blue';
                                $status = 2;
                            } elseif ($status == 2) {
                                $color = 'btn_green2';
                                $color_b = 'box_green';
                                $status = 3;
                            } elseif ($status == 3) {
                                $color = 'btn_brown';
                                $color_b = 'box_brown';
                                $status = 1;
                            } ?>
                            <div class="items">
                                <a href="{{url('/product/'.$rmenu_sub->menu_product_head_id)}}"
                                    class="box_productcate {{$color_b}}">
                                    <div class="row">
                                        <div class="col-3 col-sm-4 photocate_padright">
                                            <div class="photo_catesquare">
                                                <figure><img src="{{url($rmenu_sub->img_head_menu_eng)}}" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-9 col-sm-8">
                                            <div class="desc_recentcate">
                                                <div class="topic_pickplan">
                                                    @if(Session::get('lang') == 'th')
                                                    {{$rmenu_sub->name_head_menu_thai}}
                                                    @else
                                                    {{$rmenu_sub->name_head_menu_eng}}
                                                    @endif
                                                </div>
                                                <div class="desc_pickplan">
                                                    @if(Session::get('lang') == 'th')
                                                    {{$rmenu_sub->title_head_menu_thai}}
                                                    @else
                                                    {{$rmenu_sub->title_head_menu_eng}}
                                                    @endif
                                                </div>
                                                <div class="btn_default {{$color}}">@if(Session::get('lang') == 'th') ดูเมนู @else view menu @endif</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="container">
                <div class="row wrap_product wrap_bestseller wrap-content row_itemproduct">
                    <div class="col-12 col_itemproduct">
                        <div class="text-center">
                            <div class="title_topic home_title_pickplan">
                                {{(Session::get('lang') == 'th') ? $menus->name_head_menu_thai : $menus->name_head_menu_eng}}</div>
                        </div>
                        <div class="content_product">
                            @if(Session::get('lang') == 'th'){!!$menus->content_head_menu_thai!!}@else{!!$menus->content_head_menu_eng!!}@endif
                        </div>
                    </div>
                    @foreach($products as $keyproduct => $rproducts)
                    {{--                    {{dd($rproducts)}}--}}
                    <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                        <div class="item_products">
                            @if(getPercent($rproducts->price_full, $rproducts->price_sale) != 0)
                            <div class="badge_tag
                                @if($rproducts->color_percent == 1)
                                pinktag
                                @elseif($rproducts->color_percent == 2)
                                purpletag
                                @elseif($rproducts->color_percent == 3)
                                yellowtag
                                @else
                                pinktag
                                @endif

                                ">
                                <div>-{{$rproducts->percent}}%</div>
                            </div>
                            @endif
                            <div class="box_addwishlist ">
                                {{-- 
                                <input type="checkbox" value="{{$rproducts->products_id}}"
                                    id="show_{{$rproducts->products_id}}" onclick="show_(this.value)" {{$rproducts->wish_id != '' ? 'checked' : ''}}/> --}}
                                    @if(Session::get('member_id') != '')
                                @php
                                $login_inc_top = DB::table('lv_member')
                                ->where('member_id', '=', Session::get('member_id'))
                                ->first();
                                @endphp
                                    <button 
                                    class="{{$rproducts->wish_id && ($rproducts->wish_member == Session::get('member_id'))  != '' ? 'active' : ''}}"
                                        value="{{$rproducts->products_id}}" id="show_{{$rproducts->products_id}}"
                                        onclick="show_(this.value)">
                                        <img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt="">
                                    </button>
                                    @endif
                                
                            </div>
                            <a href="{{url('/product_page/'.$rproducts->menu_head_pk.'/'.$rproducts->products_id)}}">
                                <div class="product_photosquare">
                                    <figure><img src="{{url($rproducts->img_products)}}" alt="">
                                    </figure>
                                </div>
                                <div class="item_productname">
                                    @if(Session::get('lang') == 'th')
                                    {{$rproducts->name_products_thai}}
                                    @else
                                    {{$rproducts->name_products_eng}}
                                    @endif
                                </div>
                            </a>
                            <div class="item_productprice">
                                @if(Session::get('lang') == 'th')
                                    @if($rproducts->price == null)
                                    Price : <span>{{$rproducts->price_full}} บาท</span>
                                    <div>{{$rproducts->price_sale}} บาท</div>
                                    @else
                                    <div>{{$rproducts->price}} บาท</div>
                                    @endif
                                @else
                                    @if($rproducts->price == null)
                                    Price : <span>฿{{$rproducts->price_full}}</span>
                                    <div>฿{{$rproducts->price_sale}}</div>
                                    @else
                                    <div>฿{{$rproducts->price}}</div>
                                    @endif
                                @endif
                            </div>
                            <div class="wrap_addcart">
                                {{-- <a href="" id="{{$rproducts->products_id}}"
                                    class="btn_default btn_green btn_addcart"><img
                                        src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> @if(Session::get('lang') == 'th') เพิ่มใส่ตระกร้า @else Add to Cart @endif </a>
                                <a href="https://line.me/R/ti/p/@eatfit.th" target="_blank" id="{{$rproducts->products_id}}" class="btn_default btn_green btn_addcart"><img src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> @if(Session::get('lang') == 'th') เพิ่มใส่ตระกร้า @else Add to Cart @endif </a> --}}
                                <a href="https://line.me/R/ti/p/@eatfit.th" target="_blank" id="{{$rproducts->products_id}}" class="btn_default btn_green btn_addcart"><img src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> @if(Session::get('lang') == 'th') สั่งซื้อตอนนี้ @else Order Now @endif </a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </section>

        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')

    </div>
    <script>
        function show_(id) {
            
            // alert(id);
            var one = 0;
            if($('#show_' + id).hasClass("active")) { 
                alert("ลบ");
                one = 0; 
                // $(this).removeClass('active')
                $('#show_' + id).removeClass( "active" )
                // $(#show_' + id).removeClass("active");
            }else{
                alert("เพิ่ม");
                // $( "p" ).addClass( "myClass yourClass" );
                one = 1;
                $('#show_' + id).addClass("active");
              
            }
            // if ($('#show_' + id).is('active')) {
            //     one = 1;
            //     $("p").css("background-color", "yellow");
            // } else {
            //     one = 0;
            // }
            $.ajax({
                url: "{{url('/mywish')}}",
                type: 'get',
                dataType: "json",
                data: {
                    id: id,
                    one: one
                },
                success: function () {
                    // alert('สวัสดี');
                }
            });
            // if ( Session::get('member_id') == '') {
            //     window.location.href = "{{url('/')}}";
            // }
            window.location.reload(true);
        }

    </script>

</body>

</html>
