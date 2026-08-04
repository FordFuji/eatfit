<!doctype html>
<html>

<head>
	@include('frontend/layouts/inc_head')
</head>

<body class="loading working">

	<div class="container-fluid footer_notop">
	
		@include('frontend/layouts/inc_menu')

		<section class="row">
		    <div class="container">
                 <div class="row wrap_navigationbar">
                     <a href="{{url('index')}}"><img src="{{asset('files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="{{url('cart')}}">@if(Session::get('lang') == 'th') ตระกร้าสินค้า @else My Cart @endif</a> <span><i class="fas fa-chevron-right"></i></span> <a href="{{url('cart-shipping')}}">@if(Session::get('lang') == 'th') การจัดส่ง @else Shipping @endif</a> <span><i class="fas fa-chevron-right"></i></span> <div>@if(Session::get('lang') == 'th') การชำระเงิน @else Payment @endif</div>
                 </div>
		    </div>
		</section>
		
		<section class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="cart_bggreen_topic cart_purple_topic">
                             <img src="{{asset('files/frontend/images/icon_money.svg')}}" alt=""> <div>@if(Session::get('lang') == 'th') การชำระเงิน @else Payment @endif</div>
                         </div>

                         <div class="box_cart_shipping">
                             <div class="box_descpayment">
                                 <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') ที่อยู่สำหรับจัดส่ง @else SHIPPING ADDRESS @endif</div>
                                 <div class="box_shipping">
                                    <div class="cart_peoplename">{{Session::get('order_detail_shipping_name').' '.Session::get('order_detail_shipping_family')}}</div>
                                    <div>
                                        {{Session::get('order_detail_shipping_address').', '.Session::get('order_detail_shipping_sub_district').', '.Session::get('order_detail_shipping_district').', '.Session::get('order_detail_shipping_province').', '.Session::get('order_detail_shipping_postcode')}} <br>
                                        @if(Session::get('lang') == 'th') อีเมล์ @else Email @endif :  {{Session::get('order_detail_shipping_email')}} <br>
                                        @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone @endif :  {{Session::get('order_detail_shipping_phone_number')}}
                                    </div>
                                    <!-- <div class="cart_iconedit"><a href="shipping_address.php"><i class="fas fa-edit"></i> Edit</a></div> -->
                                </div>
                             </div>
                             <div class="box_descpayment">
                                 <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') ที่อยู่การเรียกเก็บเงิน @else Billing ADDRESS @endif</div>
                                 <div class="box_shipping">
                                    <div class="cart_peoplename">{{Session::get('order_detail_billing_name').' '.Session::get('order_detail_billing_family')}}</div>
                                    <div>
                                        {{Session::get('order_detail_billing_address').', '.Session::get('order_detail_billing_sub_district').', '.Session::get('order_detail_billing_district').', '.Session::get('order_detail_billing_province').', '.Session::get('order_detail_billing_postcode')}} <br>
                                        @if(Session::get('lang') == 'th') อีเมล์ @else Email @endif :  {{Session::get('order_detail_billing_email')}} <br>
                                        @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone @endif :  {{Session::get('order_detail_billing_phone_number')}}
                                    </div>
                                    <!-- <div class="cart_iconedit"><a href="shipping_address.php"><i class="fas fa-edit"></i> Edit</a></div> -->
                                </div>
                             </div>
                             <div class="box_descpayment">
                                 <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') การขนส่ง @else SHIPPING delivery @endif</div>
                                 <div class="box_shipping">
                                    <div class="box_descpayment_dt">
                                        <div><i class="far fa-calendar-alt"></i> @if(Session::get('lang') == 'th') วันที่ @else date @endif:  {{getDateDatabase2DateDotDot2(Session::get('order_detail_shipping_date'))}} </div>
                                        <div><i class="far fa-clock"></i> @if(Session::get('lang') == 'th') เวลา @else Time @endif: {{Session::get('order_detail_shipping_time')}}</div>
                                    </div>
                                    <!-- <div class="cart_iconedit"><a href="cart-shipping.php"><i class="fas fa-edit"></i> Edit</a></div> -->
                                </div>
                             </div>
@if(Session::get('order_detail_shipping_date2') != '' or Session::get('order_detail_shipping_time2') != '')
                             <div class="box_descpayment">
                                <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') การจัดส่งสินค้า @else SHIPPING delivery @endif</div>
                                <div class="box_shipping">
                                   <div class="box_descpayment_dt">
                                       <div><i class="far fa-calendar-alt"></i> @if(Session::get('lang') == 'th') วันที่ @else date @endif:  {{getDateDatabase2DateDotDot2(Session::get('order_detail_shipping_date2'))}} </div>
                                       <div><i class="far fa-clock"></i> @if(Session::get('lang') == 'th') เวลา @else Time @endif: {{Session::get('order_detail_shipping_time2')}}</div>
                                   </div>
                                   <!-- <div class="cart_iconedit"><a href="cart-shipping.php"><i class="fas fa-edit"></i> Edit</a></div> -->
                               </div>
                            </div>
