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
                    <a href="{{url('index')}}"><img src="{{asset('files/frontend/images/icon_home.svg')}}" alt=""></a>
                    <span><i class="fas fa-chevron-right"></i></span> <a href="{{url('cart')}}">@if(Session::get('lang') == 'th') ตระกร้าสินค้า @else Cart @endif</a> <span><i
                            class="fas fa-chevron-right"></i></span>
                    <div>@if(Session::get('lang') == 'th') ข้อมูล @else Information @endif</div>
                </div>
            </div>
        </section>


        <section class="row">
            <div class="container">
                <div class="row page_cartlogin">
                    <div class="col-12 nopad">
                        <div class="topic_bggreen">
                            <div class="topic_cartinfo">@if(Session::get('lang') == 'th') ข้อมูล @else Information @endif</div>
                            <div>@if(Session::get('lang') == 'th') กรุณาใส่อีเมล์และรหัสผ่านเพื่อลงชื่อเข้าใช้ eatfit @else Please enter your email & password to continue Login to eatfit @endif</div>
                        </div>
                        <div class="wrap_bordercontent">
                            <div class="box_cartlogin">
                                <div class="topic_cartlogin">{!!(Session::get('lang') == 'th') ? 'ลงชื่อเข้าใช้' : 'login to <span>eatfit</span>'!!}</div> <br>
                                <div>
                                    <a href="{{url('login/facebook')}}" class="btn_default100 btn_facebook"><i
                                            class="fab fa-facebook-square"></i> @if(Session::get('lang') == 'th') เข้าสู่ระบบด้วยเฟซบุ๊ค @else Sign in with <span>Facebook</span> @endif</a> 
                                </div>
                                <div class="txt_or">@if(Session::get('lang') == 'th') หรือ @else or @endif</div>
                                <div class="form_cartlogin">
                                    <form action="{{url('loginFrontend')}}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label><span>*</span> {{(Session::get('lang') == 'th') ? 'อีเมล์' : 'Email Address'}}</label>
                                                    <input type="email" class="form-control form-control-lg"
                                                        id="login_email" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label><span>*</span> {{(Session::get('lang') == 'th') ? 'สร้างรหัสผ่าน' : 'Password'}}</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg"
                                                        id="login_password" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group form-check">
                                                    {{-- <input type="checkbox" class="form-check-input"
                                                                    id="exampleCheck1">
                                                                <label class="form-check-label"
                                                                    for="exampleCheck1">Remember me</label> --}}
                                                                    <a href=""></a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <a href="{{url('/forgotpassword')}}"
                                                    class="link_forgot">{{(Session::get('lang') == 'th') ? 'ลืมรหัสผ่าน ?' : 'Forgot Password?'}}</a>
                                            </div>
                                        </div>
                                    </form>
                                    <a href="javascript:login();" class="btn_default100 btn_green">{{(Session::get('lang') == 'th') ? 'เข้าสู่ระบบ' : 'SIGN
                                        IN'}}</a>
                                    <div class="cartlogin_btnregis">
                                        <span>@if(Session::get('lang') == 'th') เป็นสมาชิกกับทาง อีทฟิต @else New to eatfit? @endif</span> <br>
                                        <a href="{{url('/register')}}"
                                            class="btn_default100 btn_yellow">{{(Session::get('lang') == 'th') ? 'สร้างบัญชี' : 'CREATE AN ACCOUNT'}}</a>
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

    <script>
        function login() {
            if ($("#login_email").val() == '') {
                alert('Please enter Email');

                $("#login_email").focus();
            } else if (!isEmailInc($("#login_email").val())) {
                alert('Invalid Email');

                $("#login_email").val('');
                $("#login_email").focus();
            } else if ($("#login_password").val() == '') {
                alert('Please enter Password');

                $("#login_password").focus();
            } else {
                $.post('<?php echo url("checkLoginInc");?>', {
                    email_inc: $("#login_email").val(),
                    password_inc: $("#login_password").val(),
                    "_token": "{{ csrf_token() }}"
                }, function (data) {
                    if (data == '0') {
                        alert('Email Or Password Incorrect');

                        $("#login_email").val('');
                        $("#login_password").val('');

                        $("#login_email").focus();
                    } else {
                        var data_split = data.split('-');
                        window.location.href = '<?php echo url("");?>/' + data_split[1];
                    }
                });
            }
        }

    </script>


</body>

</html>
