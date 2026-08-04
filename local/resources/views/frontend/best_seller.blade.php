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
                <a href="index.php"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a>
                <div>@if(Session::get('lang') == 'th') สินค้าขายดี @else Best Sellers @endif</div>
            </div>

            <div class="row wrap_bestseller wrap-content row_itemproduct">
                <div class="col-12 col_itemproduct">
                    <div class="text-center inside_toptitle">
                        <div class="title_topic">@if(Session::get('lang') == 'th') สินค้าขายดี @else Best Sellers @endif</div>
                    </div>
                </div>

@if(!empty($best_seller))
    @foreach($best_seller as $r)
                <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                    <div class="item_products">
                        @if(getPercent($r->price_full, $r->price_sale) != 0)<div class="badge_tag pinktag">
                            <div>-getPercent($r->price_full, $r->price_sale)%</div>
                        </div>@endif
                        <div class="box_addwishlist">
                            <button><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button>
                        </div>
                        <a href="{{url('product_page/'.$r->menu_head_pk.'/'.$r->products_id)}}">
                            <div class="product_photosquare">
                                <figure><img src="{{asset($r->img_products)}}" alt=""></figure>
                            </div>
                            <div class="item_productname">{{Session::get('lang') == 'th' ? $r->name_products_thai : $r->name_products_eng }}</div>
                        </a>
                        <div class="item_productprice">
                            @if(Session::get('lang') == 'th')
                                ราคา : <span>
                                @if($r->price_full != null and $r->price_sale != null)<span>{{number_format($r->price_sale, 0, '.', ',')}} บาท</span>
                                <div>{{number_format($r->price_full, 0, '.', ',')}} บาท</div>
                                @else<div>{{number_format($r->price, 0, '.', ',')}} บาท</div>
                                @endif
                            @else
                            Price : <span>
                                @if($r->price_full != null and $r->price_sale != null)<span>฿{{number_format($r->price_sale, 0, '.', ',')}}</span>
                                <div>฿{{number_format($r->price_full, 0, '.', ',')}}</div>
                                @else<div>฿{{number_format($r->price, 0, '.', ',')}}</div>
                                @endif
                            @endif
                        </div>
                        <div class="wrap_addcart">
                            <a href="" class="btn_default btn_green btn_addcart" id="{{$r->products_id}}"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> @if(Session::get('lang') == 'th') เพิ่มใส่ตระกร้า @else Add to Cart @endif</a>
                        </div>
                    </div>
                </div>
    @endforeach
