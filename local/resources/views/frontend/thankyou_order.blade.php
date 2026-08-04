<!doctype html>
<html>

<head>
	@include('frontend.layouts.inc_head')
	<style>
        .wrap_thx_order{
            width: 700px;
            margin: 0 auto;
            text-align: center;
        }
        .wrap_thx_order .topic_cartinfo{
            margin-bottom: 0;
        }
        .wrap_thx_order .bggrey_thx{
            padding: 30px 100px;
        }
        .wrap_thx_order .topic_bgpurple{
            margin-bottom: 5px;
        }
        
@media (max-width: 1600px){
    .wrap_thx_order{
        width: 100%;
    }
    .wrap_thx_order .bggrey_thx{
        padding: 20px 15px;
    }
}
        
    </style>
</head>

<body>

	<div class="container-fluid footer_notop">
	
		@include('frontend.layouts.inc_menu')

		<section class="row">
		    <div class="container">
                 <div class="row wrap_navigationbar">
                     <a href="{{url('index')}}"><img src="{{asset('files/frontend/images/icon_home.svg')}}" alt=""></a>  <span><i class="fas fa-chevron-right"></i></span> <div>@if(Session::get('lang') == 'th') ขอบคุณสำหรับการสั่งซื้อข้อคุณ @else Thank you for your order! @endif</div>
                 </div>
		    </div>
		</section>
		
		
		<section class="row">
		    <div class="container">
		        <div class="row page_cartlogin">
                     <div class="col-12 nopad">
                         <div class="wrap_thx_order wrap_thx">
                             <div class="wrap_frm_register form_cartlogin">
                                <div class="topic_bgpurple thx_bggreen">
                                     <div class="topic_cartinfo">@if(Session::get('lang') == 'th') ขอบคุณ @else Thank You @endif</div>
                                 </div>
                                 <div class="bggrey_thx">
                                     <p>
                                        @if(Session::get('lang') == 'th') คำสั่งซื้อของคุณกำลังดำเนินการโดยทีมงาน eatfit และจะได้รับการยืนยันจากเราในไม่ช้า @else Your order is being processed by eatfit team and you should receive a confirmation from us shortly. @endif
                                     </p>
                                     <p>
                                        @if(Session::get('lang') == 'th') เพลิดเพลินไปกับประสบการ์ณการกินของคุณ !! @else Enjoy your eatfit experience!! @endif
                                     </p>
                                 </div>
                                 
                               
                                 <div class="row">
                                              <div class="col-12 text-center">
                                                   <a href="{{url('index')}}" class="btn_default btn_green">@if(Session::get('lang') == 'th') ดำเนินการสั่งซื้อต่อ @else Continue Shopping @endif</a>
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

	
	

</body>

</html>
