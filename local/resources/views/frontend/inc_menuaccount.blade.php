<div class="col-12">
<div class="member_txtmember">@if(Session::get('lang') == 'th') สวัสดี @else Hello @endif,  <span>{{$member->member_name.' '.$member->member_family}}</span></div>
</div>
<div class="col-12 col-lg-4">
    <div class="menu_account_left">
        <ul>
            <li><a href="{{url('/myprofile')}}" class="icon_menudropdown m_iconuser"><div><img src="{{asset('/files/frontend/images/icon_user_menu.svg')}}" alt="" class="svg"></div> @if(Session::get('lang') == 'th') โปรไฟล์ของฉัน @else My Profile @endif</a></li>
            <li><a href="{{url('/member_shippingaddress')}}" class="icon_menudropdown m_iconshipping"><div><img src="{{asset('/files/frontend/images/icon_shipping.svg')}}" alt="" class="svg"></div> @if(Session::get('lang') == 'th') การจัดส่งและการเรียกเก็บเงิน @else Shipping & Billing @endif</a></li>
            <li><a href="{{url('/mywishlist')}}" class="icon_menudropdown m_wishlist"><div><img src="{{asset('/files/frontend/images/heart-regular.svg')}}" alt="" class="svg"></div> @if(Session::get('lang') == 'th') รายการโปรดของฉัน @else My Wish List @endif ({{$wishcount}})</a></li>
            <li><a href="{{url('/myorder')}}" class="icon_menudropdown m_iconbasket"><div><img src="{{asset('/files/frontend/images/icon_basket.svg')}}" alt="" class="svg"></div> @if(Session::get('lang') == 'th') คำสั่งซื้อของฉัน @else My Order @endif </a></li>
            <li><a href="{{url('/mypoint')}}" class="icon_menudropdown m_iconpoint"><div><img src="{{asset('/files/frontend/images/icon_point.svg')}}" alt="" class="svg"></div> @if(Session::get('lang') == 'th') คะแนนสะสมของฉัน @else My Point @endif ({{($member->member_point != '') ? $member->member_point : '0'}})</a></li>
            <li><a href="{{url('/myreviews')}}" class="icon_menudropdown m_iconstar"><div><i class="far fa-star"></i></div> @if(Session::get('lang') == 'th') รีวิว @else Review @endif </a></li>
            <li><a href="{{url('/changepassword')}}" class="icon_menudropdown m_iconlock"><div><img src="{{asset('/files/frontend/images/icon_lock.svg')}}" alt="" class="svg"></div> @if(Session::get('lang') == 'th') เปลี่ยนรหัสผ่าน @else Change Password @endif</a></li>
            {{-- <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">
                        <img src="{{asset('/files/frontend/images/icon_logout.svg')}}" alt="" class="svg">Sign Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li> --}}
            <li>
                <a href="{{url('logout')}}" class="icon_menudropdown m_iconlogout">
                <div>
                    <img src="{{asset('/files/frontend/images/icon_logout.svg')}}" alt="" class="svg">
                </div> @if(Session::get('lang') == 'th') ลงชื่อออก @else Sign Out @endif
            </a>
        </li>
        </ul>
    </div>
 </div>
   

   