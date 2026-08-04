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
                    <div>@if(Session::get('lang') == 'th') รายการโปรดของฉัน @else My Wish List @endif</div>
                </div>
            </div>
        </section>

        <section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')

                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member">@if(Session::get('lang') == 'th') รายการโปรดของฉัน @else My wish list @endif</div>
                        <div class="row wrap_wishlist">
                            @foreach ($memberlist as $rproducts)
                            <div class="col-6 col-md-4 item_best_mb">
                                
                                <div class="item_productsbest">
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
                                        @endif">
                                        <div>-{{$rproducts->percent}}%</div>
                                    </div>
                                    @endif

                                    <div class="box_addwishlist ">
                                        @if(Session::get('member_id') != '')
                            @php
                            $login_inc_top = DB::table('lv_member')
                            ->where('member_id', '=', Session::get('member_id'))
                            ->first();
                            @endphp
                                        <button class="{{$rproducts->wish_id  && ($rproducts->wish_member == Session::get('member_id'))  != '' ? 'active' : ''}}"
                                            value="{{$rproducts->products_id}}" id="show_{{$rproducts->products_id}}"
                                            onclick="show_(this.value)">
                                            {{-- <input type="checkbox"  value="{{$item->address_id}}"id="show_{{$item->address_id}}"
                                            onclick="show_(this.value)"
                                            {{$item->address_shipping == 1 ? 'checked' : ''}}/> --}}
                                            <img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg"
                                                alt="">
                                        </button>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="product_photosquare_best">
                                            <div class="bestsell_addcart">
                                                <div class="box_bestsell_addcart">
                                                    <a href="{{url('product_page/'.$rproducts->menu_head_pk.'/'.$rproducts->products_id)}}" class="hover_btn_viewproduct" title="More Detail"><img
                                                            src="{{asset('/files/frontend/images/icon_search.svg')}}"
                                                            alt=""></a>
                                                    <a href="" class="hover_btn_addcart btn_addcart" id="{{$rproducts->products_id}}"
                                                        title="Add to Cart"><img
                                                            src="{{asset('/files/frontend/images/icon_cart.svg')}}"
                                                            alt=""></a>
                                                </div>
                                            </div>

                                            <figure><img src="{{url($rproducts->img_products)}}"
                                                    alt=""></figure>

                                        </div>
                                        <div class="item_productbest">
                                            @if(App::isLocale('th'))
                                            {{$rproducts->name_products_thai}}
                                            @else
                                            {{$rproducts->name_products_eng}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="item_productbest_price item_productprice">
                                        @if($rproducts->price == null)
                                Price : <span>฿{{$rproducts->price_full}}</span>
                                <div>฿{{$rproducts->price_sale}}</div>
                                @else
                                <div>฿{{$rproducts->price}}</div>
                                @endif
                                    </div>
                                </div>
                                <div class="bestsell_addcart_mb">
                                    <div class="box_bestsell_addcart_mb">
                                        <a href="{{url('product_page/'.$rproducts->menu_head_pk.'/'.$rproducts->products_id)}}"
                                            class="hover_btn_viewproduct" title="More Detail"><img
                                                src="{{asset('/files/frontend/images/icon_search.svg')}}" alt=""></a>
                                        <a href="" class="hover_btn_addcart btn_addcart" title="Add to Cart"
                                            id="{{$rproducts->products_id}}"><img
                                                src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- @foreach ($memberlist as $key => $item)
                                {{$item->products_id}}
                        @endforeach --}}

                    </div>
                </div>
            </div>
    </div>
    </section>



    @include('frontend.layouts.inc_footer')
    @include('frontend.layouts.scriptjs')

    <script>
        $(".menu_account_left > ul > li:nth-child(3) > a").addClass("here");

    </script>

    </div>

    <script>
        function show_(id) {

            // alert(id);
            var one = 0;
            if ($('#show_' + id).hasClass("active")) {
                alert("ลบ");
                one = 0;
                // $(this).removeClass('active')
                $('#show_' + id).removeClass("active")


                // $(#show_' + id).removeClass("active");
            } else {
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
            window.location.reload(true);
        }

    </script>


</body>

</html>
