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
                     <a href="{{url('/myprofile')}}">@if(Session::get('lang') == 'th') สมาชิก @else Member @endif</a> <span><i class="fas fa-chevron-right"></i></span> <div>@if(Session::get('lang') == 'th') คำสั่งซื้อของฉัน @else My Order @endif</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')
                    
                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member">@if(Session::get('lang') == 'th') คำสั่งซื้อของฉัน @else My Order @endif</div>
@if(!empty($order_detail))
    @foreach($order_detail as $r)
        @php
        $date = explode(' ', $r->order_detail_datetime_create);
        
        $date = explode('-', $date[0]);

        $product = DB::table('products')
            ->join('lv_order', 'products.products_id', '=', 'lv_order.products_id')
            ->where('lv_order.order_detail_id', '=', $r->order_detail_id)
            ->orderBy('lv_order.order_id', 'asc')
            ->first();
        @endphp
                        <div class="item_myorder">
                            <div class="topic_member_border">
                                <div class="row">
                                    <div class="col-12 col-lg-7">
                                        @if(Session::get('lang') == 'th') หมายเลขคำสั่งซื้อ @else Order Number @endif : <span>{{$r->order_no}}</span>
                                    </div>
                                    <div class="col-12 col-lg-5">
        @if(Session::get('lang') == 'th')
            @php
            $year = $date[0] + 543;        
            @endphp
        @else 
            @php
            $year = $date[0];
            @endphp
        @endif
                                        <div class="myorder_date">@if(Session::get('lang') == 'th') วันที่ @else Date @endif : {{$date[2].'/'.$date[1].'/'.$year}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="myorder_bggrey">
                                <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                    @if(!empty($product))
                                        {{-- @foreach($product as $p) --}}
                                        <a href="{{url('product_page/'.$product->menu_head_pk.'/'.$product->products_id)}}"><img src="{{asset($product->img_products)}}" class="img-fluid" alt=""></a>
                                        {{-- @endforeach --}}
                                    @endif
                                     </div>
                                     <div class="col-9 col-sm-10">
                                         <div class="desc_myorder">
                                             <span>@if(Session::get('lang') == 'th') สถานะ @else Status @endif : </span> 
                                             @if(Session::get('lang') == 'th')
                                                @if($r->order_detail_status == 'Waiting for Payment') 
                                                    รอการชำระเงิน
                                                @elseif($r->order_detail_status == 'Order Processing')
                                                    กำลังดำเนินการ
                                                @elseif($r->order_detail_status == 'Shipped')
                                                    กำลังจัดส่ง
                                                @elseif($r->order_detail_status == 'Delivered')
                                                    ได้ดำเนินการจัดส่งแล้ว
                                                @elseif($r->order_detail_status == 'Complete')
                                                    การสั่งซื้อสมบูรณ์
                                                @elseif($r->order_detail_status == 'Order Canceled')
                                                    ยกเลิกการสั่งซื้อ
                                                @endif
                                             @else 
                                                {{ $r->order_detail_status }}
                                             @endif
                                             @if ($r->order_detail_status == 'Waiting for Payment' || $r->order_detail_status == 'Waiting for Payment')
                                             <a href="{{url('/myorder_uploadslip',$r->order_detail_id)}}" class="btn_payment_purple">@if(Session::get('lang') == 'th') ชำระเงิน @else payment @endif</a>
                                             @else
                                                 
                                             @endif
                                             
                                         </div>
                                         <div class="desc_myorder">
                                             <span>@if(Session::get('lang') == 'th') ยอดรวม @else Total @endif : </span> {{number_format($r->order_detail_total, 0, '.', ',')}} THB
                                         </div>
                                         <a href="{{url('/myorder_detail',$r->order_detail_id)}}" class="btn_orderdesc">@if(Session::get('lang') == 'th') รายละเอียดคำสั่งซื้อ @else Order Detail @endif</a>
                                     </div>
                                 </div>
                            </div>
                        </div>
    @endforeach
@endif
                        <!-- <div class="item_myorder">
                            <div class="topic_member_border">
                                <div class="row">
                                    <div class="col-12 col-lg-7">
                                         Order Number : <span>EATFIT62100000000015</span>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="myorder_date">Date :   19/09/2019</div>
                                    </div>
                                </div>
                            </div>
                            <div class="myorder_bggrey">
                                <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-10">
                                         <div class="desc_myorder">
                                             <span>Status : </span> Order Processing
                                         </div>
                                         <div class="desc_myorder">
                                             <span>Total : </span> 650 THB
                                         </div>
                                         <a href="myorder-detail.php" class="btn_orderdesc">Order Detail</a>
                                     </div>
                                 </div>
                            </div>
                        </div>
                        
                        <div class="item_myorder">
                            <div class="topic_member_border">
                                <div class="row">
                                    <div class="col-12 col-lg-7">
                                         Order Number : <span>EATFIT62100000000015</span>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="myorder_date">Date :   19/09/2019</div>
                                    </div>
                                </div>
                            </div>
                            <div class="myorder_bggrey">
                                <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-10">
                                         <div class="desc_myorder">
                                             <span>Status : </span> Delivered
                                         </div>
                                         <div class="desc_myorder">
                                             <span>Total : </span> 650 THB
                                         </div>
                                         <a href="myorder-detail.php" class="btn_orderdesc">Order Detail</a>
                                     </div>
                                 </div>
                            </div>
                        </div>
                        
                        <div class="item_myorder">
                            <div class="topic_member_border">
                                <div class="row">
                                    <div class="col-12 col-lg-7">
                                         Order Number : <span>EATFIT62100000000015</span>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="myorder_date">Date :   19/09/2019</div>
                                    </div>
                                </div>
                            </div>
                            <div class="myorder_bggrey">
                                <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-10">
                                         <div class="desc_myorder">
                                             <span>Status : </span> Delivered
                                         </div>
                                         <div class="desc_myorder">
                                             <span>Total : </span> 650 THB
                                         </div>
                                         <a href="myorder-detail.php" class="btn_orderdesc">Order Detail</a>
                                     </div>
                                 </div>
                            </div>
                        </div>
                        
                        <div class="item_myorder">
                            <div class="topic_member_border">
                                <div class="row">
                                    <div class="col-12 col-lg-7">
                                         Order Number : <span>EATFIT62100000000015</span>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="myorder_date">Date :   19/09/2019</div>
                                    </div>
                                </div>
                            </div>
                            <div class="myorder_bggrey">
                                <div class="row">
                                     <div class="col-3 col-sm-2 cart_mbnopad">
                                         <a href="product-page.php"><img src="{{asset('/files/frontend/images/photo_product1_03.jpg')}}" class="img-fluid" alt=""></a>
                                     </div>
                                     <div class="col-9 col-sm-10">
                                         <div class="desc_myorder">
                                             <span>Status : </span> Order Canceled
                                         </div>
                                         <div class="desc_myorder">
                                             <span>Total : </span> 650 THB
                                         </div>
                                         <a href="myorder-detail.php" class="btn_orderdesc">Order Detail</a>
                                     </div>
                                 </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
		</section>
		
		
		
		@include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')
		
		<script>
            $(".menu_account_left > ul > li:nth-child(4) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
