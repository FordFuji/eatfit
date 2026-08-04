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
                    <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a>
                    <span><i class="fas fa-chevron-right"></i></span>
                    <div>@if(Session::get('lang') == 'th') ลงทะเบียน @else Register @endif</div>
                </div>
            </div>
        </section>


        <section class="row">
            <div class="container">
                <div class="row page_cartlogin">
                    <div class="col-12 nopad">
                        <div class="topic_bgpurple">
                            <div class="topic_cartinfo">{{(Session::get('lang') == 'th') ? 'สร้างบัญชี หรือ ลงทะเบียน' : 'Create Account'}}</div>
                            <div class="subtopic_cartinfo">{{(Session::get('lang') == 'th') ? 'สมัคร/ลงทะเบียนโดยใช้อีเมล
' : 'SIGN UP USING YOUR EMAIL ADDRESS'}}</div>
                        </div>

                        <div class="wrap_register">
                            <form id="add_reg" action="{{url('/registerSaveUpdate')}}" method="POST" name="add_reg" enctype="multipart/form-data" onsubmit="return checkMember();">
                                @csrf
                            {{-- <div class="box_btnfb">
                                 <a href="" class="btn_default100 btn_facebook"><i class="fab fa-facebook-square"></i> Sign up with <span>Facebook</span></a>
                             </div>
                             <div class="txt_or">or</div> --}}
                            <div class="topic_cartlogin">login to <span>eatfit</span></div>
                            <div class="wrap_frm_register form_cartlogin">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label><span>*</span> {{(Session::get('lang') == 'th') ? 'ชื่อ' : 'Name'}}</label>
                                            <input class="form-control form-control-lg" name="member_name" placeholder="@if(Session::get('lang') == 'th') ชื่อ @else Name @endif" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label><span>*</span> {{(Session::get('lang') == 'th') ? 'นามสกุล' : 'Family Name'}}</label>
                                            <input type="text" class="form-control form-control-lg" name="member_family" placeholder="@if(Session::get('lang') == 'th') นามสกุล @else Family Name @endif" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label><span>*</span> {{(Session::get('lang') == 'th') ? 'วัน เดือน ปีเกิด' : 'Date of Birth'}}</label>
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    {{-- <input class="form-control form-control-lg" name="birth_day" placeholder="Day" type="number" min="1" max="31"> --}}
                                                    <select name="birth_day" class="form-control form-control-lg" required>
                                                        <option value="">@if(Session::get('lang') == 'th') วัน @else Day @endif</option>
                                                        <option value="01">1</option>
                                                        <option value="02">2</option>
                                                        <option value="03">3</option>
                                                        <option value="04">4</option>
                                                        <option value="05">5</option>
                                                        <option value="06">6</option>
                                                        <option value="07">7</option>
                                                        <option value="08">8</option>
                                                        <option value="09">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <select name="birth_month" class="form-control form-control-lg" required>
                                                        <option value="">@if(Session::get('lang') == 'th') เดือน @else Month @endif</option>
                                                        @if(Session::get('lang') == 'th')
                                                        <option value="01">มกราคม</option>
                                                        <option value="02">กุมภาพันธ์</option>
                                                        <option value="03">มีนาคม</option>
                                                        <option value="04">เมษายน</option>
                                                        <option value="05">พฤษภาคม</option>
                                                        <option value="06">มิถุนายน</option>
                                                        <option value="07">กรกฎาคม</option>
                                                        <option value="08">สิงหาคม</option>
                                                        <option value="09">กันยายน</option>
                                                        <option value="10">ตุลาคม</option>
                                                        <option value="11">พฤษจิกายน</option>
                                                        <option value="12">ธันวาคม</option>
                                                        @else 
                                                        <option value="01">January</option>
                                                        <option value="02">Febuary</option>
                                                        <option value="03">March</option>
                                                        <option value="04">April</option>
                                                        <option value="05">May</option>
                                                        <option value="06">June</option>
                                                        <option value="07">July</option>
                                                        <option value="08">August</option>
                                                        <option value="09">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    {{-- <input class="form-control form-control-lg" name="birth_year" placeholder="Year (A.D.)" type="number" min="1900"> --}}
                                                    <select name="birth_year" class="form-control form-control-lg" required>
                                                        <option value="">@if(Session::get('lang') == 'th') ปี @else Year @endif</option>
                                                        @for($i = 2025; $i >= 1930; $i--)
                                                        <option value="{{$i}}" {{(!empty($member_birth[0]) and $member_birth[0] == $i) ? 'selected' : ''}}>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        {{-- <div class="form-group">
                                            <label><span>*</span> Email Address</label>
                                            <input class="form-control form-control-lg" name="email">
                                          </div> --}}

                                          <div class="form-group">
                                            <label><span>*</span> {{(Session::get('lang') == 'th') ? 'อีเมล' : 'Email Address'}} @if($error2 != '')<span style="color: red;">{{$error2}}</span>@endif</label>
                                            <input id="member_email" type="email" name="member_email" placeholder="@if(Session::get('lang') == 'th') อีเมล์ @else E-Mail Address @endif"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" required autocomplete="email" onblur="checkEmail(this.value);" required>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label><span>*</span> {{(Session::get('lang') == 'th') ? 'หมายเลขโทรศัพท์' : 'Phone Number'}}</label>
                                            <input class="form-control form-control-lg" name="member_phone_number" placeholder="@if(Session::get('lang') == 'th') หมายเลขโทรศัพท์ @else Phone Number @endif" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label><span>*</span> {{(Session::get('lang') == 'th') ? 'สร้างรหัสผ่าน' : 'Password'}} @if($error1 != '')<span style="color: red;">{{$error1}}</span>@endif</label>
                                            {{-- <input class="form-control form-control-lg" name="password"> --}}
                                            {{-- <div class="input-group"> --}}
                                                <input id="member_password" type="password" placeholder="@if(Session::get('lang') == 'th') รหัสผ่าน @else Password @endif" class="form-control @error('password') is-invalid @enderror" name="member_password" required autocomplete="new-password" required>
                    
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label><span>*</span> {{(Session::get('lang') == 'th') ? 'ยืนยันรหัสผ่าน' : 'Confirm Password'}}</label>
                                            {{-- <input class="form-control form-control-lg"> --}}
                                            <input id="confirm_password" type="password" placeholder="@if(Session::get('lang') == 'th') ยืนยันรหัสผ่าน @else Confirm Password @endif" class="form-control" name="confirm_password" required autocomplete="new-password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="topic_cartlogin">{{(Session::get('lang') == 'th') ? 'ที่อยู่สำหรับจัดส่ง' : 'Shipping Address'}}</div>
                            <div class="wrap_frm_register form_cartlogin">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{(Session::get('lang') == 'th') ? 'ที่อยู่' : 'Address'}}</label>
                                            <input class="form-control form-control-lg" name="member_address" placeholder="@if(Session::get('lang') == 'th') ที่อยู่ @else Address @endif" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>{{(Session::get('lang') == 'th') ? 'จังหวัด' : 'Province'}}</label>
                                            <select class="form-control form-control-lg" name="member_province" required onchange="changeProvince(this.value);">
                                                <option value="">@if(Session::get('lang') == 'th') จังหวัด @else Please Select @endif</option>
                                                @if(!empty($province))
                                                    @foreach($province as $r)
                                                <option value="{{Session::get('lang') == 'th' ? $r->province_name_th : $r->province_name_en }}">{{Session::get('lang') == 'th' ? $r->province_name_th : $r->province_name_en }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>{{(Session::get('lang') == 'th') ? 'เขต/อำเภอ' : 'District'}}</label>
                                            <select class="form-control form-control-lg" name="member_district" id="member_district" required onchange="changeAmphur(this.value);">
                                                <option value="">@if(Session::get('lang') == 'th') เขต/อำเภอ @else Please Select @endif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>{{(Session::get('lang') == 'th') ? 'แขวง/ตำบล' : 'Sub-district'}}</label>
                                            <select class="form-control form-control-lg" name="member_sub_district" id="member_sub_district" required>
                                                <option value="">@if(Session::get('lang') == 'th') แขวง/ตำบล @else Please Select @endif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>{{(Session::get('lang') == 'th') ? 'รหัสไปรษณีย์' : 'Postcode'}} </label>
                                            <input class="form-control form-control-lg" name="member_postcode" placeholder="@if(Session::get('lang') == 'th') รหัสไปรษณีย์ @else Postcode @endif" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="register_wrapbtn_bottom">
                                <div class="wrap_frm_register form_cartlogin">
                                    <div class="row">
                                        <div class="col-12 col-md-8">
                                            <div class="form-group form-check">
                                                <input type="checkbox" id="privacy_policy" onclick="checkSignUpShow();" class="form-check-input" name="register_policy">
                                                <label class="form-check-label">{{(Session::get('lang') == 'th') ? 'ฉันได้อ่านและยอมรับ' : 'I have read and agreed to the'}} 
                                                    <a data-fancybox data-src="#privacypolicy" href="javascript:;" class="link_privacy">{{(Session::get('lang') == 'th') ? 'ข้อกำหนดตามเงื่อนไข' : 'Privacy Policy'}}</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="btn_submit_regis" id="btn_submit_regis" style="display:none;">
                                                <button class="btn_default btn_green" type="submit">{{(Session::get('lang') == 'th') ? 'สมัครสมาชิก' : 'sign up'}}</button>
                                            </div>
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

        
        <div style="display: none;" id="privacypolicy">
             @include('frontend.layouts.inc_privacy')
        </div>

        @include('frontend.layouts.inc_footer')
        @include('frontend.layouts.scriptjs')

    </div>

    <script>
        function checkSignUpShow() {
            if($("#privacy_policy").is(":checked") == true) {
                $("#btn_submit_regis").show();
            } else {
                $("#btn_submit_regis").hide();
            }
        }

        function changeProvince(province_name) {
            $.post('<?php echo url("ajaxChangeProvince");?>', { province_name: province_name, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#member_district").html(data);
            });
        }

        function changeAmphur(amphur_name) {
            $.post('<?php echo url("ajaxChangeAmphur");?>', { amphur_name: amphur_name, "_token": "{{ csrf_token() }}" }, function(data) {
                $("#member_sub_district").html(data);
            });
        }

        function checkMember() {
            if($("#member_password").val() != $("#confirm_password").val()) {
                alert('Password Must be Similar Confirm Password');

                $("#member_password").val('');

                $("#confirm_password").val('');

                return false;
            } else {
                return true;
            }
        }

        function checkEmail(member_email) {
            $.post('<?php echo url("ajaxCheckEmail");?>', { member_email: $("#member_email").val(), "_token": "{{ csrf_token() }}" }, function(data) {
                if(data == 'true') {
                    alert('This email address is already registered');

                    $("#member_email").val('');
                }
            });
        }
    </script>

</body>

</html>
