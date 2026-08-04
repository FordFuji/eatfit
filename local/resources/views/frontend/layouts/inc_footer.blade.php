<section class="row wrap_footer">
    <div class="col-12 text-center">
        <div class="logo_footer"><img src="{{asset('/files/frontend/images/logo.svg')}}" alt=""></div>
        <address>
            {{(Session::get('lang') == 'th') ? '129  ถนนสุขาภิบาล 2 แขวงดอกไม้ เขตประเวศ กรุงเทพฯ 10250' : '129 Sukhapiban 2 Road,Dokmai, Prawet, Bangkok 10250 Thailand'}}
        </address>
        <div class="footer_contact">
            <div><img src="{{asset('/files/frontend/images/icon_call_green.svg')}}" alt=""> @if(Session::get('lang') == 'th') ติดต่อเรา @else call us @endif 091 666 0998</div>
            <div><img src="{{asset('/files/frontend/images/icon_mail_green.svg')}}" alt=""> sales@gourmetprimo.com</div>
        </div>
    </div>
</section>
<section class="row footer_cc">
    <div class="col-12 text-center">

        Gourmet Primo © 2020 | All Rights Reserved.  |  <a href="{{url('/faqs')}}">@if(Session::get('lang') == 'th') คำถามที่พบบ่อย @else FAQS @endif</a>   <a href="{{url('/terms')}}">@if(Session::get('lang') == 'th') ข้อกำหนดในการให้บริการ @else Term and Condition @endif</a>
    </div>
</section>
