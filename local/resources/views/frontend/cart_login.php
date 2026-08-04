<!doctype html>
<html>

<head>
	<?php require('inc_head.php'); ?>
</head>

<body>

	<div class="container-fluid footer_notop">
	
		<?php require('inc_menu.php'); ?>

		<section class="row">
		    <div class="container">
                 <div class="row wrap_navigationbar">
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="cart.php">Cart</a> <span><i class="fas fa-chevron-right"></i></span>  <div>Information</div>
                 </div>
		    </div>
		</section>
		
		
		<section class="row">
		    <div class="container">
		        <div class="row page_cartlogin">
                     <div class="col-12 nopad">
                         <div class="topic_bggreen">
                             <div class="topic_cartinfo">Information</div>
                             <div>Please enter your email & password to continue Login to EATFIT</div>
                         </div>
                         <div class="wrap_bordercontent">
                             <div class="box_cartlogin">
                                 <div class="topic_cartlogin">login to eatfit</div>
                                 <div>
                                     <a href="{{url('login/facebook')}}" class="btn_default100 btn_facebook"><i class="fab fa-facebook-square"></i> Sign in with <span>Facebook</span></a>
                                 </div>
                                 <div class="txt_or">or</div>
                                 <div class="form_cartlogin">
                                      <form>
                                          <div class="row">
                                              <div class="col-12">
                                                  <div class="form-group">
                                                    <label><span>*</span> Email Address</label>
                                                    <input class="form-control form-control-lg">
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group">
                                                    <label><span>*</span> Password</label>
                                                    <input class="form-control form-control-lg">
                                                  </div>
                                              </div>
                                              <div class="col-12 col-sm-6">
                                                  <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                                  </div>
                                              </div>
                                              <div class="col-12 col-sm-6">
                                                  <a href="forgotpassword.php" class="link_forgot">Forgot Password?</a>
                                              </div>
                                          </div>
                                        </form>
                                         <a href="cart.php" class="btn_default100 btn_green">SIGN IN</a>
                                         <div class="cartlogin_btnregis">
                                             <span>Not a member yet?</span> <br>
                                             <a href="#" class="btn_default100 btn_yellow">REGISTER</a>
                                         </div>
                                 </div>
                             </div>
                         </div>
                     </div>
		        </div>
		    </div>
		</section>
		
		
		<?php require('inc_footer.php'); ?>
		<?php require('scriptjs.php'); ?>
		
	</div>

	
	

</body>

</html>