@endif

@if(Session::get('order_detail_shipping_date3') != '' or Session::get('order_detail_shipping_time3') != '')
                             <div class="box_descpayment">
                                <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') การจัดส่งสินค้า @else SHIPPING delivery @endif</div>
                                <div class="box_shipping">
                                   <div class="box_descpayment_dt">
                                       <div><i class="far fa-calendar-alt"></i> @if(Session::get('lang') == 'th') วันที่ @else date @endif:  {{getDateDatabase2DateDotDot2(Session::get('order_detail_shipping_date3'))}} </div>
                                       <div><i class="far fa-clock"></i> @if(Session::get('lang') == 'th') เวลา @else Time @endif: {{Session::get('order_detail_shipping_time3')}}</div>
                                   </div>
                                   <!-- <div class="cart_iconedit"><a href="cart-shipping.php"><i class="fas fa-edit"></i> Edit</a></div> -->
                               </div>
                            </div>
@endif
                         </div>

                         <div class="box_billingaddress">
                             <div class="box_descpayment">
                                <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') วิธีการชำระเงิน @else Payment Method @endif</div>
                                <div class="box_shipping">
                                   <div class="box_descpayment_dt">
                                       <div>
                                        @if(Session::get('lang') == 'th')
                                           @if(Session::get('order_detail_payment_method') == 'Credit Card')
                                                บัตรเครดิต
                                           @elseif(Session::get('order_detail_payment_method') == 'QR Code')
                                                คิวอาร์โค้ด (โมบาย แบงก์กิ้ง)
                                           @elseif(Session::get('order_detail_payment_method') == 'Unionpay')
                                                ยูเนียนเพย์
                                           @endif
                                        @else 
                                            {{Session::get('order_detail_payment_method')}}
                                        @endif
                                        </div>
                                   </div>
                                   <!-- <div class="cart_iconedit"><a href="cart-shipping.php"><i class="fas fa-edit"></i> Edit</a></div> -->
                               </div>
                            </div>
                            <!-- <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="otherdelivery" type="radio" name="shipdelivery" rel="w_delivery" disabled>
                                <label for="otherdelivery">Credit Card</label>
                            </div>
                            <div class="w_delivery w_paymentbank">
                                <div class="icon_visa"><img src="{{asset('files/frontend/images/icon_visa_03.png')}}" alt=""></div>
                                <div class="row form_cartlogin">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Card Number</label>
                                            <input class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Name on Card</label>
                                            <input class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Expiration Date (MM / YY)</label>
                                            <input class="form-control form-control-lg" placeholder="MM/YY">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Security Code</label>
                                            <input class="form-control form-control-lg">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                         </div>

                    </div>
                
                <div class="col-12 col-lg-5">
                    @include('frontend/inc_summarycart')
                </div>
                
                </div>
                
                <div class="col-12">
                    <div class="cart_boxborder_btn">
                      <div class="row">
                          <div class="col-12 col-lg-5 col-xl-7"></div>
                          <div class="col-12 col-lg-7 col-xl-5">
                              <div class="row box_btncart_a">
                                  <div class="col-7 col-sm-6">
                                       <a href="{{url('cart-shipping')}}" class="btn_default btn_brown">@if(Session::get('lang') == 'th') ย้อนกลับ @else back @endif</a>
                                  </div>
                                  <div class="col-5 col-sm-6 div_check_payment_method">
@php
//dd(Session::all());
$sub_total = 0;
$order_discount = 0;
  foreach(ShoppingCart::all() as $r) {
    if($r->redeem_point != 'Redeem Point') {
      $price = $r->qty * $r->price;

      $sub_total += $price;
    }
  }

  if(Session::get('promotion') == 'Promotion eatfit') {
      if(Session::get('promotion_by_product_free_shipping') != true) {
        $promotion_complete = DB::table('lv_promotion_complete')
            ->where('promotion_complete_id', '=', '1')
            ->first();
        if(!empty($promotion_complete)) {
            $order_discount = $sub_total * $promotion_complete->promotion_complete_discount / 100;
            if($promotion_complete->promotion_complete_free_shipping == 'Yes') {
            session(['order_detail_shipping' => '0']);
            }
        }
      }
  } else {
      $order_discount = 0;
  }

  if(Session::get('promocode_frontend_discount') != 0 or Session::get('promocode_frontend_discount') != 0.00 or Session::get('promocode_frontend_discount') != '') {
      $order_discount += Session::get('promocode_frontend_discount');
  }

  if(!empty(Session::get('discount_point_redeem'))) {
      $order_discount += Session::get('discount_point_redeem');
  }

  $order_detail_total = $sub_total + Session::get('order_detail_shipping') - $order_discount;

  //dd($order_detail_total);
@endphp
@if(Session::get('order_detail_payment_method') == 'ATM / Internet Banking')
                                      <a href="javascript:checkout();" class="btn_default btn_green">continue</a>
