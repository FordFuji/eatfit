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
                     <a href="index.php"><img src="images/icon_home.svg" alt=""></a> <span><i class="fas fa-chevron-right"></i></span> <a href="myprofile.php">Member</a> <span><i class="fas fa-chevron-right"></i></span> <div>Shipping & Billing Address</div>
                 </div>
		    </div>
		</section>
		
		<section class="row wrap_member">
            <div class="container">
                <div class="row">
                    <?php require('inc_menuaccount.php'); ?>
                    
                    <div class="col-12 col-lg-8">
                        <div class="topicbar_member">Shipping Address</div>
                        <div class="topic_member_border">New Address</div>
                        <div class="form_cartlogin">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                     <div class="form-group">
                                        <label><span>*</span> Name</label>
                                        <input class="form-control form-control-lg">
                                      </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                     <div class="form-group">
                                        <label><span>*</span> Family Name</label>
                                        <input class="form-control form-control-lg">
                                      </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                        <label><span>*</span> Email Address</label>
                                        <input class="form-control form-control-lg">
                                      </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                        <label><span>*</span> Phone Number</label>
                                        <input class="form-control form-control-lg">
                                      </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control form-control-lg">
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
                                         <input class="form-control form-control-lg">
                                     </div>
                                 </div>
                            </div>
                            <div class="register_wrapbtn_bottom member_button">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="btn_submit_regis">
                                             <button class="btn_default btn_green">save</button>
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
		
		<script>
            $(".menu_account_left > ul > li:nth-child(2) > a").addClass("here");
        </script>
		
	</div>

	
	

</body>

</html>
