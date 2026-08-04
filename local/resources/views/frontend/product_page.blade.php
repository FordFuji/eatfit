<!doctype html>
<html>

<head>
    @include('frontend.layouts.inc_head')

<meta property="og:url"           content="{{url('product_page/'.$id.'/'.$products_id)}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="@if(Session::get('lang') == 'th'){{$products->name_products_thai}}@else{{$products->name_products_eng}}@endif" />
<meta property="og:description"   content="@if(Session::get('lang') == 'th'){{$products->title_inside_products_thai}}@else{{$products->title_inside_products_eng}}@endif" />
<meta property="og:image"         content="{{url($products->img_products)}}" />

<!-- Event snippet for Purchase conversion page --> <script> gtag('event', 'conversion', { 'send_to': 'AW-452802633/GZkZCJr62e8BEMnw9NcB', 'value': '<?php echo $product_price;?>', 'currency': 'THB', 'transaction_id': '<?php echo $products_id;?>' }); </script>

<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>

</head>

<body>

<div class="container-fluid">

    @include('frontend.layouts.inc_menu')

    <section class="row">
        <div class="container">
            <div class="row wrap_navigationbar">
                <a href="{{url('index')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> 
                <a
                    href="{{url('/product/'.$id_menu_show_also->menu_product_head_id)}}">
                    @if(Session::get('lang') == 'th')
                        {{$id_menu_show_also->name_head_menu_thai}}
                        @else
                        {{$id_menu_show_also->name_head_menu_eng}}
                        @endif
                </a> <span><i class="fas fa-chevron-right"></i></span>
                <div>
                    @if(Session::get('lang') == 'th')
                        {{$products->name_products_thai}}
                    @else
                        {{$products->name_products_eng}}
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="row bg_top_productpage">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    @if($products->percent != '' and $products->percent != '0')
                    <div class="badge_tag
                        @if($products->color_percent == 1)
                        pinktag
                        @elseif($products->color_percent == 2)
                        purpletag
                        @elseif($products->color_percent == 3)
                        yellowtag
                        @else
                        pinktag
                        @endif">
                        <div>-{{$products->percent}}%</div>
                    </div>
                    @endif
                    <div class="owl-bannerslide owl-carousel owl-theme">
                        <?php
                        /* ตอนนี้เอารูปปกมาก่อน อนาคตอาจอัพเป็น Gallery
                                                @foreach($gallery as $keygallery => $rgallery)
                                                    <div class="items">
                                                        <img src="{{url($rgallery->img_products_gallery)}}" alt="">
                                                    </div>
                                                @endforeach
                        */
                        ?>
                        <div class="items">
                            <img src="{{asset($products->img_products)}}" alt="">
                        </div>
                    </div>
                    <div class="box_socialshare">
                        <div class="txt_share"><!-- Share --></div>
                        <div class="icon_socialshare">
                            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">แชร์</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="product_shortdesc">
                        <div class="product_menuname">
                            @if(Session::get('lang') == 'th')
                                {{$products->name_products_thai}}
                            @else
                                {{$products->name_products_eng}}
                            @endif
                        </div>
                        <div class="product_tag">
                            @foreach($tag as $keytag =>$rtag)
                                <div>
                                    @if(Session::get('lang') == 'th')
                                        {{$rtag->tag_thai}}
                                    @else
                                        {{$rtag->tag_eng}}
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="product_numreview">
                            <div class="star-rate">
                                @if ($reviewcount == '0')
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                @else
                                @php
                                    $reviewS = DB::table('tb_review')
                                            // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                                            ->leftJoin('products', 'tb_review.review_menu', '=', 'products.products_id')
                                            ->where('review_menu', $products->products_id)
                                            ->where('review_show','=', '1')
                                            ->orderBy('review_id','DESC')
                                            ->first();
                                    $sumstar = 0;
                                    $sumstar += $reviewS->review_star;
                                    $star = ROUND($sumstar);
                                @endphp
                                @if ($star == '1')
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                @elseif ($star == '2')
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                @elseif ($star == '3')
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                @elseif ($star == '4')
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star"></i>
                                @elseif ($star == '5')
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
                                @endif
                                
                            </div>
                            <div class="product_linktoreview">
                                @if ($reviewcount == '0')
                                <a href="#">@if(Session::get('lang') == 'th') ยังไม่มีการรีวิว @else no reviews @endif</a>
                                @else
                                <a href="{{url('/review_all')}}">{{$reviewcount}} @if(Session::get('lang') == 'th') รีวิว @else reviews @endif</a>
                                @endif
                                
                            </div>
                        </div>
                        <div class="shordesc_editor">
                            @if(Session::get('lang') == 'th')
                                {!! $products->title_inside_products_thai !!}
                            @else
                                {!! $products->title_inside_products_eng !!}
                            @endif
                        </div>
                        <div class="product_boxprice">
                            <div class="item_productbest_price item_productprice">
                                @if(Session::get('lang') == 'th')
                                    @if($products->price == null)
                                        ราคา : <span>฿{{$products->price_full}}</span>
                                        <div>{{$products->price_sale}} บาท</div>
                                    @else
                                        <div>{{$products->price}} บาท</div>
                                    @endif
                                @else 
                                    @if($products->price == null)
                                        Price : <span>฿{{$products->price_full}}</span>
                                        <div>฿{{$products->price_sale}}</div>
                                    @else
                                        <div>฿{{$products->price}}</div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="product_boxqty">
                            {{-- <div class="product_txt_qty">@if(Session::get('lang') == 'th') จำนวน @else QTY @endif:</div>
                            <div class="product_box_qty">
                                <div class="sp-quantity">
                                    <div class="sp-minus btnquantity"><i class="fas fa-minus"></i></div>
                                    <div class="sp-input">
                                        <input type="text" class="quntity-input" id="qty_product_page" value="1"/>
                                    </div>
                                    <div class="sp-plus btnquantity"><i class="fas fa-plus"></i></div>
                                </div>
                            </div>
                            <div class="product_btnaddcart">
                                <a href="" id="{{$products->products_id}}" class="btn_default btn_green btn_addcart"><img
                                        src="{{asset('/files/frontend/images/icon_cart.svg')}}"
                                        alt=""> @if(Session::get('lang') == 'th') เพิ่มลงในตระกร้า @else Add to Cart @endif</a>
                            </div>
                            <div class="product-box_addwishlist">
                                    @if(Session::get('member_id') != '')
                                    @php
                                    $login_inc_top = DB::table('lv_member')
                                    ->where('member_id', '=', Session::get('member_id'))
                                    ->first();
                                    @endphp
                                    <button 
                                    class="{{$products->wish_id && ($rproducts->wish_member == Session::get('member_id'))  != '' ? 'active' : ''}}"
                                        value="{{$products->products_id}}" id="show_{{$products->products_id}}"
                                        onclick="show_(this.value)">
                                        <img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt="">
                                    </button>
                                    @endif
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="product_topicbutton p_bgyellow">
                        <img src="{{asset('/files/frontend/images/icon_ingredients.svg')}}" alt=""> {{(Session::get('lang') == 'th') ? 'วัตถุหลัก หรือ ส่วนประกอบสำคัญ' : 'Key Ingredients'}}
                    </div>
                    <div class="product-borderradius">
                        <div class="row">

                            @foreach($ingredients as $key => $ringredients)
                                <div class="col-4 text-center">
                                    <div class="item_ingredient">
                                        <div class="photo_ingredient"><img
                                                src="{{url($ringredients->img_ingredients)}}" alt="">
                                        </div>
                                        <div>
                                            @if(Session::get('lang') == 'th')
                                                {{$ringredients->text_ingredients_thai}}
                                            @else
                                                {{$ringredients->text_ingredients_eng}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="product_topicbutton p_bgpurple">
                        <img src="{{asset('/files/frontend/images/icon_calculate.svg')}}" alt=""> {{(Session::get('lang') == 'th') ? 'ปริมาณพลังงาน' : 'What’s inside'}}
                    </div>
                    <div class="product-borderradius desc_productinside">
                        <div class="row">
                            <div class="col-6 item_productinside">
                                <div class="wrap_insideprogress">
                                    <div class="product_topicinside">@if(Session::get('lang') == 'th') แคลลอรี่ @else Calories @endif</div>
                                    <div class="product_numtotal_inside">{{$products->calories_products}}</div>
                                    <div class="inside_barprogress">
                                        <div class="persent_progress" style="width: 21%;"></div>
                                    </div>
                                    <div class="txt_barprogress">21% DV</div>
                                </div>
                            </div>
                            <div class="col-6 item_productinside">
                                <div class="wrap_insideprogress">
                                    <div class="product_topicinside">@if(Session::get('lang') == 'th') คาร์บ @else Carbs @endif</div>
                                    <div class="product_numtotal_inside">{{$products->carbs_products}}g</div>
                                    <div class="inside_barprogress">
                                        <div class="persent_progress" style="width: 6%;"></div>
                                    </div>
                                    <div class="txt_barprogress">6% DV</div>
                                </div>
                            </div>
                            <div class="col-6 item_productinside">
                                <div class="wrap_insideprogress">
                                    <div class="product_topicinside">@if(Session::get('lang') == 'th') ไขมัน @else Total Fat @endif</div>
                                    <div class="product_numtotal_inside">{{$products->fat_products}}g</div>
                                    <div class="inside_barprogress">
                                        <div class="persent_progress" style="width: 21%;"></div>
                                    </div>
                                    <div class="txt_barprogress">26% DV</div>
                                </div>
                            </div>
                            <div class="col-6 item_productinside">
                                <div class="wrap_insideprogress">
                                    <div class="product_topicinside">@if(Session::get('lang') == 'th') โปรตีน @else Protein @endif</div>
                                    <div class="product_numtotal_inside">{{$products->protein_products}}g</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="container">
            <div class="bar_menutab">
                <ul class="tabs-menu">
                    <li class="current"><a href="#delivery"><img
                                src="{{asset('/files/frontend/images/icon_Deliverytime.svg')}}" class="svg" alt="">
                            {{(Session::get('lang') == 'th') ? 'การจัดส่ง' : 'DELIVERY'}}</a></li>
                    <li><a href="#reviews"><i class="fas fa-star"></i> {{(Session::get('lang') == 'th') ? 'รีวิว' : 'reviews'}}</a></li>
                </ul>
            </div>
            <div class="product_tabcontent">
                <div class="tab">
                    <div id="delivery" class="tab-content">
<!--
                        @if(Session::get('lang') == 'th')
                            {!! $products->text_delivery_upper_thai !!}
                        @else
                            {!! $products->text_delivery_upper_eng !!}
                        @endif
                        <div class="bg_delivery_topic">
                            <div class="row">
                                <div class="col-4 delivery_desktop">Option</div>
                                <div class="col-4 delivery_desktop">Delivery Days</div>
                                <div class="col-4 delivery_desktop">Delivery Time</div>
                                <div class="col-12 delivery_mobile">
                                    Delivery Days / Time
                                </div>
                            </div>
                        </div>
                        <div class="wrap_desc_deliverytime">
                            @foreach($delivery as $keydelivery =>$rdelivery)
                                <div class="desc_delevery_time">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <span>
                                                @if(Session::get('lang') == 'th')
                                                    {!! $rdelivery->option_thai !!}
                                                @else
                                                    {!! $rdelivery->option_eng !!}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="txt_delivery_mb">Delivery Days:</div>
                                            @if(Session::get('lang') == 'th')
                                                {!! $rdelivery->day_thai !!}
                                            @else
                                                {!! $rdelivery->day_eng !!}
                                            @endif
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="txt_delivery_mb">Delivery Time:</div>
                                            @if(Session::get('lang') == 'th')
                                                {!! $rdelivery->time_thai !!}
                                            @else
                                                {!! $rdelivery->time_eng !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        @if(Session::get('lang') == 'th')
                            {!! $products->text_delivery_down_thai !!}
                        @else
                            {!! $products->text_delivery_down_eng !!}
                        @endif
-->
                   <p>
                    @if(Session::get('lang') == 'th') อีทฟิต มีตัวเลือกการจัดส่งในเขตกรุงเทพฯและปริมณฑล ดังนี้ @else We currently provide the following shipping options within Bangkok and the metropolitan region @endif:
                            </p>
                            <div class="bg_delivery_topic">
                                <div class="row">
                                    <div class="col-4 delivery_desktop">{{(Session::get('lang') == 'th') ? 'ตัวเลือกการจัดส่ง' : 'Option'}}</div>
                                    <div class="col-4 delivery_desktop">{{(Session::get('lang') == 'th') ? 'วันที่จัดส่ง' : 'Delivery Days'}}</div>
                                    <div class="col-4 delivery_desktop">{{(Session::get('lang') == 'th') ? 'ช่วงเวลาจัดส่ง' : 'Delivery Time'}}</div>
                                    <div class="col-12 delivery_mobile">
                                        Delivery Days / Time
                                    </div>
                                </div>
                            </div>
                            <div class="wrap_desc_deliverytime">
                                @if(Session::get('lang') == 'th')
                                <div class="desc_delevery_time">
                                    <div class="row">
                                        <div class="col-12 col-sm-4"><span>{{(Session::get('lang') == 'th') ? 'การจัดส่งแบบปกติ' : 'Standard delivery'}}</span></div>
                                        <div class="col-12 col-sm-4"><div class="txt_delivery_mb">{{(Session::get('lang') == 'th') ? 'ช่วงเวลาจัดส่ง' : 'Delivery Days'}}:</div> {{(Session::get('lang') == 'th') ? 'วันจันทร์ - วันอาทิตย์' : 'Monday – Sunday'}}</div>
                                        <div class="col-12 col-sm-4">
                                            <div class="txt_delivery_mb">{{(Session::get('lang') == 'th') ? 'ช่วงเวลาจัดส่ง' : 'Delivery Time'}}:</div>
                                            <ul>
                                                <li>{{(Session::get('lang') == 'th') ? '08.00 – 12.00น.' : '8 am – 12 noon'}}</li>
                                                <li>{{(Session::get('lang') == 'th') ? '14.00 - 16.00น.' : '2 – 4 pm'}} </li>
                                                <li>{{(Session::get('lang') == 'th') ? '16.00 - 20.00น.' : '4 – 8 pm'}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="desc_delevery_time">
                                    <div class="row">
                                        <div class="col-12 col-sm-4"><span>การจัดส่งในวันถัดไป</span></div>
                                        <div class="col-12 col-sm-4"><div class="txt_delivery_mb">ช่วงเวลาจัดส่ง :</div> วันจันทร์ – วันอาทิตย์</div>
                                        <div class="col-12 col-sm-4">
                                            <div class="txt_delivery_mb">Delivery Time:</div>
                                            <ul>
                                                <li>08:00 น.-12:00 น. (สั่งสินค้าก่อน 12:00)</li>
                                                <li>14:00 น.-16:00 น. (สั่งสินค้าก่อน 20:00)</li>
                                                <li>16:00 น.-20:00 น. (สั่งสินค้าก่อน 20:00)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @else 
                                <div class="desc_delevery_time">
                                    <div class="row">
                                        <div class="col-12 col-sm-4"><span>Standard delivery</span></div>
                                        <div class="col-12 col-sm-4"><div class="txt_delivery_mb">Delivery Days:</div> Monday – Sunday</div>
                                        <div class="col-12 col-sm-4">
                                            <div class="txt_delivery_mb">Delivery Time:</div>
                                            <ul>
                                                <li>8 am – 12 noon</li>
                                                <li>2 – 4 pm</li>
                                                <li>4 – 8 pm</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="desc_delevery_time">
                                    <div class="row">
                                        <div class="col-12 col-sm-4"><span>Next day delivery</span></div>
                                        <div class="col-12 col-sm-4"><div class="txt_delivery_mb">Delivery Days:</div> Monday – Sunday</div>
                                        <div class="col-12 col-sm-4">
                                            <div class="txt_delivery_mb">Delivery Time:</div>
                                            <ul>
                                                <li>8 am – 12 noon (order placed before 12 noon the previous day)</li>
                                                <li>2 – 4 pm (order placed before 8 pm the previous day)</li>
                                                <li>4 – 8 pm (order placed before 8 pm the previous day)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <p>
                               @if(Session::get('lang') == 'th') หมายเหตุ : หากคุณเลือกแพ็คเกจ 3 วันขึ้นไป คุณสามารถเลือกจัดส่งแบบทุกวันได้ เพื่อความสดใหม่อย่างมีประสิทธิภาพสูงสุด ทางทีมจัดส่งของเราจะติดต่อคุณเพื่อยืนยันวันและเวลาในการจัดส่ง @else *Please note: if you are doing a 3 day+ plan, you can opt for daily delivery to ensure maximum freshness. Our delivery team will contact you to confirm date and time of the deliveries. @endif
                            </p>
                    </div>
                    <div id="reviews" class="tab-content">
                        
                        @foreach ($review_admin as $r)
                          <div class="product_boxreviews">
                            <div class="row">
                                <div class="col-6">
                                    <div class="star-rate">
                                        @if ($r->review_admin_rating == '1')
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        @elseif ($r->review_admin_rating == '2')
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        @elseif ($r->review_admin_rating == '3')
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        @elseif ($r->review_admin_rating == '4')
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star"></i>
                                        @elseif ($r->review_admin_rating == '5')
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
                                    <div class="date_seeresult"><i class="far fa-calendar-alt"></i> {{ $r->review_admin_datetime_update }}</div>
                                </div>
                                <div class="col-12">
                                    <div class="topic_results">{{ Session::get('lang') == 'th' ? $r->review_admin_title_th : $r->review_admin_title_th }}</div>
                                    <div class="desc_results">{{ Session::get('lang') == 'th' ? $r->review_admin_review_th : $r->review_admin_review_th }}</div>
                                    <div class="box_photoreviews">
                                        @php
                                        $reviewfileimg = DB::table('lv_review_admin_image')
                                            ->where('image_or_video', '=', 'Image')
                                            ->orderBy('review_admin_image_id', 'asc')
                                            ->where('review_admin_id', '=', $r->review_admin_id)
                                            ->get();

                                        $reviewfilevddo = DB::table('lv_review_admin_image')
                                            ->where('image_or_video', '=', 'VDO')
                                            ->orderBy('review_admin_image_id', 'asc')
                                            ->where('review_admin_id', '=', $r->review_admin_id)
                                            ->get();
                                        @endphp
                                        @foreach ($reviewfileimg as $itemfile)
                                        <a href="{{url($itemfile->review_admin_image_image)}}" data-fancybox="images">
                                            <figure><img src="{{asset($itemfile->review_admin_image_image)}}" alt=""></figure>
                                        </a>
                                        @endforeach
                                        <p>&nbsp;</p>
                                        @foreach ($reviewfilevddo as $itemvdo)
                                           <a href="{{url($itemvdo->review_admin_image_image)}}" data-fancybox>
                                            {{-- <figure> --}}
                                                <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                                <video width="500" controls>
                                                    <source src="{{asset($itemvdo->review_admin_image_image)}}" type="video/mp4">
                                                  Your browser does not support the video tag.
                                                  </video>
                                                {{-- </figure> --}}
                                            </a> 
                                        @endforeach
                                    </div>
                                    <div class="name_customerresult">{{-- <img src="{{asset('/files/frontend/images/avatar.svg')}}" alt=""> --}} {{$r->review_admin_name_th}}
                                    </div>
                                </div>
                            </div>
                        </div>  
                        @endforeach
                        @foreach ($review as $item)
                          <div class="product_boxreviews">
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
                                    <div class="date_seeresult"><i class="far fa-calendar-alt"></i> {{$item->review_date}}</div>
                                </div>
                                <div class="col-12">
                                    <div class="topic_results">{{$item->review_title}}</div>
                                    <div class="desc_results">{{$item->review_content}}</div>
                                    <div class="box_photoreviews">
                                        @php
                                        $reviewfileimg = DB::table('tb_review')
                                                        ->leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                                                        // ->leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                                                        ->where('review_file_main', '=', $item->review_id)
                                                        ->where('review_file_type', '=', 'IMG')
                                                        ->where('products_id', '=', $id_products)
                                                        // ->orderBy('review_id','DESC')
                                                        ->get();
                                        $reviewfilevddo = DB::table('tb_review')
                                                        ->leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                                                        // ->leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                                                        ->where('review_file_main', '=', $item->review_id)
                                                        ->where('review_file_type', '=', 'VDO')
                                                        ->where('products_id', '=', $id_products)
                                                        // ->orderBy('review_id','DESC')
                                                        ->get();
                                    @endphp
                                        @foreach ($reviewfileimg as $itemfile)
                                        <a href="{{url('local/public/'.$itemfile->review_file_file)}}" data-fancybox="images">
                                            <figure><img src="{{url('local/public/'.$itemfile->review_file_file)}}" alt=""></figure>
                                        </a>
                                        @endforeach
                                        
                                        @foreach ($reviewfilevddo as $itemvdo)
                                           <a href="{{url('local/public/'.$itemvdo->review_file_file)}}" data-fancybox>
                                            {{-- <figure> --}}
                                                <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                                <video src="{{url('local/public/'.$itemvdo->review_file_file)}}" width="125">
                                                {{-- </figure> --}}
                                            </a> 
                                        @endforeach
                                    </div>
                                    <div class="name_customerresult"><img
                                            src="{{asset('/files/frontend/images/avatar.svg')}}" alt=""> {{$item->member_name.' '.$item->member_family}}
                                    </div>
                                </div>
                            </div>
                        </div>  
                        @endforeach
                        

                        {{-- <div class="product_boxreviews">
                            <div class="row">
                                <div class="col-6">
                                    <div class="star-rate">
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                </div>
                                <div class="col-12">
                                    <div class="topic_results">Delicious</div>
                                    <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                    <div class="box_photoreviews">
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/video_test.mp4')}}" data-fancybox>
                                            <figure>
                                                <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                                <img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                     alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="name_customerresult"><img
                                            src="{{asset('/files/frontend/images/avatar.svg')}}" alt=""> Name Surname
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_boxreviews">
                            <div class="row">
                                <div class="col-6">
                                    <div class="star-rate">
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                </div>
                                <div class="col-12">
                                    <div class="topic_results">Delicious</div>
                                    <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                    <div class="box_photoreviews">
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/video_test.mp4')}}" data-fancybox>
                                            <figure>
                                                <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                                <img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                     alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="name_customerresult"><img
                                            src="{{asset('/files/frontend/images/avatar.svg')}}" alt=""> Name Surname
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_boxreviews">
                            <div class="row">
                                <div class="col-6">
                                    <div class="star-rate">
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                </div>
                                <div class="col-12">
                                    <div class="topic_results">Delicious</div>
                                    <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                    <div class="box_photoreviews">
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/video_test.mp4')}}" data-fancybox>
                                            <figure>
                                                <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                                <img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                     alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="name_customerresult"><img
                                            src="{{asset('/files/frontend/images/avatar.svg')}}" alt=""> Name Surname
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_boxreviews">
                            <div class="row">
                                <div class="col-6">
                                    <div class="star-rate">
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="date_seeresult"><i class="far fa-calendar-alt"></i> 24.08.2019</div>
                                </div>
                                <div class="col-12">
                                    <div class="topic_results">Delicious</div>
                                    <div class="desc_results">เมนูหลากหลาย มีให้เลือกมากมาย แถมรสชาติอร่อยด้วยค่ะ</div>
                                    <div class="box_photoreviews">
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                           data-fancybox="images">
                                            <figure><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                         alt=""></figure>
                                        </a>
                                        <a href="{{asset('/files/frontend/images/video_test.mp4')}}" data-fancybox>
                                            <figure>
                                                <div class="icon_playvdo"><i class="fas fa-play-circle"></i></div>
                                                <img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}"
                                                     alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="name_customerresult"><img
                                            src="{{asset('/files/frontend/images/avatar.svg')}}" alt=""> Name Surname
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page_pagination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row product_recentproduct">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg_topicreccent_product">@if(Session::get('lang') == 'th') คุณอาจจะชอบสินค้านี้ @else You may also like @endif</div>
                    <div class="owl-recentproduct owl-carousel owl-theme">
                        @foreach($products_also as $keyalso =>$rproducts_also)
                            <div class="items">
                                <div class="item_productsbest">
                                    @if(getPercent($rproducts_also->price_full, $rproducts_also->price_sale) != 0)
                                    <div class="badge_tag
@if($rproducts_also->color_percent == 1)
                                        pinktag
@elseif($rproducts_also->color_percent == 2)
                                        purpletag
@elseif($rproducts_also->color_percent == 3)
                                        yellowtag
@else
                                        pinktag
@endif">
                                        <div>-{{getPercent($rproducts_also->price_full, $rproducts_also->price_sale)}}%</div>
                                    </div>
                                    @endif
                                    <div class="box_addwishlist">
                                        @if(Session::get('member_id') != '')
                            @php
                            $login_inc_top = DB::table('lv_member')
                            ->where('member_id', '=', Session::get('member_id'))
                            ->first();
                            @endphp
                                        <button 
                                class="{{$rproducts_also->wish_id && ($rproducts->wish_member == Session::get('member_id')) != '' ? 'active' : ''}}"
                                    value="{{$rproducts_also->products_id}}" id="show_{{$rproducts_also->products_id}}"
                                    onclick="show_(this.value)">
                                    <img src="{{asset('/files/frontend/images/icon_wishlist.svg')}}" class="svg" alt="">
                                </button>
                                @endif
                                    </div>
                                    <div>
                                        <div class="product_photosquare_best">
                                            <div class="bestsell_addcart">
                                                <div class="box_bestsell_addcart">
                                                    <a href="{{url('/product_page/'.$rproducts_also->menu_head_pk.'/'.$rproducts_also->products_id)}}"
                                                       class="hover_btn_viewproduct" title="More Detail"><img
                                                            src="{{asset('/files/frontend/images/icon_search.svg')}}"
                                                            alt=""></a>
                                                    {{-- <a href="" id="{{$products->products_id}}" class="hover_btn_addcart btn_addcart"
                                                       title="Add to Cart"><img
                                                            src="{{asset('/files/frontend/images/icon_cart.svg')}}"
                                                            alt=""></a> --}}
                                                </div>
                                            </div>
                                            <figure><img src="{{url($rproducts_also->img_products)}}"
                                                         alt=""></figure>
                                        </div>
                                        <div class="item_productbest">
                                            @if(Session::get('lang') == 'th')
                                                {{$rproducts_also->name_products_thai}}
                                            @else
                                                {{$rproducts_also->name_products_eng}}
                                            @endif
                                        </div>
                                    </div>

                                    @if($rproducts_also->price == null)
                                        <div class="item_productbest_price item_productprice">Price :
                                            <span>฿{{$rproducts_also->price_full}}</span>
                                            <div>฿{{$rproducts_also->price_sale}}</div>
                                        </div>
                                    @else
                                        <div>฿{{$rproducts_also->price}}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.inc_footer')
    @include('frontend.layouts.scriptjs')

</div>
<script>
    /*function insertCart() {
        $.post('<?php echo url("ajaxInsertCart");?>', { products_id: '<?php echo $products_id;?>', qty: $(".quntity-input").val() }, function() {
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
        });
    }*/
</script>
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
        window.location.reload(true);
    }

</script>

</body>

</html>
