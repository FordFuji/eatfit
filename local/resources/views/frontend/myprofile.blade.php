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
                     <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <span>
                         <i class="fas fa-chevron-right"></i></span> <div>@if(Session::get('lang') == 'th') บัญชีของฉัน @else My Account @endif</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')
                    {{-- {{dd($Profile)}} --}}
                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member">@if(Session::get('lang') == 'th') โปรไฟล์ของฉัน @else My Profile @endif</div>
                        <div class="topic_member_border">@if(Session::get('lang') == 'th') ข้อมูลส่วนบุคคล @else Personal Info @endif</div>
                        <div class="form_cartlogin">
                            <form action="{{url('saveUpdateProfile')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                     <div class="form-group">  
                                        <label><span>*</span> @if(Session::get('lang') == 'th') ชื่อ @else Name @endif</label>
                                        <input type="text" name="member_name" class="form-control form-control-lg" value="{{$member->member_name}}" required>
                                      </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                     <div class="form-group">
                                        <label><span>*</span> @if(Session::get('lang') == 'th') นามสกุล @else Family Name @endif</label>
                                        <input type="text" name="member_family" class="form-control form-control-lg" value="{{$member->member_family}}" required>
                                      </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                        <label><span>*</span> @if(Session::get('lang') == 'th') อีเมล @else Email Address @endif</label>
                                        <input type="email" name="member_email" class="form-control form-control-lg" value="{{$member->member_email}}" required>
                                      </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                        <label><span>*</span> @if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone Number @endif</label>
                                        <input type="text" name="member_phone_number" class="form-control form-control-lg" value="{{$member->member_phone_number}}" required>
                                      </div>
                                 </div>
                                 <div class="col-12 col-md-9">
                                         <label><span>*</span> @if(Session::get('lang') == 'th') วัน เดือน ปีเกิด @else Date of Birth @endif</label>
                                         <div class="row">
                                             <div class="col-12 col-sm-4">
                                                 <div class="form-group">
                                                     <select name="birth_day" class="form-control form-control-lg" required>
                                                      <option value="">@if(Session::get('lang') == 'th') วัน @else Day @endif</option>
                                                        @if(!empty($member))
                                                            @php
                                                           $member_birth = $member->member_birth_day;
                                                           $member_birth = explode('-', $member_birth);
                                                           @endphp
                                                           @for($i = 1; $i <= 31; $i++)
                                                               @if(strlen($i) == 1)
                                                                   <option value="0{{$i}}" @if('0'.$i == @$member_birth[2]) selected @endif>0{{$i}}</option>
                                                               @else 
                                                                   <option value="{{$i}}" @if($i == @$member_birth[2]) selected @endif>{{$i}}</option>
                                                               @endif
                                                           @endfor
                                                        @endif
                                                    </select>
                                                 </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                 <div class="form-group">
                                                     <select name="birth_month" class="form-control form-control-lg" required>
                                                      <option value="">@if(Session::get('lang') == 'th') เดือน @else Month @endif</option>
                                                       <option value="01" @if(!empty($member_birth[1]) and $member_birth[1] == '01') selected @endif>@if(Session::get('lang') == 'th') มกราคม @else January @endif</option>
                                                        <option value="02" @if(!empty($member_birth[1]) and $member_birth[1] == '02') selected @endif>@if(Session::get('lang') == 'th') กุมภาพันธ์ @else Febuary @endif</option>
                                                        <option value="03" @if(!empty($member_birth[1]) and $member_birth[1] == '03') selected @endif>@if(Session::get('lang') == 'th') มีนาคม @else March @endif</option>
                                                        <option value="04" @if(!empty($member_birth[1]) and $member_birth[1] == '04') selected @endif>@if(Session::get('lang') == 'th') เมษายน @else April @endif</option>
                                                        <option value="05" @if(!empty($member_birth[1]) and $member_birth[1] == '05') selected @endif>@if(Session::get('lang') == 'th') พฤษภาคม @else May @endif</option>
                                                        <option value="06" @if(!empty($member_birth[1]) and $member_birth[1] == '06') selected @endif>@if(Session::get('lang') == 'th') มิถุนายน @else June @endif</option>
                                                        <option value="07" @if(!empty($member_birth[1]) and $member_birth[1] == '07') selected @endif>@if(Session::get('lang') == 'th') กรกฎาคม @else July @endif</option>
                                                        <option value="08" @if(!empty($member_birth[1]) and $member_birth[1] == '08') selected @endif>@if(Session::get('lang') == 'th') สิงหาคม @else August @endif</option>
                                                        <option value="09" @if(!empty($member_birth[1]) and $member_birth[1] == '09') selected @endif>@if(Session::get('lang') == 'th') กันยายน @else September @endif</option>
                                                        <option value="10" @if(!empty($member_birth[1]) and $member_birth[1] == '10') selected @endif>@if(Session::get('lang') == 'th') ตุลาคม @else October @endif</option>
                                                        <option value="11" @if(!empty($member_birth[1]) and $member_birth[1] == '11') selected @endif>@if(Session::get('lang') == 'th') พฤศจิกายน @else November @endif</option>
                                                        <option value="12" @if(!empty($member_birth[1]) and $member_birth[1] == '12') selected @endif>@if(Session::get('lang') == 'th') ธันวาคม @else December @endif</option>
                                                    </select>
                                                 </div>
                                             </div>
                                             <div class="col-12 col-sm-4">
                                                 <div class="form-group">
                                                    <select name="birth_year" class="form-control form-control-lg" required>
                                                        <option value="">@if(Session::get('lang') == 'th') ปี @else Year @endif</option>
                                                        @for($i = 2020; $i >= 1930; $i--)
                                                        <option value="{{$i}}" {{(!empty($member_birth[0]) and $member_birth[0] == $i) ? 'selected' : ''}}>{{$i}}</option>
                                                        @endfor
                                                    
                                                    </select>
                                                 </div>
                                             </div>
                                         </div>
                                </div>
                                <div class="col-12 col-md-3">
                                     <div class="form-group"> 
                                        <label>@if(Session::get('lang') == 'th') เพศ @else Gender @endif</label>
                                         <select name="member_gender" class="form-control form-control-lg" required>
                                            <option value="">@if(Session::get('lang') == 'th') เลือก @else Select @endif</option>
                                            <option value="Male" {{($member->member_gender == 'Male') ? 'selected' : ''}}>@if(Session::get('lang') == 'th') ชาย @else Male @endif</option>
                                            <option value="Female" {{($member->member_gender == 'Female') ? 'selected' : ''}}>@if(Session::get('lang') == 'th') หญิง @else Female @endif</option>
                                        </select>
                                     </div>
                                 </div>
                            </div>
                            <div class="register_wrapbtn_bottom member_button">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="btn_submit_regis">
                                             <button class="btn_default btn_green" type="sumbit">@if(Session::get('lang') == 'th') อัพเดท @else update @endif</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
		</section>
		
		
		
        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')
		
		<script>
            $(".menu_account_left > ul > li:nth-child(1) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
