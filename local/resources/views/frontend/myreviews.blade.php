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
                     <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> 
                     <a href="{{url('/myprofile')}}">@if(Session::get('lang') == 'th') สมาชิก @else Member @endif</a> <span><i class="fas fa-chevron-right"></i></span> <div>@if(Session::get('lang') == 'th') รีวิว @else Review @endif</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')
                    
                    <div class="col-12 col-lg-8 wrap_memberorder">
                        <div class="topicbar_member">@if(Session::get('lang') == 'th') รีวิว @else Review @endif</div>
                        <div>
                            @if(!empty($order_detail))
                            @foreach ($order_detail as $r)
                            @php
        $date = explode(' ', $r->order_detail_datetime_create);
        
        $date = explode('-', $date[0]);

        $product = DB::table('products')
            ->join('lv_order', 'products.products_id', '=', 'lv_order.products_id')
            ->where('lv_order.order_detail_id', '=', $r->order_detail_id)
            ->orderBy('lv_order.order_id', 'asc')
            ->get();
        @endphp
         @if(!empty($product))
         @foreach($product as $p)
                            <div class="cart_itemproduct">
                                <div class="row">
                                    <div class="col-3 col-sm-2 cart_mbnopad">
                                       
                                        <a href="{{url('product_page/'.$p->menu_head_pk.'/'.$p->products_id)}}">
                                            <img src="{{asset($p->img_products)}}" class="img-fluid" alt=""></a>
                                            
                                    </div>
                                    <div class="col-9 col-sm-7">
                                        <div class="cart_pname">{{$p->name_products_thai}}</div>
                                        <div class="order_txtprice">
                                            @if($p->price == null)
                                            @if(Session::get('lang') == 'th') ราคา @else Price @endif : <span>฿{{$p->price_full}}</span>
                                            <div>{{$p->price_sale}}</div>
                                            @else
                                            <div>{{$p->price}}</div>
                                            @endif @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                        
                                        <div class="review_orderdate">@if(Session::get('lang') == 'th') วันที่ทำการสั่งซื้อ {{$date[2].'/'.$date[1].'/'}}{{ $date[0] + 543 }} @else Order Date:  {{$date[2].'/'.$date[1].'/'.$date[0]}} @endif</div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        @php
                                            $reviewAT = DB::table('tb_review')
                                                     // leftJoin('tb_review_file', 'tb_review.review_id', '=', 'tb_review_file.review_file_main')
                                                        // ->leftJoin('products', 'tb_review.review_menu', '=', 'products.products_id')
                                                        // ->leftJoin('lv_member', 'tb_review.review_member', '=', 'lv_member.member_id')
                                                        ->where('review_menu', $p->products_id)
                                                        ->where('review_member', Session::get('member_id'))
                                                        ->where('review_orderno', $r->order_detail_id)
                                                        ->first();
                                        @endphp
                                        {{-- {{dd($r->order_detail_status)}} --}}
                                        @if ($r->order_detail_status ==  'Waiting for Payment')

                                        @elseif ( $r->order_detail_status ==  'Order Canceled')

                                        @elseif ( $r->order_detail_status ==  'Order Processing')
                                            @if ( $reviewAT  == '' )
                                            <a href="{{url('/page_reviews/'.$p->products_id,$r->order_detail_id)}}" class="btnreview">review <i class="fas fa-star"></i></a>
                                            @else
                                            <a href="{{url('/page_reviewsSEE/'.$p->products_id,$r->order_detail_id)}}" class="btnreview">VIEW  <i class="fas fa-star"></i></a>
                                            @endif 
                                        @elseif ( $r->order_detail_status ==  'Shipped')
                                            @if ( $reviewAT  == '' )
                                            <a href="{{url('/page_reviews/'.$p->products_id,$r->order_detail_id)}}" class="btnreview">review <i class="fas fa-star"></i></a>
                                            @else
                                            <a href="{{url('/page_reviewsSEE/'.$p->products_id,$r->order_detail_id)}}" class="btnreview">VIEW  <i class="fas fa-star"></i></a>
                                            @endif 
                                        @elseif ( $r->order_detail_status ==  'Delivered')
                                            @if ( $reviewAT  == '' )
                                            <a href="{{url('/page_reviews/'.$p->products_id,$r->order_detail_id)}}" class="btnreview">review <i class="fas fa-star"></i></a>
                                            @else
                                            <a href="{{url('/page_reviewsSEE/'.$p->products_id,$r->order_detail_id)}}" class="btnreview">VIEW  <i class="fas fa-star"></i></a>
                                            @endif 
                                        @else

                                        @endif
                                        
                                        {{-- @if ( $reviewAT  == '' )
                                        <a href="{{url('/page_reviews/'.$p->products_id,$r->order_detail_id)}}" class="btnreview">review <i class="fas fa-star"></i></a>
                                        @else
                                        <a href="{{url('/page_reviewsSEE/'.$p->products_id,$r->order_detail_id)}}" class="btnreview">VIEW  <i class="fas fa-star"></i></a>
                                        @endif  --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                             {{-- <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-7">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="order_txtprice">65.00 THB</div>
                                         <div class="review_orderdate">Order Date:  19/09/2020</div>
                                     </div>
                                     <div class="col-12 col-sm-3">
                                         <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                     </div>
                                 </div>
                             </div>
                             <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-7">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="order_txtprice">65.00 THB</div>
                                         <div class="review_orderdate">Order Date:  19/09/2020</div>
                                     </div>
                                     <div class="col-12 col-sm-3">
                                         <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                     </div>
                                 </div>
                             </div>
                             <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-7">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="order_txtprice">65.00 THB</div>
                                         <div class="review_orderdate">Order Date:  19/09/2020</div>
                                     </div>
                                     <div class="col-12 col-sm-3">
                                         <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                     </div>
                                 </div>
                             </div>
                             <div class="cart_itemproduct">
                                 <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-7">
                                         <div class="cart_pname">Choize - Chocolate</div>
                                         <div class="order_txtprice">65.00 THB</div>
                                         <div class="review_orderdate">Order Date:  19/09/2020</div>
                                     </div>
                                     <div class="col-12 col-sm-3">
                                         <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                     </div>
                                 </div>
                             </div> --}}
                        </div>
                    </div>
                </div>
            </div>
		</section>
		
		
		
        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')
		
		<script>
            $(".menu_account_left > ul > li:nth-child(6) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
