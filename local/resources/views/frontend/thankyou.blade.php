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
                     <a href="{{url('index')}}"><img src="{{asset('files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="{{url('cart')}}">My Cart</a> <span><i class="fas fa-chevron-right"></i></span> <a href="{{url('cart-shipping')}}">Shipping</a> <span><i class="fas fa-chevron-right"></i></span> <a href="{{url('cart-payment')}}">Payment</a> <span><i class="fas fa-chevron-right"></i></span> <div>Thank You</div>
                 </div>
		    </div>
		</section>
		
		<section class="row">
		    <div class="container">
		        <div class="row page_cartlogin">
                     <div class="col-12 nopad">
                         <div class="wrap_thx">
                             <div class="wrap_frm_register form_cartlogin">
                                <div class="topic_bgpurple thx_bggreen">
                                     <div class="topic_cartinfo">Thank You</div>
                                     <div class="subtopic_cartinfo">YOUR ORDER HAS BEEN CONFIRMED.</div>
                                 </div>
                                 <div class="bggrey_thx">
                                     <div class="row">
                                         <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') หมายเลขคำสั่งซื้อ @else Order Number @endif</div></div>
                                         <div class="col-7 col-sm-6"><div class="txt-right">{{$order_detail->order_no}}</div></div>
                                     </div>
                                     <div class="row">
                                         <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') วันที่ @else Date @endif</div></div>
                                         <div class="col-7 col-sm-6"><div class="txt-right">{{date('d/m/Y')}}</div></div>
                                     </div>
                                     <div class="row">
                                         <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ช่องทางการชำระเงิน @else Payment Method @endif</div></div>
                                        <div class="col-7 col-sm-6"><div class="txt-right">
                                        @if(Session::get('lang') == 'th' and $order_detail->order_detail_payment_method == 'Credit Card')
                                            เครดิต การ์ด
                                        @elseif(Session::get('lang') == 'th' and $order_detail->order_detail_payment_method == 'QR Code')
                                            คิวอาร์โค้ด
                                        @elseif(Session::get('lang') == 'th' and $order_detail->order_detail_payment_method == 'Unionpay')
                                            ยูเนียน เพย์
                                        @elseif(Session::get('lang') == 'en' and $order_detail->order_detail_payment_method == 'Credit Card')
                                            Credit Card
                                        @elseif(Session::get('lang') == 'en' and $order_detail->order_detail_payment_method == 'QR Code')
                                            QR Code
                                        @elseif(Session::get('lang') == 'en' and $order_detail->order_detail_payment_method == 'Unionpay')
                                            Unionpay
                                        @elseif(Session::get('lang') == 'th' and $order_detail->order_detail_payment_method == 'ATM / Internet Banking')
                                            โอนเงินผ่านธนาคาร
                                        @elseif(Session::get('lang') == 'en' and $order_detail->order_detail_payment_method == 'ATM / Internet Banking')
                                            ATM / Internet Banking
                                        @endif
                                        </div></div>
                                     </div>
                                     <div class="row">
                                         <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') รหัสโปรโมชัน @else Promotion Code @endif : </div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">@if(!empty($order_detail) and $order_detail->order_detail_promotion_15000_before_3_person == 'Yes')Buy 15,000 The first 3 people get apple watch @else - @endif</div></div>
                                     </div>
                                     <div class="row">
                                        <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') โปรโมชัน @else Promotion @endif</div></div>
                                        <div class="col-7 col-sm-6"><div class="txt-right"><!-- eatfit2020 -->-</div></div>
                                    </div>
                                     <div class="row">
                                         <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ส่วนลด @else Discount @endif : </div></div>
                                         <div class="col-7 col-sm-6"><div class="txt-right"><!-- -10%(30) -->{{number_format($order_detail->order_detail_discount, 2, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div></div>
                                     </div>
                                     <div class="row">
                                         <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ค่าจัดส่ง @else Shipping @endif : </div></div>
                                         <div class="col-7 col-sm-6"><div class="txt-right">{{number_format($order_detail->order_detail_shipping, 0, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div></div>
                                     </div>
                                 </div>
                                 
                                 <div class="box_descpayment">
                                     <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') ที่อยู่สำหรับจัดส่ง @else SHIPPING ADDRESS @endif</div>
                                     <div class="box_shipping">
                                        <div class="cart_peoplename">{{$order_detail->order_detail_shipping_name.' '.$order_detail->order_detail_shipping_family}}</div>
                                        <div>
                                            {{$order_detail->order_detail_shipping_address.' '.$order_detail->order_detail_shipping_sub_district.' '.$order_detail->order_detail_shipping_district.' '.$order_detail->order_detail_shipping_province.' '.$order_detail->order_detail_shipping_postcode}} <br>
                                            @if(Session::get('lang') == 'th') อีเมล์ @else Email @endif :  {{$order_detail->order_detail_shipping_email}} <br>
                                            @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone @endif :  {{$order_detail->order_detail_shipping_phone_number}}
                                        </div>
                                    </div>
                                 </div>
                                 <div class="box_descpayment">
                                     <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') ทีอยู่การเรียกเก็บเงิน @else Billing ADDRESS @endif</div>
                                     <div class="box_shipping">
                                        <div class="cart_peoplename">{{$order_detail->order_detail_billing_name.' '.$order_detail->order_detail_billing_family}}</div>
                                        <div>
                                            {{$order_detail->order_detail_billing_address.' '.$order_detail->order_detail_billing_sub_district.' '.$order_detail->order_detail_billing_district.' '.$order_detail->order_detail_billing_province.' '.$order_detail->order_detail_billing_postcode}} <br>
                                            @if(Session::get('lang') == 'th') อีเมล์ @else Email @endif :  {{$order_detail->order_detail_billing_email}} <br>
                                            @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone @endif :  {{$order_detail->order_detail_billing_phone_number}}
                                        </div>
                                    </div>
                                 </div>
                                 <div class="box_descpayment">
                                            @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone @endif :  {{$order_detail->order_detail_billing_phone_number}}
                                     <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') การจัดส่งและการขนส่ง @else SHIPPING delivery @endif</div>
                                     <div class="box_shipping">
                                        <div class="box_descpayment_dt">
                                            <div><i class="far fa-calendar-alt"></i> @if(Session::get('lang') == 'th') วันที่ @else Date @endif: {{getDateDatabase2DateDotDot2($order_detail->order_detail_shipping_date)}} </div>
                                            <div><i class="far fa-clock"></i> @if(Session::get('lang') == 'th') เวลา @else Time @endif: {{$order_detail->order_detail_shipping_time}}</div>
                                        </div>
                                    </div>
                                 </div>
                                 
                                 <div class="thx_topicorder">@if(Session::get('lang') == 'th') รายละเอียดคำสั่งซื้อ @else Order Details @endif</div>
                                 
                                 <div class="thx_bordertopic">
                                     <div class="row">
                                         <div class="col-6">@if(Session::get('lang') == 'th') สินค้า @else PRODUCT @endif</div>
                                         <div class="col-3 text-center">@if(Session::get('lang') == 'th') จำนวน @else QUANTITY @endif</div>
                                         <div class="col-3">@if(Session::get('lang') == 'th') ราคา @else PRICE @endif</div>
                                     </div>
                                 </div>
                                 <div class="thx_boxtableorder">
@php
$all_calories = 0;
@endphp
@if(!empty($order))
    @foreach($order as $r)
        @php
        $all_calories += $r->order_calories;
        @endphp
                                <div class="cart_itemproduct">
                                     <div class="row">
                                         <div class="col-12 col-md-6">
                                             <div class="row">
                                                 <div class="col-3 cart_mbnopad">
                                                     <a href="{{url('product-page/'.$r->products_id)}}"><img src="{{asset($r->order_image)}}" class="img-fluid" alt=""></a>
                                                 </div>
                                                 <div class="col-9">
                                                     <div class="cart_pname">{{$r->order_name}}</div>
                                                     <div>Calories {{$r->order_calories}}</div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-9 offset-3 col-md-3 offset-md-0 text-center">
        @php
        if($r->product_redeem == 'Redeem Point') {
        @endphp
                                             <div class="thx_boxqty"><span>@if(Session::get('lang') == 'th') จำนวน @else QUANTITY @endif :</span> 1</div>
        @php
        } else {
        @endphp
                                            <div class="thx_boxqty"><span>@if(Session::get('lang') == 'th') จำนวน @else QUANTITY @endif :</span> {{$r->order_qty}}</div>
        @php
        }
        @endphp
                                        </div>
                                         <div class="col-9 offset-3 col-md-3 offset-md-0">
        @php
        if($r->product_redeem == 'Redeem Point') {
        @endphp
                                            <div class="thx_cartprice cart_price"><div>@if(Session::get('lang') == 'th') ราคา @else PRICE @endif :</div> {{number_format(0, 2, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
        @php
        } else {
        @endphp
                                            <div class="thx_cartprice cart_price"><div>@if(Session::get('lang') == 'th') ราคา @else PRICE @endif :</div> {{number_format($r->order_price, 2, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
        @php
        } 
        @endphp
                                         </div>
                                     </div>
                                 </div>
    @endforeach
@endif           
                                     <div class="thx_sumtotal cart_itemproduct">
                                         <div class="row">
                                             <div class="col-6">@if(Session::get('lang') == 'th') พลังงานทั้งหมด @else Total Calories @endif</div>
                                             <div class="col-6 text-right">{{number_format($all_calories, 0, '.', ',')}}</div>
                                         </div>
                                         <div class="row thx_sumtotal_topic">
                                             <div class="col-6">@if(Session::get('lang') == 'th') ยอดรวมสุทธิ @else TOTAL @endif</div>
                                             <div class="col-6 text-right">{{number_format($order_detail->order_detail_total, 0, '.', ',')}} @if(Session::get('lang') == 'th') บาท @else THB @endif</div>
                                         </div>
                                         <div class="row">
                                             <div class="col-12"><span>@if(Session::get('lang') == 'th') รวมภาษีมูลค่าเพิ่ม @else vat included @endif</span></div>
                                         </div>
                                     </div>
                                     <div class="thx_sumtotal_border cart_boxborder_btn">
                                          <div class="row">
                                              <div class="col-12 col-lg-5 col-xl-7"></div>
                                              <div class="col-12 col-lg-7 col-xl-5">
                                                  <div class="row box_btncart_a">
                                                    @if($order_detail->order_detail_payment_method == 'ATM / Internet Banking') 
                                                      <div class="col-7 col-sm-6">
                                                           <a href="{{url('index')}}" class="btn_default btn_brown">@if(Session::get('lang') == 'th') ย้อนกลับ @else back to home @endif</a>
                                                      </div>
                                                      <div class="col-5 col-sm-6">
                                                          <a href="{{url('myorder')}}" class="btn_default btn_green test_trigger">@if(Session::get('lang') == 'th') อัพโหลดสลิป @else upload slip @endif</a>
                                                      </div>
                                                    @else
                                                        <div class="col-7 col-sm-6">
                                                            
                                                        </div>
                                                        <div class="col-5 col-sm-6">
                                                            <a href="{{url('index')}}" class="btn_default btn_brown">@if(Session::get('lang') == 'th') ย้อนกลับ @else back to home @endif</a>
                                                        </div>
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
		    </div>
		</section>
		
		
		@include('frontend.layouts.inc_footer')
		@include('frontend.layouts.scriptjs')
		
	</div>
<!-- Event snippet for Example conversion page -->
    <script>
     gtag('event', 'conversion', {"C_11bHPBSaIu0": { "on": "visible", "vars": { "event_name": "conversion", "value": "<?php echo $order_detail->order_detail_total;?>", "currency": "THB", "transaction_id": "<?php echo $order_detail->order_no;?>", "send_to": ["AW-452802633/GZkZCJr62e8BEMnw9NcB"] }}});
    </script>
</body>

</html>
