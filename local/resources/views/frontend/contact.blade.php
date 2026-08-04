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
                     <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span>  <div>@if(Session::get('lang') == 'th') ติดต่อเรา @else Contact @endif</div>
                 </div>
		    </div>
		</section>
		
		<section class="row">
		    <div class="col-12 wrap_bannerinside">
		        <img src="{{asset('/files/frontend/images/bannercontact_02.jpg')}}" alt="">
		    </div>
		</section>
		
		<section class="row">
		    <div class="container">
		        <div class="row wrap_content">
                     <div class="col-12">
                         <div class="txt_contact">{{(Session::get('lang') == 'th') ? 'ติดต่อเรา' : 'Contact Us'}}</div>
                     </div>
		            <div class="col-12 col-lg-6">
                        <div class="wrap_contactinfo">
                            <div class="contact_companyname">eatfit by Gourmet Primo</div>
                            <address>
                                {{(Session::get('lang') == 'th') ? '129  ถนนสุขาภิบาล 2 แขวงดอกไม้ เขตประเวศ กรุงเทพฯ 10250' : '129 Sukhapiban 2 Road,Dokmai, Prawet, Bangkok 10250 Thailand'}}
                            </address>
                            <div class="contact_info"><img src="{{asset('/files/frontend/images/icon_call_green.svg')}}" alt=""> <span>{{(Session::get('lang') == 'th') ? 'เบอร์โทรศัพท์' : 'Phone'}} :  </span> 091 666 0998</div>
                            <div class="contact_info"><img src="{{asset('/files/frontend/images/icon_fax.svg')}}" alt=""> <span>{{(Session::get('lang') == 'th') ? 'แฟกซ์' : 'Fax'}} :  </span> 02 328 5979, 02 328 5988</div>
                            <div class="contact_info"><img src="{{asset('/files/frontend/images/icon_mail_green.svg')}}" alt=""> <span>{{(Session::get('lang') == 'th') ? 'อีเมล' : 'Email'}} :  </span> sales@gourmetprimo.com</div>
                            <div class="contact_line">{{(Session::get('lang') == 'th') ? 'ติดต่อผ่านทางไลน์' : 'Contact us on Line'}} <a href="https://line.me/R/ti/p/@eatfit.th" target="_blank">@eatfit.th</a></div>
                            <div class="contact_iconline"><a href="https://line.me/R/ti/p/@eatfit.th" target="_blank"><img src="{{asset('/files/frontend/images/icon_line.svg')}}" alt=""></a></div>
                            <div class="contact_line">{{(Session::get('lang') == 'th') ? 'ติดตามข่าวสาร' : 'Follow Us'}}: <span>eatfit.th</span></div>
                            <div class="contact_iconline">
                                <a href="https://www.facebook.com/eatfit.th" target="_blank"><img src="{{asset('/files/frontend/images/icon_facebook.svg')}}" alt=""></a>
                                <a href="https://www.instagram.com/eatfit.th/" target="_blank"><img src="{{asset('/files/frontend/images/icon_instagram.svg')}}" alt=""></a>
<!--                                <a href="" target="_blank"><img src="{{asset('/files/frontend/images/icon_youtube.svg')}}" alt=""></a>-->
                            </div>
                        </div>
		            </div>
		            <div class="col-12 col-lg-6">
		                <div class="wrap_contactform">
                      <form action="{{ url('sendcontact') }}" class="formContact"  method="POST" name="add_contact"
                      enctype="multipart/form-data" id="add_contact">
                      @csrf
                              <div class="form-group">
                                <label><span>*</span> {{(Session::get('lang') == 'th') ? 'ชื่อ-สกุล' : 'Name'}}</label>
                                <input name="contact_form_name">
                              </div>
                              <div class="form-group">
                                <label><span>*</span> {{(Session::get('lang') == 'th') ? 'อีเมล' : 'Email Address'}}</label>
                                <input name="contact_form_email">
                              </div>
                              <div class="form-group">
                                <label><span>*</span> {{(Session::get('lang') == 'th') ? 'โทรศัพท์' : 'Phone Number'}}</label>
                                <input name="contact_form_phone">
                              </div>
                              <div class="form-group">
                                <label><span>*</span> {{(Session::get('lang') == 'th') ? 'หัวข้อ' : 'Subject'}}</label>
                                <input name="contact_form_subject">
                              </div>
                              <div class="form-group">
                                <label>{{(Session::get('lang') == 'th') ? 'ข้อความ' : 'Message'}}</label>
                                <textarea name="contact_form_massage" id="" rows="5"></textarea>
                              </div>
                              <div class="form-group">
                                <label>Captcha</label>
                                {!! captcha_img() !!}
                                <p>
                                  <input type="text" name="captcha" required>
                                </p>
                              </div>
                              <button type="submit" class="btn_default btn_green">{{(Session::get('lang') == 'th') ? 'ส่ง' : 'send'}}</button>
                            </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
		
		<section class="row">
		    <div class="col-12 googlemaps">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.5136758325057!2d100.69869431593811!3d13.687309690389219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d60af2ccccf27%3A0xd4f614bfc860ba65!2sGourmet%20Primo!5e0!3m2!1sen!2sth!4v1604466059615!5m2!1sen!2sth" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            
		    </div>
		</section>
		
	
       
		
		@include('frontend.layouts.inc_footer')
    @include('frontend.layouts.scriptjs')
		
	</div>

	
	

</body>

</html>