@elseif(Session::get('order_detail_payment_method') == 'Credit Card')
                                      <form method="post" action="{{url('responseMCC')}}">
                                          @csrf
                                          <script type="text/javascript" 
                                              src="{{$src}}"
                                              data-apikey="{{$key}}"
                                              data-amount="{{$order_detail_total}}"
                                              data-currency="THB"
                                              data-payment-methods="card"
                                              data-mid={{$mcc_mid}}
                                              data-show-button="false"
                                          >
                                          </script>
                                          <input type="hidden" name="amount" value="{{$order_detail_total}}">
                                          <input type="hidden" name="paymentmethod" value="card">
                                          <input type="hidden" name="product" value="Order eatfit">
                                          <input type="hidden" name="mid" value="{{$mcc_mid}}">
                                          <input type="hidden" name="order_no" value="{{$order_no}}">
                                          <input type="button" value="@if(Session::get('lang') == 'th') ดำเนินการต่อ @else continue @endif" class="btn_default btn_green" onclick="checkout();">
                                      </form>
@elseif(Session::get('order_detail_payment_method') == 'QR Code')
                                      <form method="POST" action="{{url('responseQRCode')}}">                                          @csrf
                                          <script type="text/javascript"
                                              src="{{$src}}"
                                              data-apikey="{{$key}}"
                                              data-amount ="{{$order_detail_total}}"
                                              data-payment-methods="qr"
                                              data-order-id="{{$order_id}}"
                                              data-show-button="false"
                                          ></script>
                                          <input type="hidden" name="amount" value="{{$order_detail_total}}">
                                          <input type="hidden" name="order_no" value="{{$order_no}}">
                                          <input type="button" value="@if(Session::get('lang') == 'th') ดำเนินการต่อ @else continue @endif" class="btn_default btn_green" onclick="checkout();">
                                      </form>
@elseif(Session::get('order_detail_payment_method') == 'Unionpay')
                                      <form method="post" action="{{url('responseUnionPay')}}">
                                          @csrf
                                          <script type="text/javascript" 
                                              src="{{$src}}"
                                              data-apikey="{{$key}}"
                                              data-amount="{{$order_detail_total}}"
                                              data-currency="THB"
                                              data-payment-methods="unionpay"
                                              data-mid={{$mcc_mid}}
                                              data-show-button="false"
                                          >
                                          </script>
                                          <input type="hidden" name="amount" value="{{$order_detail_total}}">
                                          <input type="hidden" name="paymentmethod" value="card">
                                          <input type="hidden" name="product" value="Order eatfit">
                                          <input type="hidden" name="mid" value="{{$mcc_mid}}">
                                          <input type="hidden" name="order_no" value="{{$order_no}}">
                                          <input type="button" value="@if(Session::get('lang') == 'th') ดำเนินการต่อ @else continue @endif" class="btn_default btn_green" onclick="checkout();">
                                      </form>
@endif              
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
		</section>
		
		
		@include('frontend/layouts/inc_footer')
		@include('frontend/layouts/scriptjs')
		
    </div>
    
    <link rel="stylesheet" href="{{asset('files/frontend/waitMe-31.10.17/waitMe.min.css')}}">
	  <script src="{{asset('files/frontend/waitMe-31.10.17/waitMe.min.js')}}"></script>

	  <script>
        var order_detail_payment_method = "{{ Session::get('order_detail_payment_method') }}"
        
        function checkout(order_detail_payment_method) {
          $(".btn_default").hide();
          $(".btn_brown").hide();
          $(".btn_green").hide();

          //waitMe();

          $.post('<?php echo url("ajaxCheckout");?>', { "_token": "{{ csrf_token() }}" }, function(data) {
              if("{{ Session::get('order_detail_payment_method') }}" == 'ATM / Internet Banking') {
                window.location.href = '<?php echo url("thankyou");?>/' + data;
              } else if("{{ Session::get('order_detail_payment_method') }}" == 'Credit Card' || "{{ Session::get('order_detail_payment_method') }}" == 'QR Code' || "{{ Session::get('order_detail_payment_method') }}" == 'Unionpay') {
                KPayment.show();
              }
          });        
        }

        function waitMe() {
    			$('.loading').waitMe({
    				effect : 'bounce',
    				text : 'loading',
    				bg : '#ddd',
    				color : '#000',
    				maxSize : '',
    				waitTime : -1,
    				textPos : 'vertical',
    				fontSize : '',
    				source : '',
    				onClose : function() {}
    			});	
    		}

    function clickATM() {
        $(".div_check_payment_method").html('<a href="javascript:checkout();" class="btn_default btn_green">continue</a>');
    }

    function clickCreditCard() {
        $.post('<?php echo url("ajaxCreditCard");?>', { "_token": "{{ csrf_token() }}" }, function(data) {
            $(".div_check_payment_method").html(data);
        });
    }

    function clickQRCode() {

    }

    function clickPaymentGateway() {

    }
    </script>
	
</body>

</html>
