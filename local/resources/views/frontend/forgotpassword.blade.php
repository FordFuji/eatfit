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
                     <a href="{{url('/')}}"><img src="{{asset('/files/frontend/images/icon_home.svg')}}" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <div>Forgot Password?</div>
                 </div>
		    </div>
		</section>
		
		
		<section class="row">
		    <div class="container">
		        <div class="row page_cartlogin">
                     <div class="col-12 nopad">
                         <div class="topic_bgpurple topic_bgpink">
                             <div class="topic_cartinfo">Forgot Password?</div>
                             <div class="subtopic_cartinfo">Your password reset link has been sent to your email.</div>
                         </div>
                         
                         <div class="wrap_register">
                              <div class="text-center">Please enter your email address below to reset your password.</div>
                              <div class="wrap_forgot form_cartlogin">
                                <form method="POST" action="{{url('/sendforgotpassword')}}" enctype="multipart/form-data">
                                    @csrf
                                  <div class="form-group">
                                    <input class="form-control form-control-lg" name="forgotpassword" id="forgotpassword">
                                  </div>
                                  <button class="btn_default btn_green" type="button" onclick="resetPassword(this.value);">send</button>
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
        function resetPassword(email) {
            if($("#forgotpassword").val() == '') {
                alert('Please enter Email');

                $("#forgotpassword").focus();
            } else if(!isEmailInc($("#forgotpassword").val())) {
                alert('Incorrect Email');

                $("#forgotpassword").val('');
                $("#forgotpassword").focus();
            } else {
                $.post('<?php echo url("ajaxForgotPassword");?>', { email: $("#forgotpassword").val(), "_token": "{{ csrf_token() }}" }, function(data) {
                    if(data == 'true') {
                        alert('Please Change Password in Your Email');

                        $("#forgotpassword").val('');                        
                    } else {
                        alert('Not Email in System');

                        $("#forgotpassword").val('');
                        $("#forgotpassword").focus();
                    }
                });
            }
        }
    </script>
	

</body>

</html>