@endif
                <!-- 
                <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                    <div class="item_products">
                        <div class="badge_tag pinktag">
                            <div>-15%</div>
                        </div>
                        <div class="box_addwishlist">
                            <button><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button>
                        </div>
                        <a href="product-page.php">
                            <div class="product_photosquare">
                                <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt=""></figure>
                            </div>
                            <div class="item_productname">Spaghetti whole wheat with dry chili and basil</div>
                        </a>
                        <div class="item_productprice">Price : <span>฿139</span>
                            <div>฿119</div>
                        </div>
                        <div class="wrap_addcart">
                            <a href="#" class="btn_default btn_green btn_addcart"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                    <div class="item_products">
                        <div class="badge_tag pinktag">
                            <div>-15%</div>
                        </div>
                        <div class="box_addwishlist">
                            <button><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button>
                        </div>
                        <a href="product-page.php">
                            <div class="product_photosquare">
                                <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt=""></figure>
                            </div>
                            <div class="item_productname">Spaghetti whole wheat with dry chili and basil</div>
                        </a>
                        <div class="item_productprice">Price : <span>฿139</span>
                            <div>฿119</div>
                        </div>
                        <div class="wrap_addcart">
                            <a href="#" class="btn_default btn_green btn_addcart"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                    <div class="item_products">
                        <div class="badge_tag pinktag">
                            <div>-15%</div>
                        </div>
                        <div class="box_addwishlist">
                            <button><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button>
                        </div>
                        <a href="product-page.php">
                            <div class="product_photosquare">
                                <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt=""></figure>
                            </div>
                            <div class="item_productname">Spaghetti whole wheat with dry chili and basil</div>
                        </a>
                        <div class="item_productprice">Price : <span>฿139</span>
                            <div>฿119</div>
                        </div>
                        <div class="wrap_addcart">
                            <a href="#" class="btn_default btn_green btn_addcart"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                    <div class="item_products">
                        <div class="badge_tag pinktag">
                            <div>-15%</div>
                        </div>
                        <div class="box_addwishlist">
                            <button><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button>
                        </div>
                        <a href="product-page.php">
                            <div class="product_photosquare">
                                <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt=""></figure>
                            </div>
                            <div class="item_productname">Spaghetti whole wheat with dry chili and basil</div>
                        </a>
                        <div class="item_productprice">Price : <span>฿139</span>
                            <div>฿119</div>
                        </div>
                        <div class="wrap_addcart">
                            <a href="#" class="btn_default btn_green btn_addcart"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                    <div class="item_products">
                        <div class="badge_tag pinktag">
                            <div>-15%</div>
                        </div>
                        <div class="box_addwishlist">
                            <button><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button>
                        </div>
                        <a href="product-page.php">
                            <div class="product_photosquare">
                                <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt=""></figure>
                            </div>
                            <div class="item_productname">Spaghetti whole wheat with dry chili and basil</div>
                        </a>
                        <div class="item_productprice">Price : <span>฿139</span>
                            <div>฿119</div>
                        </div>
                        <div class="wrap_addcart">
                            <a href="#" class="btn_default btn_green btn_addcart"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                    <div class="item_products">
                        <div class="badge_tag pinktag">
                            <div>-15%</div>
                        </div>
                        <div class="box_addwishlist">
                            <button><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button>
                        </div>
                        <a href="product-page.php">
                            <div class="product_photosquare">
                                <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt=""></figure>
                            </div>
                            <div class="item_productname">Spaghetti whole wheat with dry chili and basil</div>
                        </a>
                        <div class="item_productprice">Price : <span>฿139</span>
                            <div>฿119</div>
                        </div>
                        <div class="wrap_addcart">
                            <a href="#" class="btn_default btn_green btn_addcart"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                    <div class="item_products">
                        <div class="badge_tag pinktag">
                            <div>-15%</div>
                        </div>
                        <div class="box_addwishlist">
                            <button><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button>
                        </div>
                        <a href="product-page.php">
                            <div class="product_photosquare">
                                <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt=""></figure>
                            </div>
                            <div class="item_productname">Spaghetti whole wheat with dry chili and basil</div>
                        </a>
                        <div class="item_productprice">Price : <span>฿139</span>
                            <div>฿119</div>
                        </div>
                        <div class="wrap_addcart">
                            <a href="#" class="btn_default btn_green btn_addcart"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col_itemproduct">
                    <div class="item_products">
                        <div class="badge_tag pinktag">
                            <div>-15%</div>
                        </div>
                        <div class="box_addwishlist">
                            <button><img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt=""></button>
                        </div>
                        <a href="product-page.php">
                            <div class="product_photosquare">
                                <figure><img src="{{asset('/files/frontend/images/photoproduct_03.jpg')}}" alt=""></figure>
                            </div>
                            <div class="item_productname">Spaghetti whole wheat with dry chili and basil</div>
                        </a>
                        <div class="item_productprice">Price : <span>฿139</span>
                            <div>฿119</div>
                        </div>
                        <div class="wrap_addcart">
                            <a href="#" class="btn_default btn_green btn_addcart"><img
                                    src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to Cart</a>
                        </div>
                    </div>
                </div> -->
                {{ $best_seller->links() }}
            </div>
        </div>
    </section>

    @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')

</div>


</body>

</html>
