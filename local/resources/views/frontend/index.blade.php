<!doctype html>
<html>

<head>
    @include('frontend.layouts.inc_head')
</head>

<body>

    <div class="container-fluid">

        @include('frontend.layouts.inc_menu')


        <section class="row">
            <div class="col-12 wrap_banner banner_desktop">
                <div class="owl-bannerslide owl-carousel owl-theme">
                    @foreach ($banner as $item)
                    <div class="items">
                       <a href="{{ $item->banner_link }}"><div class="hg_photobanner">@if(Session::get('lang') == 'th')<img src="{{url('local/public/'.$item->banner_image)}}" alt="">@elseif(Session::get('lang') == 'en')<img src="{{url('local/public/'.$item->banner_image_en)}}" alt="">@endif
                        </div></a> 
                        <div class="caption_banner">
                            {{-- <div class="topicbanner1">
                                {{ $item->banner_title_en }}
                                @if(Session::get('lang') == 'th')
                                {{ $item->banner_title_th }}
                                @else
                                {{ $item->banner_title_en }}
                                @endif
                            </div> --}}
                            <div class="topicbanner2">ๅ/-
                                {{-- {{ $item->banner_topic_en }} --}}
                                @if(Session::get('lang') == 'th')
                                {{ $item->banner_topic_th }}
                                @else
                                {{ $item->banner_topic_en }}
                                @endif
                            </div>
                            <div class="desc_banner">
                                {{-- {!! $item->banner_content_th !!} --}}
                                @if(Session::get('lang') == 'th')
                                {{ $item->banner_content_th }}
                                @else
                                {{ $item->banner_content_en }}
                                @endif
                            </div>
                            <a href="{{ $item->banner_link }}" target="_blank" class="btn_default btn_green">
                                {{-- order now --}}
                                @if(Session::get('lang') == 'th')
                                สั่งอาหาร
                                @else
                                order now
                                @endif
                                <img src="{{asset('/files/frontend/images/dinner.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="col-12 wrap_banner banner_mb">
				<div class="owl-bannerslide owl-carousel owl-theme">
                    @foreach ($banner as $item)
                    <div class="items">
                        <a href="{{ $item->banner_link }}"><div class="hg_photobanner">@if(Session::get('lang') == 'th')<img src="{{url('local/public/'.$item->banner_image_mobile)}}" alt="">@elseif(Session::get('lang') == 'en')<img src="{{url('local/public/'.$item->banner_image_mobile_en)}}" alt="">@endif</div></a>
                    </div>
                    @endforeach
				</div>
			</div>
        </section>

        <section class="row wrap_home_bestseller">
        <div class="container">
            <div class="row row_best_mb">
                <div class="col-12">
                    <!--                      <div class="topic_bestsell">our products</div>-->
                    <div class="text-center">
                        <div class="title_topic">{{(Session::get('lang') == 'th') ? 'เมนูที่ใช่ ใครๆก็ชอบ' : 'Our Best Sellers'}}</div>
                    </div>
                </div>
                @if(!empty($bestSeller))
                @foreach($bestSeller as $r)
                <div class="col-6 col-md-4 col-lg-3 item_best_mb">
                    <div class="item_productsbest">
                        @if(getPercent($r->price_full, $r->price_sale) != 0)<div class="badge_tag yellowtag">
                            <div>-{{getPercent($r->price_full, $r->price_sale)}}%</div>
                        </div>@endif
                        <div class="box_addwishlist">
                            @if(Session::get('member_id') != '')
                            @php
                            $login_inc_top = DB::table('lv_member')
                            ->where('member_id', '=', Session::get('member_id'))
                            ->first();
                            @endphp
                            <button
                                class="{{$r->wish_id && ($r->wish_member == Session::get('member_id')) != '' ? 'active' : ''}}"
                                value="{{$r->products_id}}" id="show_{{$r->products_id}}" onclick="show_(this.value)">
                                <img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt="">
                            </button>
                            @endif
                        </div>
                        <div>
                            <div class="product_photosquare_best">
                                <div class="bestsell_addcart">
                                    <div class="box_bestsell_addcart">
                                        <a href="{{url('product_page/'.$r->menu_head_pk.'/'.$r->products_id)}}"
                                            class="hover_btn_viewproduct" title="More Detail"><img
                                                src="{{asset('/files/frontend/images/icon_search.svg')}}" alt=""></a>
                                        {{-- <a href="" class="hover_btn_addcart btn_addcart" title="Add to Cart" id="{{$r->products_id}}"><img src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""></a> --}}
                                        <a href="https://line.me/R/ti/p/@eatfit.th" target="_blank" class="hover_btn_addcart" title="Add to Cart" id="{{$r->products_id}}"><img src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""></a>
                                    </div>
                                </div>
                                <figure><img src="{{asset($r->img_products)}}" alt=""></figure>
                            </div>
                            <div class="item_productbest">
                                {{Session::get('lang') == 'th' ? $r->name_products_thai : $r->name_products_eng}}</div>
                        </div>
                        <div class="item_productbest_price item_productprice">
                            @if(Session::get('lang') == 'th')
                                ราคา : @if($r->price_full != '' and
                                $r->price_sale != '')<span>{{number_format($r->price_sale, 0, '.', ',')}} บาท</span>
                                <div>{{number_format($r->price_full, 0, '.', ',')}} บาท</div>@else<div>
                                {{number_format($r->price, 0, '.', ',')}} บาท</div>@endif
                            @else 
                                Price : @if($r->price_full != '' and
                                $r->price_sale != '')<span>฿{{number_format($r->price_sale, 0, '.', ',')}}</span>
                                <div>฿{{number_format($r->price_full, 0, '.', ',')}}</div>@else<div>
                                ฿{{number_format($r->price, 0, '.', ',')}}</div>@endif
                            @endif
                        </div>
                        <div class="bestsell_addcart_mb">
                            <div class="box_bestsell_addcart_mb">
                                <a href="{{url('product_page/'.$r->menu_head_pk.'/'.$r->products_id)}}"
                                    class="hover_btn_viewproduct" title="More Detail"><img
                                        src="{{asset('/files/frontend/images/icon_search.svg')}}" alt=""></a>
                                {{-- <a href="" class="hover_btn_addcart btn_addcart" title="Add to Cart"
                                    id="{{$r->products_id}}"><img
                                        src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

                <div class="col-12 text-center">
                    <a href="{{url('best_seller')}}" class="btn_default_small btn_green">@if(Session::get('lang') == 'th') ดูทั้งหมด @else view all @endif</a>
                </div>
            </div>
        </div>
    </section>

    <section class="row wrap_pickyourplan">
        <div class="container">
            <div class="row row_item_pickplan">
                <div class="col-12 item_pickplan">
                    <div class="text-center">
                        <div class="title_topic home_title_pickplan">{{(Session::get('lang') == 'th') ? 'หลากหลายเมนูให้คุณเลือกสรร' : 'Explore our menu'}}</div>
                    </div>
                    <div class="owl-pickplan owl-carousel owl-theme">
                        @if(!empty($pickYourPlan))
                        @foreach($pickYourPlan as $r)
                        <div class="items">
                            <div class="item_pickplan">
                                <a href="{{url('product/'.$r->menu_product_head_id)}}" class="link_pickplan">
                                    <div class="photo_pickyourplan">
                                        <figure><img src="{{asset($r->img_head_menu_eng)}}" alt=""></figure>
                                    </div>
                                    <div class="box_pickyourplan">
                                        <div class="topic_pickplan">@if(Session::get('lang') ==
                                            'th'){!!$r->name_head_menu_thai!!}@elseif(Session::get('lang') ==
                                            'en'){!!$r->name_head_menu_eng!!}@endif</div>
                                        <div class="desc_pickplan">@if(Session::get('lang') ==
                                            'th'){!!$r->content_head_menu_thai!!}@elseif(Session::get('lang') ==
                                            'en'){!!$r->content_head_menu_eng!!}@endif</div>
                                        <div class="btn_default btn_pink">@if(Session::get('lang') == 'th') ดูเมนู @else view menu @endif</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="row wrap_slimfast" id="eatfitpackage">
        <div class="container">
            <div class="row item_slimfast_row">
                <div class="col-12 item_slimfast">
                    <div class="text-center">
                        <div class="title_topic">{!!(Session::get('lang') == 'th') ? 'สุขภาพดีอย่างต่อเนื่องกับ อีทฟิต แพ็กเกจ' : '<span>eatfit</span> Packages'!!}</div>
                    </div>
                    <div class="topic_slimfast">{{(Session::get('lang') == 'th') ? 'ข้อเสนอสุดคุ้ม แพ็กเกจที่ใช่สำหรับคุณ' : 'Need better deals? Select a plan that works best for you'}}</div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 item_slimfast">
                    <a href="{{url('pickyourplan/3')}}" class="link_slimfast">
                        <div class="topic_day_slimfast slimfast_3day">7 @if(Session::get('lang') == 'th') วัน @else Days @endif</div>
                        <div class="box_border_slimfast">
                            <div class="photo_slimfast">
                                <figure><img src="{{asset($package_price->package_price3_image)}}" alt=""></figure>
                            </div>
                            <div class="desc_slimfast_mb">
                                <div class="title_slimfast">
                                    {{(Session::get('lang') == 'th') ? $package_price->package_price3_name_th : $package_price->package_price3_name_en}}
                                </div>
                                <!--                                <div class="desc_slimfast">(the package also includes snack and juice)</div>-->
                            </div>
                            <div class="boxprice_slimfast">
                                <div>7 @if(Session::get('lang') == 'th') วัน @else Days @endif / <span>{{number_format($package_price_3_day, 0, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</span>
                                </div>
                                <div class="slimfast_iconlist"><img
                                        src="{{asset('/files/frontend/images/icon_list.svg')}}" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 item_slimfast">
                    <a href="{{url('pickyourplan/5')}}" class="link_slimfast">
                        <div class="topic_day_slimfast slimfast_7day">14 @if(Session::get('lang') == 'th') วัน @else Days @endif</div>
                        <div class="box_border_slimfast">
                            <div class="photo_slimfast">
                                <figure><img src="{{asset($package_price->package_price5_image)}}" alt=""></figure>
                            </div>
                            <div class="desc_slimfast_mb">
                                <div class="title_slimfast">
                                    {{(Session::get('lang') == 'th') ? $package_price->package_price5_name_th : $package_price->package_price5_name_en}}
                                </div>
                                <!--                                <div class="desc_slimfast">(the package also includes snack and juice)</div>-->
                            </div>
                            <div class="boxprice_slimfast">
                                <div>14 @if(Session::get('lang') == 'th') วัน @else Days @endif / <span>{{number_format($package_price_5_day, 0, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</span>
                                </div>
                                <div class="slimfast_iconlist"><img
                                        src="{{asset('/files/frontend/images/icon_list.svg')}}" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 item_slimfast">
                    <a href="{{url('pickyourplan/7')}}" class="link_slimfast">
                        <div class="topic_day_slimfast slimfast_10day">1 @if(Session::get('lang') == 'th') เดือน @else Month @endif</div>
                        <div class="box_border_slimfast">
                            <div class="photo_slimfast">
                                <figure><img src="{{asset($package_price->package_price7_image)}}" alt=""></figure>
                            </div>
                            <div class="desc_slimfast_mb">
                                <div class="title_slimfast">
                                    {{(Session::get('lang') == 'th') ? $package_price->package_price7_name_th : $package_price->package_price7_name_en}}
                                </div>
                                <!-- <div class="desc_slimfast">
                                +     แพ็คเกจ 90 มื้อ จัดส่ง 9 ครั้ง (คิดค่าส่ง 3 ครั้ง) <br>
+     สามารถเลือกทานเมนูใดก็ได้ <br> (เลือกเมนูแซลมอนได้เพียง 40 เมนูในแพ็คเกจ)
                                </div> -->
                            </div>
                            <div class="boxprice_slimfast">
                                <div>1  @if(Session::get('lang') == 'th') เดือน @else Month @endif / <span>{{number_format($package_price_7_day, 0, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</span>
                                </div>
                                <div class="slimfast_iconlist"><img
                                        src="{{asset('/files/frontend/images/icon_list.svg')}}" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="row wrap_vdohome">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- <div class="text-center topic_vdopresent">
                        <div class="title_topic">{!!(Session::get('lang') == 'th') ? 'video present' : 'video present'!!}</div>
                    </div> -->
                </div>
                <div class="col-12 col-lg-7">
                    <div class="bg_vdohome">
                        <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ !empty($video_youtube) ? $video_youtube->video_youtube_embed : '' }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5"> 
                    <div class="desc_vdohome">
                        <div class="txt_vdo1">{{ (!empty($video_youtube) and Session::get('lang') == 'th') ? $video_youtube->video_youtube_topic_th : '' }} {{ (!empty($video_youtube) and Session::get('lang') == 'en') ? $video_youtube->video_youtube_topic_en : '' }}<br> {{ (!empty($video_youtube) and Session::get('lang') == 'th') ? $video_youtube->video_youtube_topic2_th : '' }} {{ (!empty($video_youtube) and Session::get('lang') == 'en') ? $video_youtube->video_youtube_topic2_en : '' }}</div>
                        <div class="txt_vdo2">{{ (!empty($video_youtube) and Session::get('lang') == 'th') ? $video_youtube->video_youtube_detail_th : '' }} {{ (!empty($video_youtube) and Session::get('lang') == 'en') ? $video_youtube->video_youtube_detail_en : '' }}</div>
                    </div>
                </div>
            </div>
        </div>                        
    </section>

        <!-- <section class="row">
            <div class="col-12 nopad">
                <div class="home_bannerpoint">
                    @if(!empty($banner_promotion) and $banner_promotion->banner_promotion_enable == 'Enable')
                    <div class="bannerpoint_desktop"><img src="{{asset($banner_promotion->banner_promotion_image_pc)}}"
                            alt=""></div>
                    <div class="bannerpoint_mobile"><img
                            src="{{asset($banner_promotion->banner_promotion_image_mobile)}}" alt=""></div>
                    @endif
                </div>
            </div>
        </section> -->

        <section class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12 wrap_promotion">
                        <div class="text-center">
                            <div class="title_topic home_title_promotions">
                                @if(Session::get('lang') == 'th')
                                โปรโมชัน
                                @else
                                Promotion
                                @endif    
                            </div>
                        </div>
                        <div class="owl-promotion owl-carousel owl-theme">
                            @php
                            $i = 0;
                            @endphp
                            @if(!empty($promotions))
                            @foreach($promotions as $r)
                                @php
                                $i++;
                                @endphp
                            <div class="items">
                                <div class="item_products">
                                    @if(getPercent($r->price_full, $r->price_sale) != 0)<div
                                        class="badge_tag @if($i % 3 == 0) pinktag @elseif($i % 3 == 1) purpletag @elseif($i % 3 == 2) yellowtag @endif">
                                        <div>-{{getPercent($r->price_full, $r->price_sale)}}%</div>
                                    </div>@endif
                                    <div class="box_addwishlist">
                                        @if(Session::get('member_id') != '')
                                        @php
                                        $login_inc_top = DB::table('lv_member')
                                        ->where('member_id', '=', Session::get('member_id'))
                                        ->first();
                                        @endphp
                                        <button
                                            class="active"
                                            value="{{$r->products_id}}" id="show_{{$r->products_id}}"
                                            onclick="show_(this.value)">
                                            <img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg"
                                                alt="">
                                        </button>
                                        @endif
                                    </div>
                                    <a href="{{url('product_page/'.$r->menu_head_pk.'/'.$r->products_id)}}">
                                        <div class="product_photosquare">
                                            <figure><img src="{{asset($r->img_products)}}" alt=""></figure>
                                        </div>
                                        <div class="item_productname">
                                            {{Session::get('lang') == 'th' ? $r->name_products_thai : $r->name_products_eng}}
                                        </div>
                                    </a>
                                    <div class="item_productprice">Price : @if(getPercent($r->price_full,
                                        $r->price_sale) != 0)<span>฿{{$r->price_full}}</span>
                                        <div>฿{{$r->price_sale}}</div>@else<div>฿{{$r->price}}</div>@endif
                                    </div>
                                    <div class="wrap_addcart">
                                        <a href="" class="btn_default btn_green btn_addcart" id="{{$r->products_id}}">
                                            <img src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> Add to
                                            Cart</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                            @php
                            $buy_1_sale_1 = DB::table('lv_buy_1_get_1_free')
                                ->join('products', 'lv_buy_1_get_1_free.product_id', '=', 'products.products_id')
                                ->get();
                            @endphp

                            @if(!empty($buy_1_sale_1))
                                @foreach($buy_1_sale_1 as $r)
                            <div class="items">
                                <div class="item_products"><div
                                        class="badge_tag @if($i % 3 == 0) pinktag @elseif($i % 3 == 1) purpletag @elseif($i % 3 == 2) yellowtag @endif">
                                        <div style="font-size: 12px;">
                                            @if(Session::get('lang') == 'th')
                                            ซื้อ 1 แถม 1
                                            @else 
                                            BUY 1<br>GET 1    
                                            @endif
                                        </div>
                                    </div>
                                    <div class="box_addwishlist">
                                        @if(Session::get('member_id') != '')
                                        @php
                                        $login_inc_top = DB::table('lv_member')
                                        ->where('member_id', '=', Session::get('member_id'))
                                        ->first();
                                        @endphp
                                        <button
                                            class="active"
                                            value="{{$r->products_id}}" id="show_{{$r->products_id}}"
                                            onclick="show_(this.value)">
                                            <img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg"
                                                alt="">
                                        @endif
                                    </div>
                                    <a href="{{url('product_page/'.$r->menu_head_pk.'/'.$r->products_id)}}">
                                        <div class="product_photosquare">
                                            <figure><img src="{{asset($r->img_products)}}" alt=""></figure>
                                        </div>
                                        <div class="item_productname">
                                            {{Session::get('lang') == 'th' ? $r->name_products_thai : $r->name_products_eng}}
                                        </div>
                                    </a>
                                    <div class="item_productprice">@if(Session::get('lang') == 'th') ราคา @else Price @endif : 
                                        @if(Session::get('lang') == 'th')
                                            @if(getPercent($r->price_full,
                                            $r->price_sale) != 0)<span>{{$r->price_full}} บาท</span>
                                            <div>฿{{$r->price_sale}}</div>@else<div>{{$r->price}} บาท</div>@endif
                                        @else 
                                            @if(getPercent($r->price_full,
                                            $r->price_sale) != 0)<span>฿{{$r->price_full}}</span>
                                            <div>฿{{$r->price_sale}}</div>@else<div>฿{{$r->price}}</div>@endif
                                        @endif
                                    </div>
                                    <div class="wrap_addcart">
                                        <a href="" class="btn_default btn_green btn_addcart" id="{{$r->products_id}}-buy_1_get_1">
                                            <img src="{{asset('/files/frontend/images/icon_cart.svg')}}" alt=""> 
                                            @if(Session::get('lang') == 'th')
                                                เพิ่มใส่ตระกร้า        
                                            @else 
                                                Add to Cart
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
     <section class="row wrap_listspend">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box_itemspend">
@if(!empty($promotion_text))
    @foreach($promotion_text as $r)
                        <div class="item_listspend">
                            {{(Session::get('lang') == 'th') ? $r->promotion_text_th : $r->promotion_text_en}}
                        </div>
    @endforeach
@endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row wrap_whyeatfiit">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <div class="title_topic">{!!(Session::get('lang') == 'th') ? 'ทำไมต้อง อีทฟิต?' : 'Why <span>eatfit?</span>'!!}</div>
                    </div>
                    <div class="wrap_iconwhyeatfit">
                        <div class="item_whyeatfit">
                            <div class="circle_why icon_health"><img src="{{asset('files/frontend/images/health.svg')}}"
                                    alt=""></div>
                            <div class="wrap_detail_why">
                                <div class="topic_whyeatfit">{{(Session::get('lang') == 'th') ? 'ความอร่อยมาพร้อมสุขภาพดี' : 'Healthful and Delicious'}}</div>
                                <div>
                                    {{(Session::get('lang') == 'th') ? 'รังสรรค์โดยเชฟมืออาชีพ รับรองโดยนักโภชนาการ' : 'Chef-crafted, nutritionist-approved meals'}}
                                </div>
                            </div>
                        </div>
<!--
                        <div class="item_whyeatfit">
                            <div class="circle_why icon_sustain"><img
                                    src="{{asset('files/frontend/images/icon_sustain.svg')}}" alt=""></div>
                            <div class="wrap_detail_why">
                                <div class="topic_whyeatfit">{{(Session::get('lang') == 'th') ? 'บรรจุภัณฑ์เพื่อสิ่งแวดล้อม' : 'Sustainable packaging'}}</div>
                                <div>
                                    {{(Session::get('lang') == 'th') ? 'ภาชนะบรรจุอาหารของเราสามารถย่อยสลายได้ทั้งทางชีวภาพและทางธรรมชาติ eatfit ดำเนินการตามหลักจริยธรรมและการจัดการที่ดี โดยตระหนักถึงสิ่งแวดล้อมและความรับผิดชอบต่อสังคม' : 'Our hot food containers are fully biodegradable and compostable. Eatfit by Gourmet Primo is committed to social responsibility.'}}
                                </div>
                            </div>
                        </div>
-->
                        <div class="item_whyeatfit">
                            <div class="circle_why icon_premium"><img
                                    src="{{asset('files/frontend/images/icon_food.svg')}}" alt=""></div>
                            <div class="wrap_detail_why">
                                <div class="topic_whyeatfit">{{(Session::get('lang') == 'th') ? 'วัตถุดิบชั้นเลิศ' : 'Premium Ingredients'}}</div>
                                <div>
                                    {{(Session::get('lang') == 'th') ? 'อุดมไปด้วยวิตามินและสารอาหารระดับพรีเมียมจากธรรมชาติ ปราศจากวัตถุปรุงแต่งและใส่ใจในทุกขั้นตอน' : 'Packed full of vitamins and nutrients, our premium ingredients are all-natural with
                                    no artificial colouring or flavours.'}}
                                </div>
                            </div>
                        </div>
                        <div class="item_whyeatfit">
                            <div class="circle_why icon_quality"><img
                                    src="{{asset('files/frontend/images/icon_quality.svg')}}" alt=""></div>
                            <div class="wrap_detail_why">
                                <div class="topic_whyeatfit">{{(Session::get('lang') == 'th') ? 'การันตีคุณภาพระดับสากล' : 'Highest Standards'}}</div>
                                <div>
                                    @if(Session::get('lang') == 'th') 
                                        @php
                                        echo 'ได้การรับรองมาตรฐานจาก GMP, HACCP, และเครื่องหมายฮาลาล <div class="logo_gmp"><img src="'.url('files/frontend/images/logo_gmp-haccp.png').'"
                                            alt=""></div>';
                                        @endphp
                                    @else
                                        @php
                                        echo 'Accredited by GMP + HACCP <div class="logo_gmp"><img src="'.url('files/frontend/images/logo_gmp-haccp.png').'" alt=""></div>Halal Certified';
                                        @endphp
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="item_whyeatfit">
                            <div class="circle_why icon_delivery"><img
                                    src="{{asset('files/frontend/images/icon_delivery.svg')}}" alt=""></div>
                            <div class="wrap_detail_why">
                                <div class="topic_whyeatfit">{{(Session::get('lang') == 'th') ? 'สุขภาพดีอยู่ไม่ไกล' : 'Convenient meal delivery'}}</div>
                                <div>
                                    {{(Session::get('lang') == 'th') ? 'พร้อมเสิร์ฟอาหารสดใหม่และดีต่อสุขภาพถึงหน้าบ้านคุณ เพียงแค่อุ่นก็ทานได้เลย' : 'Fresh and healthful meals, delivered to your door and ready in minutes'}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <section class="row home_wrap_result">
        <div class="container">
            <div class="row">
                <div class="col-12 wrap_results">
                    <div class="text-center">
                        <div class="title_topic">{{(Session::get('lang') == 'th') ? 'ผลลัพธ์' : 'See Results'}}</div>
                    </div>
                    <div class="topic_result_home">{{(Session::get('lang') == 'th') ? 'ผลลัพธ์กับแรงบันดาลใจที่ลูกค้าเราได้รับ' : 'Get inspired by our customers’ amazing stories!'}}</div>
                    <div class="owl-seeresult owl-carousel owl-theme">
                        @foreach ($review as $item)
                        <div class="items">
                            <div class="item_results">
                                <a href="{{url('/review_all')}}">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="star-rate">
                                                @if ($item->review_star == '1')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_star == '2')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_star == '3')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_star == '4')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_star == '5')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                @else
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="date_seeresult"><i class="far fa-calendar-alt"></i>
                                                {{$item->review_date}}</div>
                                        </div>
                                        <div class="col-12">
                                            <div class="topic_results">{{$item->review_title}}</div>
                                            <div class="desc_results">{{$item->review_content}}</div>
                                            <div class="name_customerresult"><img
                                                    src="{{asset('/files/frontend/images/avatar.svg')}}" alt="">
                                                {{$item->member_name.' '.$item->member_family}}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @foreach ($review_admin as $item)
                            @php
                            $product = DB::table('products')
                                ->where('products_id', '=', $item->products_id)
                                ->first();
                            @endphp
                        <div class="items">
                            <div class="item_results">
                                <a href="{{url('/review_all')}}">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="star-rate">
                                                @if ($item->review_admin_rating == '1')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_admin_rating == '2')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_admin_rating == '3')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_admin_rating == '4')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($item->review_admin_rating == '5')
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                <i class="fas fa-star star-gold"></i>
                                                @else
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="date_seeresult"><i class="far fa-calendar-alt"></i>
                                                {{$item->review_admin_datetime_update}}</div>
                                        </div>
                                        <div class="col-12">
                                            <div class="topic_results">{{ Session::get('lang') == 'th' ? @$product->name_products_thai : @$product->name_products_eng }}</div>
                                            <div class="desc_results">{{-- {{ Session::get('lang') == 'th' ? $item->review_admin_review_th : $item->review_admin_review_en }} --}}{{ $item->review_admin_review_th }}</div>
                                            <div class="name_customerresult"><img
                                                    src="{{asset('/files/frontend/images/avatar.svg')}}" alt="">
                                                    {{-- {{ Session::get('lang') == 'th' ? $item->review_admin_name_th : $item->review_admin_name_en }} --}}{{ $item->review_admin_name_th }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    


   

    <section class="row wrap_home_bmi">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="home_bmi">
                        <div class="home_photo_bmi"><img src="{{asset('/files/frontend/images/photo_cal_bmi_07.jpg')}}"
                                alt=""></div>
                        <div class="home_title_bmi">
                            <div class="title_topic">{{(Session::get('lang') == 'th') ? 'คำนวณค่าดัชนีมวลกาย' : 'BMI CALCULATIONS'}}</div>
                            <div>{{(Session::get('lang') == 'th') ? 'มาดูกันว่าแต่ละวันร่างกายของคุณต้องการแคลอรี่เท่าไร' : 'Find out if you are a healthy weight and how many daily calories you need'}}</div>
                        </div>
                        <div class="home_btn_bmi"><a href="{{url('/BMI')}}" class="btn_default">@if(Session::get('lang') == 'th') คำนวณ @else Calculations @endif</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="row wrap_home_blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <div class="title_topic">{{(Session::get('lang') == 'th') ? 'บทความแนะนำสำหรับคุณ' : 'Top Blog Posts for You'}}</div>
                    </div>
                    <div class="owl-blog owl-carousel owl-theme">

                        <div class="items">
                            <div class="item_blog">
                                <a href="{{url('/blog_detail',$blog_last->blog_id)}}">
                                    <div class="product_photosquare">
                                        <figure><img src="{{url('local/public/'.$blog_last->blog_cover_image)}}" alt="">
                                        </figure>
                                    </div>
                                    <div class="home_blogdate"><i class="far fa-calendar-alt"></i>
                                        {{(date('d.m.Y', strtotime($blog_last->blog_date)))}}</div>
                                    <div class="desc_homeblog">
                                        {{-- {!! Str::limit(strip_tags($blog_last->blog_topic_en), 80)
                                        !!} --}}
                                        @if(Session::get('lang') == 'th')
                                        {!! Str::limit(strip_tags($blog_last->blog_topic_th), 80) !!}
                                        @else
                                        {!! Str::limit(strip_tags($blog_last->blog_topic_en), 80) !!}
                                        @endif
                                        </div>
                                </a>
                            </div>
                        </div>

                        <div class="items">
                            <div class="item_blog">
                                <a href="{{url('/blog_detail',$blog_last_two->blog_id)}}">
                                    <div class="product_photosquare">
                                        <figure><img src="{{url('local/public/'.$blog_last_two->blog_cover_image)}}"
                                                alt=""></figure>
                                    </div>
                                    <div class="home_blogdate"><i class="far fa-calendar-alt"></i>
                                        {{(date('d.m.Y', strtotime($blog_last_two->blog_date)))}}</div>
                                    <div class="desc_homeblog">.
                                        {{-- {!! Str::limit(strip_tags($blog_last_two->blog_topic_en), 80) !!} --}}
                                        @if(Session::get('lang') == 'th')
                                        {!! Str::limit(strip_tags($blog_last_two->blog_topic_th), 80) !!}
                                        @else
                                        {!! Str::limit(strip_tags($blog_last_two->blog_topic_en), 80) !!}
                                        @endif
                                        </div>
                                </a>
                            </div>
                        </div>
                        <div class="items">
                            <div class="item_blog">
                                <a href="{{url('/blog_detail',$blog_last_three->blog_id)}}">
                                    <div class="product_photosquare">
                                        <figure><img src="{{url('local/public/'.$blog_last_three->blog_cover_image)}}"
                                                alt=""></figure>
                                    </div>
                                    <div class="home_blogdate"><i class="far fa-calendar-alt"></i>
                                        {{(date('d.m.Y', strtotime($blog_last_three->blog_date)))}}</div>
                                    <div class="desc_homeblog">
                                        {{-- {!! Str::limit(strip_tags($blog_last_three->blog_topic_en), 80) !!} --}}
                                        @if(Session::get('lang') == 'th')
                                        {!! Str::limit(strip_tags($blog_last_three->blog_topic_th), 80) !!}
                                        @else
                                        {!! Str::limit(strip_tags($blog_last_three->blog_topic_en), 80) !!}
                                        @endif
                                        </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row wrap_ig">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrap_ig_bgwhite">
                        <div class="text-center">
                            <div class="title_topic home_title_ig">{{(Session::get('lang') == 'th') ? 'ติดตามเรา' : 'Follow Us'}}</div>
                        </div>
                        <div class="title_nameig"><i class="fab fa-instagram"></i> @eatfit.th</div>
                        <div class="row row_item_photoig">
@if(!empty($instagram))
    @foreach($instagram as $r)
                            <div class="col-6 col-sm-3 item_photoig">
                                <a href="{{$r->instagram_alt}}" target="_blank">
                                    <div class="photo_ig">
                                        <figure><img src="{{asset($r->instagram_image)}}"></figure>
                                    </div>
                                </a>
                            </div>
    @endforeach
@endif
                            {{-- <div class="col-6 col-sm-3 item_photoig">
                                <a href="#" target="_blank">
                                    <div class="photo_ig">
                                        <figure><img src="{{asset('/files/frontend/images/123655824_127885185752881_2638722716718894444_o.jpg')}}" alt=""></figure>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3 item_photoig">
                                <a href="#" target="_blank">
                                    <div class="photo_ig">
                                        <figure><img src="{{asset('/files/frontend/images/124557087_129038228970910_94240541094617269_o.jpg')}}" alt=""></figure>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3 item_photoig">
                                <a href="#" target="_blank">
                                    <div class="photo_ig">
                                        <figure><img src="{{asset('/files/frontend/images/123969151_128762925665107_7031147978983740636_o.jpg')}}" alt=""></figure>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3 item_photoig">
                                <a href="#" target="_blank">
                                    <div class="photo_ig">
                                        <figure><img src="{{asset('/files/frontend/images/121830840_120441519830581_2755778233304397860_o.jpg')}}" alt=""></figure>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3 item_photoig">
                                <a href="#" target="_blank">
                                    <div class="photo_ig">
                                        <figure><img src="{{asset('/files/frontend/images/123435598_127733742434692_2158654786131045531_o.jpg')}}" alt=""></figure>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3 item_photoig">
                                <a href="#" target="_blank">
                                    <div class="photo_ig">
                                        <figure><img src="{{asset('/files/frontend/images/122120342_120441976497202_8935804864309005505_o.jpg')}}" alt=""></figure>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3 item_photoig">
                                <a href="#" target="_blank">
                                    <div class="photo_ig">
                                        <figure><img src="{{asset('/files/frontend/images/124557087_129038228970910_94240541094617269_o.jpg')}}" alt=""></figure>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="row wrap_ig">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrap_ig_bgwhite">
                        <div class="text-center">
                            <div class="title_topic home_title_ig">{{(Session::get('lang') == 'th') ? 'ติดตามเรา' : 'Follow Us'}}</div>
                        </div>
                        <div class="title_nameig"><i class="fab fa-instagram"></i> @eatfit.th</div>
                        <div class="row">
                            <div class="col-12 wrap_homeig">
                                <div class="item_photoig">
                                    <div>
                                        <div class="photo_ig" id="instagram-feed">
@if(!empty($instagram))
    @foreach($instagram as $r)
                                            <img src="{{ $r->instagram_image }}">
    @endforeach
@endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <script src="<?php echo asset('/files/frontend/js/jquery.min.js');?>"></script>
    <script src="<?php echo asset('/files/frontend/instagram/jquery.instagramFeed.min.js');?>"></script>

    <script>
        /*(function($){
        $(window).on('load', function(){
                $.instagramFeed({
                    'username': 'eatfit.th',
                    'container': "#instagram-feed",
                    'display_profile': false,
                    'display_biography': false,
                    'display_gallery': true,
                    'display_captions': false,
                    'max_tries': 8,
                    'callback': null,
                    'styling': true,
                    'items': 8,
                    'items_per_row': 4,
                    'margin': 1,
                    'lazy_load': true,
                    'on_error': console.error
                });
            });
        })(jQuery);*/
    </script>

    @include('frontend.layouts.inc_footer')
    @include('frontend.layouts.scriptjs')

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
