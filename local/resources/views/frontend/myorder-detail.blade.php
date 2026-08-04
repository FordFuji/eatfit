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
                     <a href="{{url('/myprofile')}}">Member</a> <span><i class="fas fa-chevron-right"></i></span> <div>My Order</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')
                    
                    <div class="col-12 col-lg-8 wrap_memberorder">
                        <div class="topicbar_member">@if(Session::get('lang') == 'th') คำสั่งซื้อของฉัน @else My Order @endif</div>
                        <div>
                        <div class="member_txtordernum">@if(Session::get('lang') == 'th') หมายเลขคำสั่งซื้อ @else Order Number @endif : <span>{{!empty($order_detail) ? $order_detail->order_no : ''}}</span></div>
                            <div class="bggrey_thx">
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') หมายเลขคำสั่งซื้อ @else Order Number @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">{{!empty($order_detail) ? $order_detail->order_no : ''}}</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') วันที่ @else Date @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">{{$datetime_create}}</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ช่องทางการชำระเงิน @else Payment Method @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">{{!empty($order_detail) ? $order_detail->order_detail_payment_method : ''}}</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') รหัสโปรโมชัน @else Promotion Code @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right"><!-- eatfit2020 -->-</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ส่วนลด @else Discount @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right"><!-- -10%(30) -->{{!empty($order_detail) ? $order_detail->order_detail_discount : ''}} THB</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ค่าจัดส่ง @else Shipping @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">{{!empty($order_detail) ? $order_detail->order_detail_shipping : ''}} THB</div></div>
                                 </div>
                             </div>
                             <div class="box_descpayment">
                                 <div class="cart_topic_shipping">SHIPPING ADDRESS</div>
                                 <div class="box_shipping">
                                    <div class="cart_peoplename">{{!empty($order_detail) ? $order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family : ''}}</div>
                                    <div>
                                        {{!empty($order_detail) ? $order_detail->order_detail_shipping_address.' '.$order_detail->order_detail_shipping_sub_district.' '.$order_detail->order_detail_shipping_district.' '.$order_detail->order_detail_shipping_province.' '.$order_detail->order_detail_shipping_postcode : ''}} <br>
                                        Email :  {{!empty($order_detail) ? $order_detail->order_detail_shipping_email : ''}} <br>
                                        Phone :  {{!empty($order_detail) ? $order_detail->order_detail_shipping_phone_number : ''}}
                                    </div>
                                </div>
                             </div>
                             <div class="box_descpayment">
                                 <div class="cart_topic_shipping">Billing ADDRESS</div>
                                 <div class="box_shipping">
                                    <div class="cart_peoplename">{{!empty($order_detail) ? $order_detail->order_detail_billing_name.' '.$order_detail->order_detail_billing_family : ''}}</div>
                                    <div>
                                        {{!empty($order_detail) ? $order_detail->order_detail_billing_address.' '.$order_detail->order_detail_billing_sub_district.' '.$order_detail->order_detail_billing_district.' '.$order_detail->order_detail_billing_province.' '.$order_detail->order_detail_billing_postcode : ''}} <br>
                                        Email :  {{!empty($order_detail) ? $order_detail->order_detail_billing_email : ''}} <br>
                                        Phone :  {{!empty($order_detail) ? $order_detail->order_detail_billing_phone_number : ''}}
                                    </div>
                                </div>
                             </div>
                             <div class="box_descpayment">
                                 <div class="cart_topic_shipping">SHIPPING delivery</div>
                                 <div class="box_shipping">
                                    <div class="box_descpayment_dt">
                                        <div><i class="far fa-calendar-alt"></i> Date:  {{!empty($order_detail) ? $order_detail->order_detail_shipping_date : ''}} </div>
                                        <div><i class="far fa-clock"></i> Time: {{!empty($order_detail) ? $order_detail->order_detail_shipping_time : ''}}</div>
                                    </div>
                                </div>
                             </div>
                             <div class="member_topic_orderdesc">Order Details</div>
                             <div>
@if(!empty($order))
    @foreach($order as $r)
        @php
        $product = DB::table('products')
            ->where('products_id', '=', $r->products_id)
            ->first();
        @endphp
                                 <div class="cart_itemproduct">
                                     <div class="row">
                                         <div class="col-3 col-sm-2 cart_mbnopad">
                                             <a href="{{!empty($product) ? url('product-page/'.$product->menu_head_pk.'/'.$product->products_id) : ''}}"><img src="{{asset($r->order_image)}}" class="img-fluid" alt=""></a>
                                         </div>
                                         <div class="col-9 col-sm-7">
                                             <div class="cart_pname">{{$r->order_name}}</div>
                                             <div class="order_txtqty">Quantity : {{$r->order_qty}}</div>
                                             <div class="order_txtprice">{{number_format($r->order_price, 2, '.', ',')}} THB</div>
                                         </div>
                                         <div class="col-12 col-sm-3">
                                             <a href="{{url('page-reviews')}}" class="btnreview">review <i class="fas fa-star"></i></a>
                                         </div>
                                     </div>
                                 </div>
    @endforeach
@endif
                                <!-- <div class="cart_itemproduct">
                                     <div class="row">
                                         <div class="col-3 col-sm-2 cart_mbnopad">
                                             <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                         </div>
                                         <div class="col-9 col-sm-7">
                                             <div class="cart_pname">Choize - Chocolate</div>
                                             <div class="order_txtqty">Quantity : 1</div>
                                             <div class="order_txtprice">65.00 THB</div>
                                         </div>
                                         <div class="col-12 col-sm-3">
                                             <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="cart_itemproduct">
                                     <div class="row">
                                         <div class="col-3 col-sm-2 cart_mbnopad">
                                             <a href="product-page.php"><img src="images/photo_product1_03.jpg" class="img-fluid" alt=""></a>
                                         </div>
                                         <div class="col-9 col-sm-7">
                                             <div class="cart_pname">Choize - Chocolate</div>
                                             <div class="order_txtqty">Quantity : 1</div>
                                             <div class="order_txtprice">65.00 THB</div>
                                         </div>
                                         <div class="col-12 col-sm-3">
                                             <a href="page-reviews.php" class="btnreview">review <i class="fas fa-star"></i></a>
                                         </div>
                                     </div>
                                 </div>
                             </div> -->
                             <div class="ordersum_border"> 
                                 <div class="row">
                                     <div class="col-6 nopad"><span class="order_totalsum topic2_ordersum">TOTAL</span></div>
                                     <div class="col-6 nopad text-right order_totalsum">{{!empty($order_detail) ? $order_detail->order_detail_total : ''}} THB</div>
                                 </div> 
                                 <div class="row">
                                     <div class="col-6 nopad"><span class="topic2_ordersum txt_pink"><img src="{{asset('files/frontend/images/icon_eatfit_king.svg')}}" class="icon_kingpink" alt=""> points earned</span></div>
                                     <div class="col-6 nopad text-right txt_pink">{{!empty($member) ? $member->member_point : 0}} POINTS</div>
                                 </div>
                             </div>
                        </div>
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
