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
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <div>Shipping Address</div>
                 </div>
		    </div>
		</section>
		
		
		<section class="row">
		    <div class="container">
		        <div class="row page_cartlogin">
                     <div class="col-12 nopad">
                        <div class="cart_bggreen_topic cart_bgyellow_topic">
                             <img src="images/icon_home-white.svg" alt=""> Shipping Address
                         </div>
                         
                         <div class="wrap_shippingaddress">
                             <div class="wrap_frm_register form_cartlogin">
                                 <div class="row">
                                     <div class="col-12 col-md-6">
                                         <div class="form-group">
                                            <label><span>*</span> Name</label>
                                            <input class="form-control form-control-lg" value="lalita">
                                          </div>
                                     </div>
                                     <div class="col-12 col-md-6">
                                         <div class="form-group">
                                            <label><span>*</span> Family Name</label>
                                            <input class="form-control form-control-lg" value="piboonakanarak">
                                          </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group">
                                            <label><span>*</span> Email Address</label>
                                            <input class="form-control form-control-lg" value="lalita@orange-thailand.com">
                                          </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group">
                                            <label><span>*</span> Phone Number</label>
                                            <input class="form-control form-control-lg" value="0812345678">
                                          </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control form-control-lg" value="90/16 sriayutthaya rd.">
                                          </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group">
                                             <label>Province</label>
                                             <select class="form-control form-control-lg">
                                                <option value="">Please Select</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group">
                                             <label>Distric</label>
                                             <select class="form-control form-control-lg">
                                                <option value="">Please Select</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group">
                                             <label>Sub Distric</label>
                                             <select class="form-control form-control-lg">
                                                <option value="">Please Select</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="col-12 col-sm-6">
                                         <div class="form-group">
                                             <label>Postcode </label>
                                             <input class="form-control form-control-lg" value="10300">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             
                             <div class="register_wrapbtn_bottom">
                                 <div class="wrap_frm_register form_cartlogin">
                                     <div class="row">
                                         <div class="col-12 col-md-8"></div>
                                         <div class="col-12 col-md-4">
                                             <div class="btn_submit_regis">
                                                 <a href="cart-shipping.php" class="btn_default btn_green">save</a>
                                             </div>
                                         </div>
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
