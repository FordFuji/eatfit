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
                                 <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') การจัดส่งสินค้า @else SHIPPING delivery @endif</div>
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
                            <div class="bg_topic_cartinside cart_bgpink">@if(Session::get('lang') == 'th') การชำระเงิน @else Payment @endif</div>
                            <!-- <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="atm_internet_banking" type="radio" name="shipdelivery" rel="w_nextday" onclick="clickATM();">
                                <label for="atm_internet_banking">ATM / Internet Banking</label>
                            </div>
                            <div class="w_nextday w_paymentbank">
                                <div class="cart_topic_shipping">Payment Account</div>
                                @if(Session::get('lang') == 'th')
                                <div class="bgwhite_payment">
                                    <div class="kbank_txt"><img src="{{asset('files/frontend/images/icon_bkbank.jpg')}}" alt=""> ธนาคารกรุงเทพ</div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span>Account Name :</span> บริษัท กูร์เมท์ พรีโม่ จำกัด
                                        </div>
                                        <div class="col-12">
                                            <span>Type of Account  :</span> ออมทรัพย์
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Branch :</span> ท่าอากาศสุวรรณภูมิ
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Account No. :</span> 862-0161268
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="bgwhite_payment">
                                    <div class="kbank_txt"><img src="{{asset('files/frontend/images/icon_bkbank.jpg')}}" alt=""> Bangkok Bank</div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span>Account Name :</span> Gourmet Primo Co., Ltd.
                                        </div>
                                        <div class="col-12">
                                            <span>Type of Account  :</span> Saving
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Branch :</span> Suvarnabhumi Airport
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Account No. :</span> 862-0161268
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div> -->

                            <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="credit_card" type="radio" name="shipdelivery">
                                <label for="credit_card">@if(Session::get('lang') == 'th') บัตรเครดิต @else Credit Card @endif</label>
                            </div>
                            <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="qrcode" type="radio" name="shipdelivery">
                                <label for="qrcode">@if(Session::get('lang') == 'th') คิวอาร์โค้ด (โมบาย แบงก์กิ้ง) @else QR Code (Mobile Banking) @endif</label>
                            </div>
                            <div class="box_bill_nobg md-radio md-radio-inline box_delivery">
                                <input id="unionpay" type="radio" name="shipdelivery">
                                <label for="unionpay">@if(Session::get('lang') == 'th') ยูเนียนเพย์ @else Unionpay @endif</label>
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
                                      <a href="javascript:checkout();" class="btn_default btn_green">@if(Session::get('lang') == 'th') ดำเนินการต่อ @else continue @endif</a>
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
        function checkout() {
            if($("#atm_internet_banking").is(":checked") == false && $("#credit_card").is(":checked") == false && $("#qrcode").is(":checked") == false && $("#unionpay").is(":checked") == false) {
                alert('Please Select Payment');

                $("#atm_internet_banking").focus();
            } else {
                if($("#atm_internet_banking").is(":checked") == true) {
                  var payment_method = 'ATM / Internet Banking';
                } else if($("#credit_card").is(":checked") == true) {
                  var payment_method = 'Credit Card';
                } else if($("#qrcode").is(":checked") == true) {
                  var payment_method = 'QR Code';
                } else if($("#unionpay").is(":checked") == true) {
                  var payment_method = 'Unionpay';
                }

                $.post('<?php echo url("ajaxPaymentMethod");?>', { order_detail_payment_method: payment_method, "_token": "{{ csrf_token() }}" }, function(data) {
                    window.location.href = '<?php echo url("cart-summary");?>/' + data;
                });
            }
        }

    /*function waitMe() {
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
		}*/

    function clickATM() {
      $(".div_check_payment_method").html('<a href="javascript:checkout();" class="btn_default btn_green">continue</a>');
    }

    </script>
	
</body>

</html>
