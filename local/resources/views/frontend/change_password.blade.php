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
                     <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <div>Change Password?</div>
                 </div>
		    </div>
		</section>
		
		
		<section class="row">
		    <div class="container">
		        <div class="row page_cartlogin">
                     <div class="col-12 nopad">
                         <div class="topic_bgpurple topic_bgpink">
                             <div class="topic_cartinfo">Change Password?</div>
                             <div class="subtopic_cartinfo">Your password reset link has been sent to your email.</div>
                         </div>
                         
                         <div class="wrap_register">
                              <div class="text-center">Please enter password and confirm password.</div>
                              <div class="wrap_forgot form_cartlogin">
                                <form method="POST" action="{{url('/sendforgotpassword')}}" enctype="multipart/form-data" onsubm>
                                    @csrf
                                  <div class="form-group">
                                    <input class="form-control form-control-lg" type="password" placeholder="Password" name="password" id="password" {{$typeText}}>
                                  </div>
                                  <div class="form-group">
                                    <input class="form-control form-control-lg" type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" {{$typeText}}>
                                  </div>
                                  <button class="btn_default btn_green" type="button" onclick="changePassword();">send</button>
                                </form>
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
        function changePassword() {
            if($("#password").val() == '') {
                alert('Please enter Password');

                $("#password").focus();
            } else if($("#confirm_password").val() == '') {
                alert('Please enter Confirm Password');

                $("#confirm_password").focus();
            } else if($("#password").val() != $("#confirm_password").val()) {
                alert('Incorrect Confirm Password');

                $("#password").val('');
                $("#confirm_password").val('');

                $("#password").focus();
            } else {
                $.post('<?php echo url("ajaxChangePassword");?>', { md5: '<?php echo $md5;?>', member_password: $("#password").val(), "_token": "{{ csrf_token() }}" }, function(data) {
                    if(data == 'true') {
                        alert('Change Password Success');

                        window.location.href = '<?php echo url("cart_login");?>';
                    }
                });
            }
        }
    </script>
	

</body>

</html>
