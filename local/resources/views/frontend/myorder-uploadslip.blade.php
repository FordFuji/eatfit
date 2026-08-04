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
        
        <form action="{{url('saveUpdatePayment')}}" method="post" enctype="multipart/form-data">
        @csrf
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')
                    
                    <div class="col-12 col-lg-8 wrap_memberorder">
                        <div class="topicbar_member">@if(Session::get('lang') == 'th') คำสั่งซื้อของฉัน @else My Order @endif</div>
                        <div>
                            <div class="cart_topic_shipping">@if(Session::get('lang') == 'th') การแจ้งเตือนการชำระเงิน @else Payment notification @endif </div>
                            <div class="bggrey_thx">
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') หมายเลขคำสั่งซื้อ @else Order Number @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">{{(!empty($order_detail)) ? $order_detail->order_no : '' }}</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') วันที่ @else Date @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">{{(!empty($order_detail)) ? $order_detail->order_detail_datetime_create : '' }}</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ช่องทางการชำระเงิน @else Payment Method @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">{{(!empty($order_detail)) ? $order_detail->order_detail_payment_method : '' }}</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') รหัสโปรโมชัน @else Promotion Code @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right"><!-- eatfit2020 -->-</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ส่วนลด @else Discount @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right"><!-- -10%(30) -->0 THB</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ค่าจัดส่ง @else Shipping @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">{{(!empty($order_detail)) ? $order_detail->order_detail_shipping : '' }} THB</div></div>
                                 </div>
                                 <div class="row">
                                     <div class="col-5 col-sm-6"><div class="txt_black">@if(Session::get('lang') == 'th') ยอดรวมสุทธิ @else Total @endif</div></div>
                                     <div class="col-7 col-sm-6"><div class="txt-right">{{(!empty($order_detail)) ? $order_detail->order_detail_total : '' }} THB</div></div>
                                 </div>
                             </div>
                             
                             <div class="form_cartlogin">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="form-group">
                                                <label><span>*</span> @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone Number @endif</label>
                                                <input type="text" name="payment_phone_number" class="form-control form-control-lg" required>
                                                <small class="form-text text-muted">@if(Session::get('lang') == 'th') กรุณาใส่หมายเลขโทรศัพท์  เพื่อทางเราสามารถติดต่อคุณในกรณีที่เกิดข้อผิดพลาดของข้อมูล @else Please give me your contact number. In case of errors in verifying information We will be able to contact you. @endif</small>
                                          </div>
                                     </div>
                                     <div class="col-12">
                                          <div class="form-group">
                                            <label><span>*</span> Bank</label>
                                            @if(Session::get('lang') == 'th')
                                <div class="bgwhite_payment">
                                    <div class="kbank_txt"><img src="{{asset('files/frontend/images/icon_bkbank.jpg')}}" alt=""> ธนาคารกรุงเทพ</div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Name Account :</span> บจ. กูร์เมท์ พรีโม่
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Type of Account  :</span> เงินฝาก
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
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <span>Name Account :</span> Gourmet Primo Co., Ltd.
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
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
                                          </div>
                                     </div>
                                     <div class="col-12">
                                         <div class="form-group">
                                                <label><span>*</span> Amount</label>
                                                <input type="number" step="0.01" class="form-control form-control-lg" name="payment_amount" required>
                                          </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group member_frmdate">
                                                <label>Date</label>
                                                <div class="input-group date box_inlinedate">
                                                  <input type="text" name="payment_date" class="form-control form-control-lg" placeholder="วว/ดด/ปป"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                          </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group member_frmdate">
                                            <label>Time</label>
                                             <div class="box_inlinedate">
                                                <input class="form-control form-control-lg" name="payment_time"><span><i class="far fa-clock" placeholder="--:--"></i></span>
                                            </div>
                                          </div>
                                     </div>
                                     <!-- <div class="col-12">
                                         <div class="form-group">
                                                <label>Message</label>
                                                <input type="text" name="payment_message" class="form-control form-control-lg" required>
                                          </div>
                                     </div> -->
                                     <div class="col-12">
                                         <div class="form-group">
                                                <label><span>*</span> Upload Payment Slip</label>
                                                <input type="file" name="payment_slip" class="form-control-file" required>
                                          </div>
                                     </div>
                                 </div>
                             </div>
                             
                             <div class="register_wrapbtn_bottom member_button">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="btn_submit_regis">
                                             <input type="hidden" name="order_detail_id" value="{{$id}}">
                                             <button class="btn_default btn_green">send</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </section>
    </form>
		
		
		
		@include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')
		
		<script>
            $(".menu_account_left > ul > li:nth-child(4) > a").addClass("here");
        </script>
		
    </div>
    @if(!empty($_GET['status']) and $_GET['status'] == 'success')
        @if(Session::get('lang') == 'th')
        <script>
            alert('ขอบคุณสำหรับการชำระเงิน คำสั่งซื้อของคุณกำลังดำเนินการ');
        </script>
        @else 
        <script>
            alert('Thank you for your payment. Your order is now being processed.');
        </script>
        @endif
    @endif

</body>

</html>
