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
                     <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <div>@if(Session::get('lang') == 'th') บัญชีของฉัน @else My Account @endif</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    @include('frontend.inc_menuaccount')
                    
                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member">@if(Session::get('lang') == 'th') เปลี่ยนรหัสผ่าน @else Change Password @endif</div>
                        <div class="form_cartlogin">
                            <form action="{{url('/changepasswordSave')}}" method="POST" name="add_reg" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-12">
                                     <div class="form-group">
                                        <label><span>*</span> @if(Session::get('lang') == 'th') รหัสผ่านปัจจุบัน @else Current Password @endif</label>
                                        <input class="form-control form-control-lg" placeholder="@if(Session::get('lang') == 'th') รหัสผ่านปัจจุบัน @else Current Password @endif" name="Current_Password">
                                      </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                        <label><span>*</span> @if(Session::get('lang') == 'th') รหัสผ่านใหม่ @else New Password @endif @if($error1 != '')<span style="color: red;">{{$error1}}</span>@endif</label>
                                        {{-- <input class="form-control form-control-lg" value="New Password" name="New_Password"> --}}
                                        <input id="New_Password" type="password" placeholder="@if(Session::get('lang') == 'th') รหัสผ่าน @else  Password @endif" class="form-control @error('password') is-invalid @enderror" name="New_Password" required autocomplete="new-password" required>
                    
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                      </div>
                                 </div>
                                <div class="col-12">
                                     <div class="form-group">
                                        <label><span>*</span> @if(Session::get('lang') == 'th') ยืนยันรหัสผ่าน @else Confirm Password @endif</label>
                                        {{-- <input class="form-control form-control-lg" value="Confirm Password" name="Confirm_Password"> --}}
                                        <input id="Confirm_Password" type="password" placeholder="@if(Session::get('lang') == 'th') ยืนยันรหัสผ่าน @else Confirm Password @endif" class="form-control" name="confirm_password" required autocomplete="new-password" required>
                                      </div>
                                 </div>
                            </div>
                            <div class="register_wrapbtn_bottom member_button">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="btn_submit_regis">
                                             <button class="btn_default btn_green" type="submit">@if(Session::get('lang') == 'th') บันทึก @else save @endif</button>
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
            $(".menu_account_left > ul > li:nth-child(7) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
